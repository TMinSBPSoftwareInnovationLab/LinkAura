<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Razorpay\Api\Api;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class MiniWebsiteController extends Controller
{
    // save company details
    public function save_company_details(Request $request) {
        $request->validate([
            "company_name" => 'required',
            "owner_name" => 'required',
            'designation' => 'required'
        ]);

        $companyName = trim($request->company_name);
        $owner_name = trim($request->owner_name);
        $designation = trim($request->designation);
        $user_id = $request->user_id;
        $rowid = $request->rowid;
        $path = '';

        if ($request->hasFile('logo')) {
            // 1. Prepare File Name
            $businessName = preg_replace('/[^A-Za-z0-9\-]/', '_', $companyName);
            $dateTime = now()->format('Ymd_His');
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileName = "{$user_id}_{$businessName}_{$dateTime}.{$extension}";

            // Target folder in S3 bucket
            $s3Folder = "company_logos/";
            $fullS3Path = $s3Folder . $fileName;

            // 2. Handle Old File Deletion (If updating)
            if ($rowid) {
                $existing = DB::table('miniweb_company_details')
                    ->where('id', $rowid)
                    ->first();

                if ($existing && $existing->logo_path) {
                    $oldS3Path = $s3Folder . $existing->logo_path;

                    // Check if old file exists on S3 and delete it
                    if (Storage::disk('s3_company_logos')->exists($oldS3Path)) {
                        Storage::disk('s3_company_logos')->delete($oldS3Path);
                    }

                }
            }

            // 3. Upload New File to S3
            // 'public' visibility makes it viewable via URL
            Storage::disk('s3_company_logos')->putFileAs($s3Folder, $request->file('logo'), $fileName, 'public');

            $path = $fileName;
        }

        $addData = [
            'user_id' => $user_id,
            'company_name' => $companyName,
            'owner_name' => $owner_name,
            'designation' => $designation
        ];

        if ($path) {
            $addData['logo_path'] = $path;
        }

        if ($rowid) { // Update
            $addData['m_date'] = Carbon::now('Asia/Kolkata');
            $update = DB::table('miniweb_company_details')
                ->where('id', $rowid)
                ->update($addData);

            return [
                'status'  => true, // Return true if DB updated or if only image changed
                'message' => 'Company Details Updated Successfully',
                'cardId'  => $rowid
            ];
        } else { // New Insert
            $insert = DB::table('miniweb_company_details')->insert($addData);
            $last_Id = DB::getPdo()->lastInsertId();

            return [
                'status' => $insert ? true : false,
                'message' => $insert ? 'Company Details Created Successfully' : 'Creation Failed',
                'cardId' => $last_Id
            ];
        }
    }

    // get website datas
    public function getWebsiteDetails(Request $request){
        // return $request
        $cardId = $request->cardId;
        $table_name = $request->table;

        if ($cardId && $table_name) {
            switch ($table_name) {
                // company data
                case 'miniweb_company_details':
                    $getData = DB::table('miniweb_company_details')
                        ->where("id", "=", $cardId)
                        ->get();
                    break;
                
                // address
                case 'miniweb_contact':
                    $getData = DB::table('miniweb_contact')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                
                // about us
                case 'miniweb_aboutus':
                    $getData = DB::table('miniweb_aboutus')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                
                // media links
                case 'miniweb_social_links':
                    $getData = DB::table('miniweb_social_links')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                
                // Products
                case 'miniweb_products':
                    $getData = DB::table('miniweb_products')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                
                // Services
                case 'miniweb_services':
                    $getData = DB::table('miniweb_services')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                
                // Gallery
                case 'miniweb_gallery':
                    $getData = DB::table('miniweb_gallery')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                
                // Payment details
                case 'miniweb_payments_details':
                    $getData = DB::table('miniweb_payments_details')
                        ->where("mini_website_id", "=", $cardId)
                        ->get();
                    break;
                

                default:
                    return [
                        'status' => false,
                        'message' => 'No Website data found'
                    ];
            }
        }

        return [
            'status' => !empty($getData) ? true:false,
            'getData' => !empty($getData) ? $getData : [],
        ];
    }

    // save mini website enquires
    public function saveEnquiryData(Request $request){
        $enquiryUserName = $request->enquiryUserName;
        $Enquiryphone = $request->Enquiryphone;
        $productnameEnquiry = $request->productnameEnquiry;
        $enquiryMessage = $request->enquiryMessage;
        $miniWebId = $request->miniWebId ?? $request->miniWebId;

        if($miniWebId){
            $adData = [
                'miniWebId' => $miniWebId,
                'name' => $enquiryUserName,
                'phone_number' => $Enquiryphone,
                'product_name' => $productnameEnquiry,
                'enquiry_message' => $enquiryMessage,
            ];

            $ins = DB::table('miniweb_enquiries')->insertOrIgnore($adData);

            return [
                'status' => $ins ? true:false,
                'message' => $ins ? 'Enquiry is Form submit Successfully':'Enquiry is not submitted! Plase try again'
            ];
        }
        else{
            return [
                'status' => false,
                'message' => 'Something went wrong! Enquiry Not Save!'
            ];
        }
    }

    // save mini website feedback
    public function saveFeedBackData(Request $request){
        $fbUserName = $request->fbUserName;
        $fbphone = $request->fbphone;
        $fbmessage = $request->fbmessage;
        $miniWebId = $request->miniWebId ?? $request->miniWebId;

        if($miniWebId){
            $adData = [
                'miniWebId' => $miniWebId,
                'name' => $fbUserName,
                'phone' => $fbphone,
                'feedback_message' => $fbmessage
            ];
            
            $ins = DB::table('miniweb_feedback')->insertOrIgnore($adData);

            return [
                'status' => $ins ? true:false,
                'message' => $ins ? 'FeedBack is Form submit Successfully':'FeedBack is not submit! Plase try again'
            ];
        }
        else{
            return [
                'status' => false,
                'message' => 'Something Went wrong! FeedBack Not Save!'
            ];
        }
    }

    // save website templates
    public function saveWebsiteTemp(Request $request){
        $cardId = $request->cardId;
        $website_ID = $request->website_ID;
        $websiteTemp_id = $request->websiteTemp_id;
    

        if($website_ID && $cardId){
            $getData = DB::table('miniweb_company_details')
                ->where('id', '=', $cardId)
                ->update([
                    'website_id' => $website_ID,
                    'websiteTemp_id' => $websiteTemp_id ?? 0,
                    'm_date' =>  Carbon::now('Asia/Kolkata')->toDateTimeString()
                ]);
                // return $getData;
            return [
                'status' => $getData ? true:false,
                'getData' => $getData ?$getData:[],
                'message' => $getData ? 'Website Updated Successfully':'No changes made'
            ];
        }
        else{
            return [
                'status' => false,
                'message' => 'Invalid themeid or card id'
            ];
        }
    }

    // save website address
    public function save_website_address(Request $request)
    {
        $rowid = $request->rowid;
        $mini_website_id = $request->card_id;

        
        $data = [
            'mini_website_id'   => $mini_website_id,
            'email'             => $request->email ?? '',
            'phone_number'      => $request->phone_number ?? 0,
            'whatsapp_number'   => $request->whatsapp_number ?? 0,
            'address'           => $request->address ?? '',
        ];

        if ($rowid) {
            $data['m_date'] = Carbon::now('Asia/Kolkata')->toDateTimeString();
            $updated = DB::table('miniweb_contact')
                ->where('id', $rowid)
                ->update($data);

            return [
                'status'  => $updated ? true : false,
                'message' => $updated ? 'Contact Details Updated Successfully' : 'Nothing Updated'
            ];
        }

        if ($mini_website_id) {
            $inserted = DB::table('miniweb_contact')->insert($data);

            return [
                'status'  => $inserted ? true : false,
                'message' => $inserted ? 'Contact Details Inserted Successfully' : 'Contact Details Insert Failed'
            ];
        }

        return [
            'status'  => false,
            'message' => 'Invalid Website ID'
        ];
    }

    // save about us
    public function save_aboutus(Request $request){
        $rowid = $request->rowid;
        $mini_website_id = $request->card_id;

        $data = [
            'mini_website_id' => $mini_website_id,
            'aboutus_text'  => trim($request->aboutusPara) ?? '',
        ];

        if ($rowid) {
            $data['m_date'] = Carbon::now('Asia/Kolkata')->toDateTimeString();
            $updated = DB::table('miniweb_aboutus')
                ->where('id', $rowid)
                ->update($data);

            return [
                'status'  => $updated ? true : false,
                'message' => $updated ? 'About Us Updated Successfully' : 'Nothing Updated'
            ];
        }

        if ($mini_website_id) {
            $inserted = DB::table('miniweb_aboutus')->insert($data);

            return [
                'status'  => $inserted ? true : false,
                'message' => $inserted ? 'About Us Inserted Successfully' : 'About Us Insert Failed'
            ];
        }

        return [
            'status'  => false,
            'message' => 'Invalid Website ID'
        ];
    }

    // save social media links
    public function save_media_links(Request $request){
        $rowid = $request->rowid;
        $mini_website_id = $request->card_id;

        $data = [
            'mini_website_id' => $mini_website_id,
            'facebook_url'  => $request->facebookUrl ?? '',
            'instagram_url' => $request->instagramUrl ?? '',
            'whatsapp_link' => $request->whatsappUrl ?? '',
            'youtube_Url1' => $request->youtubeUrl1 ?? '',
            'youtube_Url2' => $request->youtubeUrl2 ?? '',
            'instaReals_Url1' => $request->instaReals1 ?? '',
            'instaReals_Url2' => $request->instaReals2 ?? '',
        ];

        if ($rowid) {
            $data['m_date'] = Carbon::now('Asia/Kolkata')->toDateTimeString();
            $updated = DB::table('miniweb_social_links')
                ->where('id', $rowid)
                ->update($data);

            return [
                'status'  => $updated ? true : false,
                'message' => $updated ? 'Media links Updated Successfully' : 'Nothing Updated'
            ];
        }

        if ($mini_website_id) {
            $inserted = DB::table('miniweb_social_links')->insert($data);

            return [
                'status'  => $inserted ? true : false,
                'message' => $inserted ? 'Media links Inserted Successfully' : 'About Us Insert Failed'
            ];
        }

        return [
            'status'  => false,
            'message' => 'Invalid Website ID'
        ];
    }

    // save product
    public function saveWebProducts(Request $request) {
        $products = $request->products;
        $mini_website_id = $request->cardId;
        $rowid = $request->rowid;
        $anyChanges = false;
        $messages = [];

        if (!$mini_website_id) {
            return ['status' => false, 'message' => 'No Products Insert!'];
        }

        foreach ($products as $index => $p) {
            $newImagePath = '';
            $s3Folder = "product_images/"; // Folder inside S3 bucket

            // 1. Handle New Image Upload
            if (isset($p['image']) && $p['image'] instanceof \Illuminate\Http\UploadedFile) {
                $dateTime = now()->format('Ymd_His');
                $ext = $p['image']->getClientOriginalExtension();
                $imageName = "{$mini_website_id}_la_{$dateTime}_" . uniqid() . ".{$ext}";

                // Upload to S3
                Storage::disk('s3_products')->putFileAs($s3Folder, $p['image'], $imageName, 'public');
                $newImagePath = $imageName;
            }

            $original = floatval($p['original_price'] ?? 0);
            $discount = floatval($p['discount_price'] ?? 0);
            $final = floatval($p['final_price'] ?? 0);

            $data = [
                'mini_website_id' => $mini_website_id,
                'product_name' => ($p['name'] && $p['name'] != 'undefined') ? $p['name'] : '',
                'orginal_price' => $original,
                'discount_price' => $discount,
                'final_price' => $final,
            ];

            // 2. UPDATE MODE
            if (!empty($rowid) && isset($rowid[$index])) {
                $productId = $rowid[$index];

                // If a new image was uploaded, delete the old one from S3 first
                if ($newImagePath) {
                    $oldProduct = DB::table('miniweb_products')->where('id', $productId)->first();

                    if ($oldProduct && $oldProduct->product_img) {
                        $oldS3Path = $s3Folder . $oldProduct->product_img;

                        if (Storage::disk('s3_products')->exists($oldS3Path)) {
                            Storage::disk('s3_products')->delete($oldS3Path);
                        }
                    }
                    $data['product_img'] = $newImagePath;
                }

                $data['m_date'] = now('Asia/Kolkata')->toDateTimeString();
                $updated = DB::table('miniweb_products')->where('id', $productId)->update($data);

                if ($updated || $newImagePath) {
                    $anyChanges = true;
                    $messages[] = "Product updated successfully.";
                }
            }
            // 3. INSERT MODE
            else {
                if ($newImagePath) {
                    $data['product_img'] = $newImagePath;
                }

                $inserted = DB::table('miniweb_products')->insert($data);

                if ($inserted) {
                    $anyChanges = true;
                    $messages[] = "New product inserted successfully.";
                }
            }
        }

        return [
            'status' => $anyChanges,
            'message' => $anyChanges ? "Changes saved successfully" : "No changes made",
        ];
    }

    // remove product image
    public function removeProductImage(Request $request) {
        $id    = $request->id;
        $image = $request->image; // This might be a full URL or just a filename

        if (!$id || !$image) {
            return ['status' => false, 'message' => 'Invalid request'];
        }

        // 1. Extract the filename only (in case a full URL was sent from Vue)
        $fileNameOnly = basename($image);

        // 2. Define the path inside your 'linkaura-product-images' bucket
        $s3Path = "product_images/" . $fileNameOnly;
        // return $s3Path;
        try {
            $disk = Storage::disk('s3_products');

            // 3. Delete from S3
            if ($disk->exists($s3Path)) { // return "if";
                $disk->delete($s3Path);
            }
            // return "else";

            // 4. Update the Database
            $updated = DB::table('miniweb_products')
                ->where('id', $id)
                ->update(['product_img' => '']);

            return [
                'status'  => true,
                'message' => 'Product image removed successfully.'
            ];

        } catch (\Exception $e) {
            return [
                'status'  => false,
                'message' => 'S3 Error: ' . $e->getMessage()
            ];
        }
    }

    // remove service image 
    public function removeServiceImage(Request $request) {
        $id    = $request->id;
        $image = $request->image; // This could be the full URL or just the filename

        if (!$id || !$image) {
            return ['status' => false, 'message' => 'Invalid request'];
        }

        // 1. Extract only the filename (e.g., image.jpg) to avoid URL issues
        $fileNameOnly = basename($image);

        // 2. Define the path inside your 'linkaura-service-images' bucket
        $s3Path = "service_images/" . $fileNameOnly;

        try {
            $disk = Storage::disk('s3_services');

            // 3. Permanently delete from S3 bucket
            if ($disk->exists($s3Path)) {
                $disk->delete($s3Path);
            }

            // 4. Update the Database to clear the image reference
            $updated = DB::table('miniweb_services')
                ->where('id', $id)
                ->update(['service_img' => '']);

            return [
                'status'  => true,
                'message' => 'Service image removed successfully from S3.'
            ];

        } catch (\Exception $e) {
            // Return the error message if something goes wrong with the AWS connection
            return [
                'status'  => false,
                'message' => 'S3 Error: ' . $e->getMessage()
            ];
        }
    }

    // save service
    public function saveWebServices(Request $request) {
        $services = $request->services;
        $mini_website_id = $request->cardId;
        $rowid = $request->rowid;
        $anyChanges = false;
        $messages = [];

        if (!$mini_website_id) {
            return [
                'status'  => false,
                'message' => 'No Services Inserted!',
            ];
        }

        foreach ($services as $index => $s) {
            $newImagePath = '';
            $s3Folder = "service_images/"; // Folder structure inside S3

            // 1. Handle New Image Upload to S3
            if (isset($s['image']) && $s['image'] instanceof \Illuminate\Http\UploadedFile) {
                $dateTime = now()->format('Ymd_His');
                $ext = $s['image']->getClientOriginalExtension();
                $imageName = "{$mini_website_id}_la_{$dateTime}_" . uniqid() . ".{$ext}";

                // Upload to S3 bucket
                Storage::disk('s3_services')->putFileAs($s3Folder, $s['image'], $imageName, 'public');
                $newImagePath = $imageName;
            }

            $data = [
                'mini_website_id' => $mini_website_id,
                'service_name'    => ($s['service_name'] && $s['service_name'] != 'undefined') ? $s['service_name'] : '',
            ];

            // 2. UPDATE MODE
            if (!empty($rowid) && isset($rowid[$index])) {
                $serviceId = $rowid[$index];

                if ($newImagePath) {
                    // Get old service record to delete the old image from S3
                    $oldService = DB::table('miniweb_services')->where('id', $serviceId)->first();

                    if ($oldService && $oldService->service_img) {
                        $oldS3Path = $s3Folder . $oldService->service_img;

                        if (Storage::disk('s3_services')->exists($oldS3Path)) {
                            Storage::disk('s3_services')->delete($oldS3Path);
                        }
                    }
                    $data['service_img'] = $newImagePath;
                }

                $data['m_date'] = now('Asia/Kolkata')->toDateTimeString();
                $updated = DB::table('miniweb_services')->where('id', $serviceId)->update($data);

                if ($updated || $newImagePath) {
                    $anyChanges = true;
                    $messages[] = "Service updated successfully.";
                }
            }
            // 3. INSERT MODE
            else {
                if ($newImagePath) {
                    $data['service_img'] = $newImagePath;
                }

                $inserted = DB::table('miniweb_services')->insert($data);

                if ($inserted) {
                    $anyChanges = true;
                    $messages[] = "New Service inserted successfully.";
                }
            }
        }

        return [
            'status'  => $anyChanges,
            'message' => $anyChanges ? "Services saved successfully" : "No changes made",
        ];
    }

    // remove gallery 
    public function removeGalleryImage(Request $request) {
        $id    = $request->id;
        $image = $request->image;

        if (!$id || !$image) {
            return ['status' => false, 'message' => 'Invalid request'];
        }

        // No leading slash
        $s3Path = "gallery_images/" . $image;
        // echo $image;exit;
        // Check disk name matches config/filesystems.php
        // return [
        //     'exists' => Storage::disk('s3_gallery')->exists("gallery_images/{$image}")
        // ];
        $disk = Storage::disk('s3_gallery');

        try {
            if ($disk->exists($s3Path)) {
                $s3Deleted = $disk->delete($s3Path);
            }
        } catch (\Exception $e) {

            return ['status' => false, 'message' => 'S3 Error: ' . $e->getMessage()];
        }

        $updated = DB::table('miniweb_gallery')
            ->where('id', $id)
            ->update(['gallery' => '']);

        return [
            'status'  => true,
            'message' => $updated ? 'Deleted Done' : 'Database already empty'
        ];
    }

    // save gallery 
    public function saveWebGallery(Request $request) {
        $galleries = collect($request->galleries)->sortKeys()->all();
        $mini_website_id = $request->cardId;
        $rowid = $request->rowid;
        $anyChanges = false;
        $messages = [];

        if(!$mini_website_id){
            return [
                'status'  => false,
                'message' => 'No Gallery Insert!',
            ];
        }

        foreach ($galleries as $index => $p) {
            $newImagePath = '';

            // S3-க்கு இமேஜை அப்லோட் செய்யும் பகுதி
            if (isset($p['image']) && $p['image'] instanceof \Illuminate\Http\UploadedFile) {
                $dateTime  = now()->format('Ymd_His');
                $ext       = $p['image']->getClientOriginalExtension();
                $imageName = "{$mini_website_id}_la_{$dateTime}_" . uniqid() . ".{$ext}";

                // S3-ல் 'gallery_images' எனும் ஃபோல்டரில் அப்லோட் செய்கிறோம்
                // 'public' என குறிப்பிடுவது அவசியம் (Visibility)
                try {
                    $path = Storage::disk('s3_gallery')->putFileAs('gallery_images', $p['image'], $imageName);
                    // return "Upload Success: " . $path;
                } catch (\Exception $e) {
                    // இது AWS தரும் உண்மையான மெசேஜை காட்டும்
                    dd($e->getMessage());
                }

                // Database-ல் சேமிக்க வெறும் ஃபைல் பெயரை மட்டும் எடுக்கிறோம்
                $newImagePath = $imageName;
            }

            $data = [
                'mini_website_id' => $mini_website_id,
            ];

            // ============= UPDATE MODE =============
            if (!empty($rowid) && isset($rowid[$index])) {
                $galleryId = $rowid[$index];
                $oldGallery = DB::table('miniweb_gallery')->where('id', $galleryId)->first();

                if ($newImagePath) {
                    // பழைய இமேஜை S3-லிருந்து டெலீட் செய்கிறோம்
                    if ($oldGallery && $oldGallery->gallery) {
                        $oldFilePath = 'gallery_images/' . $oldGallery->gallery;
                        if (Storage::disk('s3_gallery')->exists($oldFilePath)) {
                            Storage::disk('s3_gallery')->delete($oldFilePath);
                        }
                    }
                    $data['gallery'] = $newImagePath;
                }

                $data['m_date'] = now('Asia/Kolkata')->toDateTimeString();
                $updated = DB::table('miniweb_gallery')->where('id', $galleryId)->update($data);

                if ($updated || $newImagePath) {
                    $anyChanges = true;
                    $messages[] = "Gallery ID {$galleryId} updated.";
                }
            }
            // ============= INSERT MODE =============
            else {
                if ($newImagePath) {
                    $data['gallery'] = $newImagePath;
                    $inserted = DB::table('miniweb_gallery')->insert($data);

                    if ($inserted) {
                        $anyChanges = true;
                        $messages[] = "New Gallery inserted.";
                    }
                }
            }
        }

        return [
            'status'  => $anyChanges,
            'message' => $anyChanges ? implode(" ", $messages) : "No changes made",
        ];
    }



    // save payment details
    public function save_miniweb_paymentDetails(Request $request) {
        $mini_website_id = $request->cardId;
        $rowid = $request->rowid;

        if (!$mini_website_id) {
            return ['status' => false, 'message' => 'Invalid Card ID'];
        }

        // 1. Fetch old data if we are in update mode
        $oldData = null;
        if ($rowid) {
            $oldData = DB::table('miniweb_payments_details')->where('id', $rowid)->first();
        }

        // 2. Define S3 Disk and Folder
        $disk = Storage::disk('s3_payments');
        $s3Folder = "payment_Details_QrCode/";

        /**
         * Helper Closure to handle S3 Upload and Delete
         */
        $uploadQr = function ($fileKey, $oldFile = null) use ($request, $disk, $s3Folder, $mini_website_id) {
            // If no new file is uploaded, return the existing filename
            if (!$request->hasFile($fileKey)) {
                return $oldFile;
            }

            // A. Handle old file deletion
            if ($oldFile) {
                try {
                    // We call delete directly. If the file doesn't exist, S3 ignores it.
                    // This prevents the "Unable to check existence" permission error.
                    $disk->delete($s3Folder . $oldFile);
                } catch (\Exception $e) {
                    Log::warning("S3 Old File Delete Failed: " . $e->getMessage());
                }
            }

            // B. Upload the new file
            try {
                $file = $request->file($fileKey);
                $fileName = $mini_website_id . '_la_' . now()->format('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Store file with public visibility so it can be viewed via URL
                $disk->putFileAs($s3Folder, $file, $fileName, 'public');

                return $fileName;
            } catch (Exception $e) {
                Log::error("S3 Upload Failed: " . $e->getMessage());
                return $oldFile; // Revert to old file if upload fails
            }
        };

        // 3. Prepare Data for Database
        $data = [
            'mini_website_id' => $mini_website_id,
            'gpay_number'    => $request->gPay ?? 0,
            'phonepe_number' => $request->phonePe ?? 0,
            'paytm_number'   => $request->payTm ?? 0,
        ];

        // Process each QR code field
        $data['gpay_qr_code']    = $uploadQr('gPayFile', $oldData->gpay_qr_code ?? null);
        $data['phonepe_qr_code'] = $uploadQr('phonePeFile', $oldData->phonepe_qr_code ?? null);
        $data['paytm_qr_code']   = $uploadQr('payTmFile', $oldData->paytm_qr_code ?? null);

        // 4. Update or Insert into Database
        if (!empty($rowid)) {
            $data['m_date'] = Carbon::now('Asia/Kolkata')->toDateTimeString();

            $updated = DB::table('miniweb_payments_details')
                ->where('id', $rowid)
                ->update($data);

            return [
                'status'  => true,
                'message' => 'Payment Details Updated Successfully'
            ];
        } else {
            $data['all_step_completed'] = 1;
            $inserted = DB::table('miniweb_payments_details')->insert($data);

            return [
                'status'  => (bool) $inserted,
                'message' => $inserted ? 'Payment Details Inserted Successfully' : 'Insert Failed'
            ];
        }
    }

    // get website datas
    public function getSelectedWebsite(Request $request){
        $website_id = $request->website_id;
        $data = DB::table('miniweb_company_details')
            ->select(
                'id as cd_ID',
                'website_id',
                'websiteTemp_id',
                'company_name',
                'purchased_id'
            )
            ->where('id', $website_id)
            ->first();

        return [
            'status' => (bool) $data,
            'data'   => $data ?? null
        ];
    }

    // get QR Code Generate
    public function qrCodeGenerate(Request $request)
    {
        $webID          = $request->cd_ID;
        $website_id     = $request->website_id;
        $websiteTemp_id = $request->websiteTemp_id;
        $qrBase         = $request->qrBase;

        if (!$webID || !$qrBase) {
            return response()->json(['status' => false, 'message' => 'Invalid data']);
        }

        $disk = Storage::disk('s3_qr');
        $s3Folder = "qrcodes/";
        $fileName = "{$webID}_{$website_id}_{$websiteTemp_id}.png";
        $s3Path = $s3Folder . $fileName;

        // 1. Delete Old QR from S3
        $existing = DB::table('miniweb_qrcode')->where('mini_website_id', $webID)->first();

        if ($existing && !empty($existing->qr_code)) {
            $oldS3Path = $s3Folder . $existing->qr_code;
            // We bypass exists() to avoid permission errors as discussed previously
            $disk->delete($oldS3Path);
        }

        // 2. Process QR Image (Intervention Image v3)
        $manager = new ImageManager(new Driver());
        $qrImageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $qrBase));
        $qrImage = $manager->read($qrImageData);

        // 3. Embed LOGO (S3 or Local Default)
        $companyLogo = DB::table("miniweb_company_details")
            ->select("logo_path")
            ->where("id", $webID)
            ->first();

        $logoLoaded = false;

        // Check if company has a logo in its S3 bucket
        if ($companyLogo && $companyLogo->logo_path) {
            $logoS3Path = "company_logos/" . $companyLogo->logo_path;
            // Check if logo exists in the logo disk
            if (Storage::disk('s3_company_logos')->exists($logoS3Path)) {
                $logoContent = Storage::disk('s3_company_logos')->get($logoS3Path);
                $logo = $manager->read($logoContent);
                $logoLoaded = true;
            }
        }

        // Fallback to local default logo if S3 logo not found
        if (!$logoLoaded) {
            $defaultPath = public_path('images/linkAuraLogo300.png');
            if (file_exists($defaultPath)) {
                $logo = $manager->read($defaultPath);
                $logoLoaded = true;
            }
        }

        // Overlay logo if we have one
        if ($logoLoaded) {
            $logoSize = (int) ($qrImage->width() * 0.20);
            $logo->resize($logoSize, $logoSize);
            $qrImage->place($logo, 'center');
        }

        // 4. Save to S3
        // Encode image to PNG format
        $encoded = $qrImage->toPng();
        $disk->put($s3Path, (string) $encoded, 'public');

        // 5. Database Update/Insert
        if ($existing) {
            DB::table('miniweb_qrcode')
                ->where('mini_website_id', $webID)
                ->update([
                    'qr_code' => $fileName,
                    'm_date'  => Carbon::now('Asia/Kolkata'),
                ]);
            $message = 'QR Code updated successfully';
        } else {
            DB::table('miniweb_qrcode')->insert([
                'mini_website_id' => $webID,
                'qr_code'         => $fileName,
                'created_at'      => Carbon::now('Asia/Kolkata'),
            ]);
            $message = 'QR Code generated successfully';
        }

        return response()->json([
            'status'    => true,
            'file_name' => $fileName,
            // Replace asset() with S3 URL
            'path'      => $disk->url($s3Path),
            'message'   => $message,
        ]);
    }

    // grcode backup 14-12-2025
    public function qrCodeGenerate_old_working_fine(Request $request)
    {
        $webID          = $request->webID;
        $website_id     = $request->website_id;
        $websiteTemp_id = $request->websiteTemp_id;
        $qrBase         = $request->qrBase;

        if (!$webID || !$qrBase) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid data'
            ]);
        }

        $folder = public_path('qrcodes');
        File::ensureDirectoryExists($folder);

        $fileName = "{$webID}_{$website_id}_{$websiteTemp_id}.png";
        $filePath = "{$folder}/{$fileName}";

        // Get existing QR record
        $existing = DB::table('miniweb_qrcode')
            ->where('mini_website_id', $webID)
            ->first();

        // Delete old QR image if exists
        if ($existing && $existing->qr_code) {
            $oldPath = "{$folder}/{$existing->qr_code}";
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        // Save new QR image
        $imageData = base64_decode(
            preg_replace('/^data:image\/\w+;base64,/', '', $qrBase)
        );
        file_put_contents($filePath, $imageData);

        // Update or Insert DB record
        if ($existing) {
            DB::table('miniweb_qrcode')
                ->where('mini_website_id', $webID)
                ->update([
                    'qr_code' => $fileName,
                    'm_date'  => now('Asia/Kolkata')->toDateTimeString(),
                ]);

            $message = 'QR Code updated successfully';
        } else {
            DB::table('miniweb_qrcode')->insert([
                'mini_website_id' => $webID,
                'qr_code' => $fileName,
            ]);

            $message = 'QR Code generated successfully';
        }

        return response()->json([
            'status'    => true,
            'file_name' => $fileName,
            'path'      => asset("qrcodes/{$fileName}"),
            'message'   => $existing ? 'QR Code updated successfully' : 'QR Code generated successfully'
        ]);
    }

    // collect the website datas
    public function collectAllWebsiteDatas(Request $request){
        $table_name = trim($request->table_name);
        $cd_id = $request->cd_id;

        if ($cd_id && $table_name) {
            switch ($table_name) {
                // company data
                case 'miniweb_company_details':
                    $getData = DB::table('miniweb_company_details')
                        ->where("id", "=", $cd_id)
                        ->get();
                    break;
                
                // address
                case 'miniweb_contact':
                    $getData = DB::table('miniweb_contact')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;

                // media links
                case 'miniweb_social_links':
                    $getData = DB::table('miniweb_social_links')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                // about us
                case 'miniweb_aboutus':
                    $getData = DB::table('miniweb_aboutus')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                
                // Products
                case 'miniweb_products':
                    $getData = DB::table('miniweb_products')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                // Services
                case 'miniweb_services':
                    $getData = DB::table('miniweb_services')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                // Gallery
                case 'miniweb_gallery':
                    $getData = DB::table('miniweb_gallery')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                // Payment details
                case 'miniweb_payments_details':
                    $getData = DB::table('miniweb_payments_details')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                // QR Code
                case 'miniweb_qrcode':
                    $getData = DB::table('miniweb_qrcode')
                        ->where("mini_website_id", "=", $cd_id)
                        ->get();
                    break;
                
                // Feedback verify data
                case 'miniweb_feedback':
                    $getData = DB::table('miniweb_feedback')
                        ->where("miniWebId", "=", $cd_id)
                        // ->where("verify","=",1)
                        ->orderBy('id', 'desc')
                        ->limit(10)
                        ->get();
                    break;
                

                default:
                    return [
                        'status' => false,
                        'message' => 'No Website data found'
                    ];
            }
        }

        return [
            'status' => !empty($getData) ? true:false,
            'getData' => !empty($getData) ? $getData : [],
        ];
    }

    // Feedback datas userbased
    public function getFeedbackDetails(Request $request){
        $user_id = $request->user_id;
        $getData = DB::table("miniweb_feedback as fb")
        ->select("fb.id","cd.company_name","cd.user_id","fb.name","fb.phone","fb.miniWebId", "fb.verify","fb.feedback_message","fb.reject_remarks",DB::raw("DATE_FORMAT(fb.created_at, '%d-%m-%Y %h:%i:%s %p') as fbCreatedAt"))
        ->leftJoin( 'miniweb_company_details as cd', 'cd.id', '=', 'fb.miniWebId')
        ->orderBy("fb.id","desc")
        ->where("cd.user_id","=",$user_id)
        ->get();
        return response()->json([
            'status' => true,
            'getData' => $getData,
            'message' => $getData->isNotEmpty() ? 'Feedback data found' : 'No feedback data found'
        ]);
    }

    // update feedback verify and remarks
    public function verifyMiniWebFeedback(Request $request) {
        $rowId   = $request->id;
        $verify  = (int) $request->verify; // 1 = verify, 2 = reject
        $reason  = $request->reason ?? null;

        if (!$rowId) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Row ID'
            ]);
        }

        $data = [
            'verify' => $verify == 2 ? 2 : 1,
        ];

        if ($verify == 2) {
            $data['reject_remarks'] = $reason;
            $data['reject_at'] = Carbon::now('Asia/Kolkata');
        } else {
            $data['verify_at'] = Carbon::now('Asia/Kolkata');
        }

        $updated = DB::table('miniweb_feedback')
            ->where('id', $rowId)
            ->update($data);

        return response()->json([
            'status'  => (bool) $updated,
            'message' => $updated
                ? ($verify == 2 ? 'Feedback Rejected Successfully' : 'Feedback Verified Successfully')
                : 'No changes made'
        ]);
    }

    // website datas
    public function getMiniWebsiteDetails(Request $request){
        $user_id = $request->user_id;
        $getData = DB::table("miniweb_company_details")
            ->select("id","website_id","websiteTemp_id", "user_id", "company_name", "purchased_id", DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y %h:%i:%s %p') as createdDate"), "created_at")
            ->where("user_id","=",$user_id)->get();

        $now = Carbon::now('Asia/Kolkata');
        $getData = $getData->map(function ($item) use ($now) {

            $created = Carbon::parse($item->created_at, 'Asia/Kolkata');
            $days = (int) $created->diffInDays($now);
            if ($now->format('H') >= 12) {
                $days += 1;
            }
            $item->website_age_days = $days;

            return $item;
        });
        
        return response()->json([
            'status' => $getData->isNotEmpty() ? true : false,
             'getData' => $getData,
            'message' => $getData->isNotEmpty() ? 'Mini Website data found' : 'No Mini Website data found'
        ]);
    }

    // get enquiry
    public function getMiniWebEnquiry(Request $request){
        $user_id = $request->user_id;
        $getData = DB::table("miniweb_enquiries as me")
        ->select("me.id","cd.company_name","cd.user_id","me.miniWebId", "me.name as customername","me.phone_number","me.product_name","enquiry_message",DB::raw("DATE_FORMAT(me.created_at, '%d-%m-%Y %h:%i:%s %p') as meCreatedAt"))
        ->leftJoin( 'miniweb_company_details as cd', 'cd.id', '=', 'me.miniWebId')
        ->where("cd.user_id","=",$user_id)
        ->orderBy("me.id","desc")
        ->get();
        return response()->json([
            'status' => true,
            'getData' => $getData,
            'message' => $getData->isNotEmpty() ? 'Enquiry data found' : 'No Enquiry data found'
        ]);
    }

    // create razorpay order
    public function createRazorpayOrder(Request $request){
        // return $request;
        $request->validate([
            'id' => 'required',
            'plan_id' => 'required|numeric',
            'txnAmt' => 'required|numeric',
            'planName' => 'required|string'
        ]);

        $amount = $request->txnAmt;
        $amountPaise = $amount * 100;
        $receipt = 'rcpt_'.$request->id.'_'.uniqid();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $order = $api->order->create([
                'receipt' => $receipt,
                'amount' => $amountPaise,
                'currency' => 'INR',
                'payment_capture' => 1
            ]);

            // Convert to array properly
            $orderArray = [
                'id' => $order['id'] ?? null,
                'amount' => $order['amount'] ?? null,
                'currency' => $order['currency'] ?? null,
                'receipt' => $order['receipt'] ?? null,
                'status' => $order['status'] ?? null
            ];

            return response()->json([
                'status' => true,
                'order' => $orderArray,
                'key' => env('RAZORPAY_KEY')
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Could not create order: '.$e->getMessage()
            ], 500);
        }
    }

    // verify Payment
    public function verifyPayment(Request $request){
        $data = $request->only(
            'razorpay_payment_id',
            'razorpay_order_id',
            'razorpay_signature',
            'id', // website row id
            'plan_id',
            'plan_name',
            'txn_amt'
        );

        $razorpay_payment_id = $data['razorpay_payment_id'] ?? null;
        $razorpay_order_id = $data['razorpay_order_id'] ?? null;
        $razorpay_signature = $data['razorpay_signature'] ?? null;

        if (!$razorpay_order_id || !$razorpay_payment_id || !$razorpay_signature) {
            return response()->json(['status' => false, 'message' => 'Payment details missing'], 400);
        }

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attributes = [
                'razorpay_order_id' => $razorpay_order_id,
                'razorpay_payment_id' => $razorpay_payment_id,
                'razorpay_signature' => $razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes); // Verify signature

            $currentDate = Carbon::now('Asia/Kolkata');

            // billing pdf update
            // Dynamic Financial Year Calculation
            $month = $currentDate->month;
            $year = $currentDate->year;
            $finYear = ($month < 4) ? ($year - 1) . "-" . substr($year, -2) : $year . "-" . substr($year + 1, -2);

            // Generate Unique Invoice Number ex: INV/2025-26/0001
            $lastId = DB::table("miniweb_plan_purchase")->latest('id')->value('id') ?? 0;
            $invoiceNo = "INV/" . $finYear . "/" . (0000 + $lastId + 1);

            // Plan Description Mapping
            $descriptions = [
                94 => "Basic Plan - Entry level features for mini website",
                95 => "Standard Plan - Advanced features with better reach",
                96 => "Premium Plan - Full suite of features & priority support"
            ];
            $planDesc = $descriptions[$data['plan_id']] ?? "Subscription Plan";

            // get user company name
            $userCompanyDetails = DB::table("miniweb_company_details")
            ->select("company_name","owner_name")
                ->where(['id' => $data['id']])
                ->first();
            
            
                // get user address
            $userAddress = DB::table("miniweb_contact")
                ->where(['mini_website_id' => $data['id']])
                ->latest('id')
                ->value("address");

            // Data for PDF
            $pdfData = [
                'logo' => public_path('images/linkAuraLogo300.png'),
                'invoice_no' => $invoiceNo,
                'date' => $currentDate->format('d-m-Y'),
                'plan_name' => $data['plan_name'],
                'description' => $planDesc,
                'amount' => $data['txn_amt'],
                'from_address' => "TMinSBP Software innovation Lab \n A Product of LinkAura,\nNo 288, Royalone Medical Centre Near, Anangur Corner,\nB.Komarapalayam(TK), Namakkal(DT),\nTamil Nadu - 600001",
                'to_address' => $userCompanyDetails->company_name."\n". $userAddress,
            ];

            // Generate PDF
            $pdf = Pdf::loadView('emails.invoice', $pdfData);
            $fileName = 'invoice_' . time() . '.pdf';
            $filePath = 'invoices/' . $fileName;

            // Save to Storage (Public disk) Storage::disk('public')->put($filePath, $pdf->output());

            // Dynamic S3 Bucket Switch & Upload  Inga namma billing bucket-a select panrom
            Config::set('filesystems.disks.s3.bucket', env('AWS_BUCKET_BILLING'));
            
            // File-a S3-kku anuprom
            $result = Storage::disk('s3_billing')->put(
                $filePath,
                $pdf->output(),
                [
                    'visibility' => 'public',
                    'ContentType' => 'application/pdf'
                ]
            );

            // dd(
            //     Storage::disk('s3')->put(
            //         'invoices/test.pdf',
            //         'hello world',
            //         ['visibility' => 'public']
            //     )
            // );
            // exit;


            
            // Upload aanathum full URL-a edukrom
            $s3Url = Storage::disk('s3_billing')->url($filePath);
            // echo $s3Url;die();

            // Insert payment
            $insertData = [
                "mini_website_id" => $data['id'],
                "plan_id" => $data['plan_id'],
                "plan_name" => $data['plan_name'],
                "txn_amt" => $data['txn_amt'],
                "txn_status" => "TXN_SUCCESS",
                'transaction_id' => $razorpay_payment_id,
                "txn_date" => $currentDate->toDateTimeString(),
                "created_at" => $currentDate->toDateTimeString(),
                "plan_expiry_status" => 0,
                "billing_pdf" => $s3Url
            ];

            DB::table("miniweb_plan_purchase")->insertOrIgnore($insertData);
            // get last insert id
            $insertedId = DB::table("miniweb_plan_purchase")
                ->where(['mini_website_id' => $data['id'], 'plan_id' => $data['plan_id']])
                ->latest('id')
                ->value("id");

            // update mini website
            DB::table('miniweb_company_details')->where('id', $data['id'])->update([
                "purchased_id" => $insertedId,
                'is_live' => 1,
                'transaction_id' => $razorpay_payment_id,
                'plan_id' => $data['plan_id'],
                'plan_name' => $data['plan_name'],
                'txn_amt' => $data['txn_amt'],
                "live_date" => $currentDate->toDateTimeString() // miniwebsite live data
            ]);
            return response()->json([
                'status' => true, 
                'message' => "You have successfully purchased the {$data['plan_name']} plan, and your miniwebsite is live now!",
                'pdf_url' => $s3Url
            ]);

        }
        catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Signature verification failed: '.$e->getMessage()], 400);
        }
    }

    // payment failure tracking
    public function paymentFailureTracking(Request $request){
        $ins = [
            'mini_website_id' => $request->website_id, 
            'plan_id' => $request->plan_id, 
            'plan_name' => $request->plan_name,
            'txn_amt' => $request->txn_amt, 
            'reason' => $request->reason, 
            'status' => "TXN_FAILURE",
            'created_at' => Carbon::now('Asia/Kolkata')->toDateTimeString()
        ];
        
        DB::table('payment_failure_tracking')->insert($ins);

        return response()->json(['status' => true, 'message' => 'Payment Failure']);
    }
}
