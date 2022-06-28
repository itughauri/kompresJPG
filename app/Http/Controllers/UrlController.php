<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class UrlController extends Controller
{
    public function byurl(Request $request)
    {
        $fileimg = file_get_contents($request->linkhere);
        $hash = Str::uuid()->toString();
        $hash = Str::uuid()->toString();
        $pathhash = 'ud/uploads/' . $hash . '.png';
        $filepath = public_path($pathhash);
        file_put_contents($filepath, $fileimg);

        if ($filepath) {
            $img = 'ud/uploads/'. $hash . ".png" ;
            $filesize = \File::size($filepath);
                session()->push("user.uploads", $img);
                session()->push("user.filesize", $filesize);
        } else {
            return 'error';
        }
        return "done";
    }
}
