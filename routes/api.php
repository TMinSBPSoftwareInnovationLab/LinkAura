<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MiniWebsiteController;

Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return response()->json($request->user());
});
