<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GoogleDriveController extends Controller
{
    public function google_drive(Request $request)
    {
        $oAuthToken = $request->oauthToken;
        $tempnameArr = $request->filename;
        foreach ($tempnameArr as $key => $tempname) {
            $extension = substr($tempname, strrpos($tempname, '.'));
            $getUrl = 'https://www.googleapis.com/drive/v2/files/' . $request->fileid[$key] . '?alt=media&mimeType=image/*';
            $authHeader = 'Authorization: Bearer ' . $oAuthToken;
            $ch = curl_init($getUrl);

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($ch, CURLOPT_HTTPHEADER, [$authHeader]);

            $filepdf = curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_errno($ch);
            curl_close($ch);

            $hash = Str::uuid()->toString();
            $thumbimg = "{$hash}.jpg";
            $hash = "{$hash}{$extension}";
            $myimg = 'ud/thumbnails/' . $thumbimg;
            $path = 'ud/uploads/' . $hash;

            if (session('user.temp')) {
                foreach (session('user.temp') as $k => $v) {
                    if ($v == $tempname) {
                        $tempname = substr($tempname, 0, strrpos($tempname, '.'));
                        if (strlen(substr($tempname, 0, strrpos($tempname, '('))) > 0) {
                            $tempname = substr($tempname, 0, strrpos($tempname, '('));
                        }
                        $tempname = $tempname . ' (' . $k . ')' . $extension;
                    }
                }
            }

            file_put_contents($path, $filepdf);
            $filesize = File::size(public_path($path));
            $upload[] = $path;
            $uploadimg[] = asset('assets/imges/ppt-logo.png');
            $userfilename[] = $tempname;

            $abc = implode(',', $upload);
            $request->session()->push('user.temp', $tempname);
            $request->session()->push('user.uploadimg', $myimg);
            $request->session()->push('user.uploads', $path);
            $request->session()->push('user.filesize', $filesize);
        }
        return 'done';
    }
}
