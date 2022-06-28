<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompressController;
use App\Http\Controllers\Blogcontroller;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ZipController;
use App\Http\Controllers\DropboxController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ShareController;

        //Home
Route::get('/',                           [HomeController::class, 'index'])->name('index');
        //compress
Route::get('/compress',                   [CompressController::class, 'index'])->name('compress.index');
Route::get('compress/compress-image',     [CompressController::class, 'compress_img'])->name('compress.img');
Route::get('compress/compress-customize', [CompressController::class, 'compress_customize'])->name('compress.customize');
Route::get('compress/delete',             [CompressController::class, 'compress_delete'])->name('compress.delete');
        //blogs
Route::get('/blogs',                      [BlogController::class, 'index'])->name('blogs.index');
        //contactus
Route::get('/contact-us',                 [ContactUsController::class, 'index'])->name('contactus.index');
        //privacy-policy
Route::get('/privacy-policy',             [PrivacyPolicyController::class, 'index'])->name('privacy_policy.index');
        //terms
Route::get('/terms',                      [TermsController::class, 'index'])->name('terms.index');
        //upload
Route::post('/upload' ,                   [UploadController::class, 'uploads'])->name('upload');
        //download
Route::get('/download',                   [DownloadController::class, 'index'])->name('download.index');
Route::get('/redirect',                   [DownloadController::class, 'redirect'])->name('download.redirect');
        //for zip download
Route::get('/zip',                        [ZipController::class, 'zip'])->name('zip.download');
        //for dropbox
Route::post('/dropbox',                   [DropboxController::class, 'dropbox'])->name('dropbox');
        //for google-drive
Route::post('/google-drive',              [GoogleDriveController::class, 'google_drive'])->name('google_drive');
        //for url
Route::post('/buyrl',                     [UrlController::class, 'byurl'])->name('byurl');
        //for mailer
Route::post('/mail',                      [MailController::class, 'send_email'])->name('email');
        // for session flush
Route::get('/flush', function(){
    session()->flush();
    return back();
});
    //whatsapp
Route::get('share/{data}',function($data){

    return view('download.whatsappview',compact('data'));
})->name('whatsapp.view');
    //email
Route::post('share_on_mail',            [ShareController::class, 'share_on_mail'])->name('share.mail');
    //copylink
Route::get('copy/{copy}',               [ShareController::class, 'copy'])->name('share.copy');


