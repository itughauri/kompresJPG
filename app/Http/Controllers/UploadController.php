<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class UploadController extends Controller
{
    public function uploads(Request $request)
    {

        $file_extension = $request->file->getClientOriginalExtension();
        if ($file_extension == 'png' || $file_extension == 'jpeg' || $file_extension == 'jpg' || $file_extension == 'webp' || $file_extension == 'gif' || $file_extension == 'tif') {
            // dd($file_extension);
            $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
            // dd($receiver);
            // $save = $request->file('file');
            $save = $receiver->receive();

            $hash = Str::uuid()->toString();
            $extension = $save->getClientOriginalExtension();
            $thumbimg = "{$hash}.jpg";
            $hash = "{$hash}.{$extension}";
            $myimg = 'ud/uploads/' . $thumbimg;
            $pathhash = 'ud/uploads/' . $hash;
            $tempname = $save->getClientOriginalName();

            $filesize = $save->getSize();
            $path = $save->move('ud/uploads', $hash);
            // dd($save->getMimeType());


            $upload[] = $path;
            $uploadimg[] = $myimg;
            $userfilename[] = $tempname;

            $abc = implode(',', $upload);
            $request->session()->push('user.temp', $tempname);
            $request->session()->push('user.uploadimg', $myimg);
            $request->session()->push('user.uploads', $pathhash);
            $request->session()->push('user.filesize', $filesize);
            return 'done';
            $page = $this->count_Pages($path);
        }
    }
}
