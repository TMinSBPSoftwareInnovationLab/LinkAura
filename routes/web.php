<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MiniWebsiteController;


Route::post('/userRegister',[AuthController::class, 'userRegister']);
Route::post('/checkExistMobile',[AuthController::class, 'checkExistMobile']);
Route::post('/login',[AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });
});
Route::post('/save_company_details',[MiniWebsiteController::class, 'save_company_details']);
Route::post('/getWebsiteDetails',[MiniWebsiteController::class, 'getWebsiteDetails']);
Route::post('/saveEnquiryData',[MiniWebsiteController::class, 'saveEnquiryData']);
Route::post('/saveFeedBackData',[MiniWebsiteController::class, 'saveFeedBackData']);
Route::post('/saveWebsiteTemp',[MiniWebsiteController::class, 'saveWebsiteTemp']);
Route::post('/save_website_address',[MiniWebsiteController::class, 'save_website_address']);
Route::post('/save_aboutus',[MiniWebsiteController::class, 'save_aboutus']);
Route::post('/save_media_links',[MiniWebsiteController::class, 'save_media_links']);
Route::post('/saveWebProducts',[MiniWebsiteController::class, 'saveWebProducts']);
Route::post('/removeProductImage',[MiniWebsiteController::class, 'removeProductImage']);
Route::post('/removeServiceImage',[MiniWebsiteController::class, 'removeServiceImage']);
Route::post('/saveWebServices',[MiniWebsiteController::class, 'saveWebServices']);
Route::post('/removeGalleryImage',[MiniWebsiteController::class, 'removeGalleryImage']);
Route::post('/saveWebGallery',[MiniWebsiteController::class, 'saveWebGallery']);
Route::post('/save_miniweb_paymentDetails',[MiniWebsiteController::class, 'save_miniweb_paymentDetails']);
Route::post('/getSelectedWebsite',[MiniWebsiteController::class, 'getSelectedWebsite']);
Route::post('/qrCodeGenerate',[MiniWebsiteController::class, 'qrCodeGenerate']);
Route::post('/getFeedbackDetails',[MiniWebsiteController::class, 'getFeedbackDetails']);
Route::post('/verifyMiniWebFeedback',[MiniWebsiteController::class, 'verifyMiniWebFeedback']);
Route::post('/getMiniWebsiteDetails',[MiniWebsiteController::class, 'getMiniWebsiteDetails']);
Route::post('/getMiniWebEnquiry',[MiniWebsiteController::class, 'getMiniWebEnquiry']);
// razorpayment area
Route::post('/createRazorpayOrder',[MiniWebsiteController::class, 'createRazorpayOrder']);
Route::post('/verifyPayment',[MiniWebsiteController::class, 'verifyPayment']);
Route::post('/paymentFailureTracking',[MiniWebsiteController::class, 'paymentFailureTracking']);

// website data collections area
Route::post('/collectAllWebsiteDatas',[MiniWebsiteController::class, 'collectAllWebsiteDatas']);
Route::post('/get_webCompanyDetails',[MiniWebsiteController::class, 'get_webCompanyDetails']);
Route::post('/getwebAddressDetails',[MiniWebsiteController::class, 'getwebAddressDetails']);
Route::post('/getwebMediaLinks',[MiniWebsiteController::class, 'getwebMediaLinks']);
// website data collections area /.

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
