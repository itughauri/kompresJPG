<?php

namespace App\Http\Controllers;

use App\Mail\DownloadMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use ZipArchive;

class ShareController extends Controller
{
    public function share_on_mail(Request $request)
    {
        $zip = new ZipArchive;
            $img = Str::uuid()->toString() . '.zip';
            if ($zip->open(public_path('ud/downloads/'.$img), ZipArchive::CREATE) === true) {
                if (count(session('opt')) > 1)  {
                    foreach (session('opt') as $item) {
                        $relativeNameInZipFile = basename($item);
                        $zip->addFile($item, $relativeNameInZipFile);
                    }
                    $zip->close();
                    $details = [
                        'title' => 'Download',
                        'email' => $request->share,
                        'zip'  => '/ud/downloads/' . $img

                    ];
                }else{
                    $details = [
                        'title' => 'Download',
                        'email' => $request->share,
                        'img'  => session('opt')
                    ];
                }
            }
        Mail::to($request->share)->send(new DownloadMailer($details));
        return redirect()->route('download.index')->with('success', 'gambar berhasil dikirim');
    }

    public function copy($copy)
    {
        $link = base64_decode($copy);
        $arr = explode(",", $link);
        if (count($arr) > 1) {
            $zip = new ZipArchive;
            $img = Str::uuid()->toString() . '.zip';
            if ($zip->open(public_path('ud/downloads/'.$img), ZipArchive::CREATE) === true) {
                if (is_array(session('opt'))) {
                    foreach (session('opt') as $item) {
                        $relativeNameInZipFile = basename($item);
                        $zip->addFile($item, $relativeNameInZipFile);
                    }
                    $zip->close();
                    return view('share.share_link', [
                        'img' => asset('/ud/downloads/'. $img)
                    ]);
                }
            }
        }else{
            $img = asset('ud/downloads/' . $link);
        }
        return view('share.share_link', [
            'img' => $img,
        ]);
    }
}
