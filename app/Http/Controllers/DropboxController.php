<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class DropboxController extends Controller
{
    public function dropbox (Request $request)
    {
        $name = $request->filename;
        $name = str_replace('%20',' ',$name);
        foreach($name as $key =>  $item)
        {
            $extension = substr($item,  strrpos($item, '.'));
            if($extension == '.jpg' || $extension == '.jpeg' || $extension == '.png'){
                $fileimg = file_get_contents($request->linkhere[$key]);
                $hash = Str::uuid()->toString();
                $thumbimg = "{$hash}.jpg";
                $hash = "{$hash}{$extension}";
                $myimg = 'ud/thumbnails/' . $thumbimg;
                $path = 'ud/uploads/' . $hash;
                if (session('user.temp')){
                    foreach (session('user.temp') as $k => $v) {
                        if ($v == $item) {
                            $item = substr($item, 0, strrpos($item, '.'));
                            if (strlen(substr($item, 0, strrpos($item, '('))) > 0) {
                                $item = substr($item, 0, strrpos($item, '('));
                            }
                            $item = $item . ' (' . $k . ')' . $extension;
                        }
                    }
                }
                file_put_contents($path, $fileimg);
                    $filesize = File::size(public_path($path));
                        $upload[] = $path;
                        $uploadimg[]= asset('assets/imges/ppt-logo.png');
                        $userfilename[] = $item;

                        $abc = implode(',', $upload);
                        // $filesize = $item->getSize();
                        $request->session()->push('user.temp', $item);
                        $request->session()->push('user.uploadimg', $myimg);
                        $request->session()->push('user.uploads', $path);
                        $request->session()->push('user.filesize', $filesize);


            }else{
                return 'false';
            }
        }

        return $request;
    }
}
