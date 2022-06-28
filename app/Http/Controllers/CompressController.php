<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Imagick;

class CompressController extends Controller
{
    public function index()
    {
        return view('compress.app');
    }

    public function PIPHP_ImageResize($image, $w, $h)
    {
        $oldw = imagesx($image);
        $oldh = imagesy($image);
        $temp = imagecreatetruecolor($w, $h);
        imagecopyresampled($temp, $image, 0, 0, 0, 0, $w, $h, $oldw, $oldh);
        return $temp;
    }

    public function compress($source, $destination, $quality, $w, $h)
    {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);

        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        }
        if ($w > 0 && $h > 0) {
            $image = $this->PIPHP_ImageResize($image, $w, $h);
        }
        imagejpeg($image, $destination, $quality);
    }

    public function compress_img(Request $request)
    {
        $percentage = $request->percentage >= 1 ? $request->percentage : 1;
        $percentage = $request->percentage == 100 ? 1 : 100 - (int) $request->percentage;
        $optfile = [];
        $r_percentage = [];
        $opt_size = [];
        array_push($r_percentage, $percentage);
        session()->put('percentage', $r_percentage);
        $dimensions = "'" . $request->width . 'X' . $request->height . "^!'";
        $width = $request->width ?? 0;
        $height = $request->height ?? 0;

        if(session()->has('user.uploads')){
            foreach (session('user.uploads') as $img) {
                //another function
                    $this->compress($img, public_path() . "/ud/downloads/" . basename($img), $percentage, $width, $height);
                //another function
                array_push($optfile, 'ud/downloads/' . basename($img));
                session()->put('opt', $optfile);
                //for filesize
                    $this->filesize('ud/downloads/' . basename($img));
                //for filesize
                array_push($opt_size, $this->filesize('ud/downloads/' . basename($img)));
                session()->put('optimize.size', $opt_size);
            }
        }else{
            return [
                'error' => true,
                'message' => 'silakan isi semua bidang yang diperlukan'
            ];
        }

    }

    public function filesize($size)
    {
        $size = File::size($size);
        if ($size < 1024) {
            $size = $size . 'B';
        } elseif ($size < 1048576) {
            $size = number_format((float) ($size / 1024), 2, '.', '');
            $size = $size . 'KB';
        } elseif ($size < 1073741824) {
            $size = number_format((float) ($size / 1048576), 2, '.', '');
            $size = $size . 'MB';
        } else {
            $size = number_format((float) ($size / 1073741824), 2, '.', '');
            $size = $size . 'MB';
        }
        return $size;
    }

    public function compress_customize(Request $request)
    {
        // return $request;
        $size = $request->size;
        $size_type = $request->size_type;
        $width = $request->width ?? 0;
        $height = $request->height ?? 0;
        $filesize  = $request->filesize;
        $customsize = $request->size;
        $optfile = [];
        $opt_size = [];

        if($filesize > $customsize){
        foreach(session('user.uploads') as $img ){
            //another function
            $this->compress($img, public_path() . "/ud/downloads/" . basename($img), '25', $width, $height);
            //another function
            array_push($optfile, 'ud/downloads/' . basename($img));
            session()->put('opt', $optfile);
            //for filesize
                $this->filesize('ud/downloads/' . basename($img));
            //for filesize
            array_push($opt_size, $this->filesize('ud/downloads/' . basename($img)));
            session()->put('optimize.size', $opt_size);
        }
        }else{
            foreach(session('user.uploads') as $img ){
                //another function
                $this->compress($img, public_path() . "/ud/downloads/" . basename($img), '100', $width, $height);
                //another function
                array_push($optfile, 'ud/downloads/' . basename($img));
                session()->put('opt', $optfile);
                //for filesize
                    $this->filesize('ud/downloads/' . basename($img));
                //for filesize
                array_push($opt_size, $this->filesize('ud/downloads/' . basename($img)));
                session()->put('optimize.size', $opt_size);
            }
        }
        
    }

    public function compress_delete(Request $request)
    {
        $src = $request->id;
        foreach (session('user.uploads') as $key => $value) {
            if ($value == $src) {
                session()->forget('user.uploads.' . $key);
                return response()->json([
                    'id' => $request->id,
                ]);
            }
        }
    }
}
