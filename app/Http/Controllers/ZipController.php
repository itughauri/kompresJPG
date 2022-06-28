<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Support\Str;

class ZipController extends Controller
{
    public function zip()
    {
        $zip = new ZipArchive;
        $filename = Str::uuid()->toString().'.zip';
        if (session('opt')) {
            if ($zip->open(public_path($filename), ZipArchive::CREATE) === true) {
                if (is_array(session('opt'))) {
                    foreach (session('opt') as $item) {
                        $relativeNameInZipFile = basename($item);
                        $zip->addFile($item, $relativeNameInZipFile);
                    }
                    $zip->close();
                } else {
                    $relativeNameInZipFile = basename(session('opt'));
                    $zip->addFile(session('opt'), $relativeNameInZipFile);
                    $zip->close();
                }
            }
            return response()->download(public_path($filename));
        }
    }
}
