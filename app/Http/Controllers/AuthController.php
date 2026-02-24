<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
class AuthController extends Controller
{
    public function userRegister(Request $request){

        $clientIp = $request->ip();
        $serverIp = request()->server('SERVER_ADDR') ??  $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname()) ?? 'Unknown';

        // return [
        //     'client_ip' => $clientIp,
        //     'server_ip' => $serverIp
        // ];

        try{
            // Validate input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|lowercase|email|max:255|unique:users,email',
                'company' => 'nullable|string|max:255',
                'mobilenumber' => 'required|digits_between:10,15|unique:users,mobile_number',
                'password' => 'required|string|min:8',
                'confirmPassword' => 'required|same:password',
            ]);

            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'company_name'  => $request->company,
                'mobile_number' => $request->mobilenumber,
                'password_str'  => $request->password,
                'password'      => Hash::make($request->password),
            ]);

            $token = $user->createToken('TMEA_Success_LinkAura')->plainTextToken;

            return response()->json([
                'status'  => true,
                'message' => 'User registered successfully',
                'user' => $user,
            ], 201);
        }
        catch(error){
            return response()->json([
                'status'  => false,
                'message' => 'Registration failed',
                'error'   => $e->getMessage()
            ], 500);
        }

        
    }

    // check exist mobile number
    public function checkExistMobile(Request $request){
        $mobile = $request->mobileNO;

        if (!$mobile) {
            return response()->json([
                'status' => false,
                'message' => 'Mobile number is required'
            ], 400);
        }

        $exists = User::where('mobile_number', $mobile)->exists();

        return response()->json([
            'status' => true,
            'exists' => $exists,
            'message' => $exists ? 'Mobile number already exists' : 'Mobile number available'
        ]);
    }

    // login 
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find user by mobile number
        $user = User::where('mobile_number', $request->mobile)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Mobile number not registered'
            ], 404);
        }

        // Check password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid password'
            ], 401);
        }

        // Create token
        $token = $user->createToken('TMEA_Success_LinkAura')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ], 200);
    }

    // forgot password
    public function forgotPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'mobilenumber'   => 'required|exists:users,mobile_number',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        // User-ah kandupidirom
        $user = User::where('mobile_number', $request->mobilenumber)->first();

        if ($user) {
            // Password-ah Hash panni update panrom
            $user->password = Hash::make($request->password);
            $user->password_str = $request->password;
            $user->save();

            return response()->json([
                'status'  => true,
                'message' => 'Password successfully updated! Now Login'
            ], 200);
        }

        return response()->json([
            'status'  => false,
            'message' => 'User not found!'
        ], 404);
    }
}
