<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MiniWebsiteController;


/*
|--------------------------------------------------------------------------
| Public Pages (meta.public = true)
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', function () {
    return Inertia::render('Website/Index');
});

Route::post('/userRegister',[AuthController::class, 'userRegister']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/checkExistMobile',[AuthController::class, 'checkExistMobile']);
// old backup
// forgot password
Route::post('/forgotPassword',[AuthController::class, 'forgotPassword']);

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
Route::post('/getExistCompanyDetails',[MiniWebsiteController::class, 'getExistCompanyDetails']);
Route::post('/getFeedbackDetails',[MiniWebsiteController::class, 'getFeedbackDetails']);
Route::post('/verifyMiniWebFeedback',[MiniWebsiteController::class, 'verifyMiniWebFeedback']);
Route::post('/getMiniWebsiteDetails',[MiniWebsiteController::class, 'getMiniWebsiteDetails']);
Route::post('/getMiniWebEnquiry',[MiniWebsiteController::class, 'getMiniWebEnquiry']);
Route::post('/getBillingSuccess',[MiniWebsiteController::class, 'getBillingSuccess']);
Route::post('/getBillingFailure',[MiniWebsiteController::class, 'getBillingFailure']);
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

// school admission datas save
Route::post('/save_school_datas',[MiniWebsiteController::class, 'saveAdmission']);
// Route::get('/{slug}/{company_id}/{website_id}', [MiniWebsiteController::class, 'showCompanyDatas'])->name('company.show');
Route::get('/{slug}/{companyID}/{lastPart}', [MiniWebsiteController::class, 'showCompanyDatas'])->name('company.show');

// Route::get('/{company}/Website_Temp_{themeIdEnc}', [MiniWebsiteController::class, 'viewDigitalShop']);

// Route::get('/share/{company_name}/{website_id}', [MiniWebsiteController::class, 'shareView']);
// Route::get('/{company_name}/{website_id}', [MiniWebsiteController::class, 'websiteView']);

// sample bill generation
Route::get('/preview-bill', function () {
    // Inga neenga template-ku dummy data anupanum, illana error varum
    $data = [
        'business_name' => 'TMinSBP Software Innovation Lab',
        'from_address' => "5 Martin Pl\nSydney NSW 2000\nAustralia",
        'to_address' => "Your Client\n100 Harris St\nSydney NSW 2009",
        'invoice_no' => '2022445',
        'date' => '19/7/2022',
        'plan_name' => 'Sample service',
        'description' => '1 hour service description',
        'amount' => 30.00,
    ];
    
    return view('emails.sample_bill_template', $data);
});
// sample bill generation /.
// old backup /.


// Login
Route::get('/login', function () {
    return Inertia::render('Views/Login');
})->name('login');;

// Forgot Password
Route::get('/ForgotPass', function () {
    return Inertia::render('Views/Forgot_pass');
});

// Registration
Route::get('/registration', function () {
    return Inertia::render('Views/Registration');
});

// School Registration
Route::get('/SchoolReg', function () {
    return Inertia::render('Views/SchoolReg');
});

// Mini Website Enquiry (public)
Route::get('/MiniWebEnquiry', function () {
    return Inertia::render('MiniWeb_enquiry');
});

// Feedback Verify (public)
Route::get('/FeedbackVerify', function () {
    return Inertia::render('FeedbackVerify');
});


/*
|--------------------------------------------------------------------------
| Protected Pages (auth required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    });

    // Company Details
    Route::get('/Company_details', function () {
        return Inertia::render('Components/Mini_website_components/Company_details');
    });

    // Website Temp Main Page
    Route::get('/Website_temp', function () {
        return Inertia::render('Components/Mini_website_components/Mini_Website_Temp');
    });

    // Address
    Route::get('/Address', function () {
        return Inertia::render('Components/Mini_website_components/Address');
    });

    // About Us
    Route::get('/Aboutus', function () {
        return Inertia::render('Components/Mini_website_components/Aboutus');
    });

    // Media Links
    Route::get('/MediaLinks', function () {
        return Inertia::render('Components/Mini_website_components/MediaLinks');
    });

    // Products
    Route::get('/Products', function () {
        return Inertia::render('Components/Mini_website_components/Products');
    });

    // Services
    Route::get('/Service', function () {
        return Inertia::render('Components/Mini_website_components/Service');
    });

    // Gallery
    Route::get('/Gallery', function () {
        return Inertia::render('Components/Mini_website_components/Gallery');
    });

    // Payment Details
    Route::get('/PaymentDetails', function () {
        return Inertia::render('Components/Mini_website_components/PaymentDetails');
    });

    // Billing Success
    Route::get('/BillingSuccess', function () {
        return Inertia::render('billing/billing_success');
    });

    // Billing Failure
    Route::get('/BillingFailure', function () {
        return Inertia::render('billing/billing_failure');
    });

});


/*
|--------------------------------------------------------------------------
| Dynamic Website Template (🔥 Important Conversion)
|--------------------------------------------------------------------------
*/

Route::get('/{company}/Website_Temp_{themeIdEnc}', function ($company, $themeIdEnc) {

    try {
        // Base64 decode
        $decodedId = base64_decode($themeIdEnc);

        // Map theme → Inertia page
        $map = [
            1 => 'Mini_Website_Pages/Website_Temp_1',
            2 => 'Mini_Website_Pages/Website_Temp_2',
            3 => 'Mini_Website_Pages/Website_Temp_3',
            4 => 'Mini_Website_Pages/Website_Temp_4',
            5 => 'Mini_Website_Pages/Website_Temp_5',
            6 => 'Mini_Website_Pages/Website_Temp_6',
        ];

        // Invalid themeனா homeக்கு redirect
        if (!isset($map[$decodedId])) {
            return redirect('/');
        }

        // சரியான template load
        return Inertia::render($map[$decodedId], [
            'company' => $company,
            'themeId' => $decodedId
        ]);

    } catch (\Exception $e) {
        return redirect('/');
    }

});


/*
|--------------------------------------------------------------------------
| Fallback Route (IMPORTANT)
|--------------------------------------------------------------------------
*/

// Vue Routerக்கு பதிலா இது catch-all route
Route::get('/{any}', function () {
    return Inertia::render('Website/Index');
})->where('any', '.*');