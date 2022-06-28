 dropbox
        $('#dropbox').on('click', function() {
            <?php

            namespace App\Http\Controllers;

            use Illuminate\Http\Request;
            use Illuminate\Support\Facades\File;
            use Illuminate\Support\Str;
            use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
            use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
            use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
            use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

            class PPTController extends Controller
            {
                public function upload(Request $request) {
                    if($request->file->getClientOriginalExtension() == 'ppt' || $request->file->getClientOriginalExtension()== 'pptx' ){
                        // create the file receiver
                        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
                        // check if the upload is success, throw exception or return response you need
                        if ($receiver->isUploaded() === false) {
                            throw new UploadMissingFileException();
                        }
                        // receive the file
                        $save = $receiver->receive();

                        // check if the upload has finished (in chunk mode it will send smaller files)
                        if ($save->isFinished()) {
                            // save the file and return any response you need, current example uses `move` function. If you are not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
                            $hash = Str::uuid()->toString();
                            $extension = $save->getClientOriginalExtension();
                            $thumbimg = "{$hash}.jpg";
                            $hash = "{$hash}.{$extension}";
                            $myimg = 'ud/thumbnails/'.$thumbimg;
                            $pathhash='ud/uploads/'.$hash;
                            $tempname=$save->getClientOriginalName();
                            if(session('user.temp')) {
                                foreach (session('user.temp') as $k => $v) {
                                    if ($v == $tempname) {
                                        $tempname = substr($tempname, 0, strrpos($tempname, '.'));
                                        if(strlen(substr($tempname, 0, strrpos($tempname, '(')))>0) {
                                            $tempname = substr($tempname, 0, strrpos($tempname, '('));
                                        }
                                        $tempname = $tempname . ' (' . $k . ').' . $extension;
                                    }
                                }
                            }
                            $filesize=$save->getSize();

                            $path=$save->move('ud/uploads',$hash);

                            if(mime_content_type(public_path().'/'.$path)=='application/octet-stream'){
                                return $save->getClientOriginalName();
                            }else{
                                $str = 'export HOME=/tmp && convert   -density 300 ' . public_path() . '/' . $path . '[0]' . '  -quality 100 -fill transparent -fuzz 20% -background white -flatten  ' . public_path() . '/' . $myimg;

                                // shell_exec($str);
                                $upload[]=$path;
                                // $uploadimg[]=$myimg;
                                $uploadimg[]= asset('assets/imges/ppt-logo.png');
                                $userfilename[]=$tempname;

                                if($filesize < 1024){
                                    $size = $filesize.'B';
                                }elseif ($filesize < 1048576){
                                    $size =number_format((float)$filesize/1024,2,'.','').'KB';
                                }elseif ($filesize < 1073741824){
                                    $size =number_format((float)$filesize/1048576,2,'.','').'MB';
                                }else{
                                    $size =number_format((float)$filesize/1073741824,2,'.','').'GB';
                                }

                                $abc=implode(',',$upload);
                                $request->session()->push('user.temp',$tempname);
                                $request->session()->push('user.uploadimg',$myimg);
                                $request->session()->push('user.uploads',$pathhash);
                                $request->session()->push('user.size',$size);
                                return 'done';
                            }
                            $page = $this->count_Pages($path);
                        }
                        // we are in chunk mode, lets send the current progress
                        //  @var AbstractHandler $handler
                        $handler = $save->handler();
                        return response()->json([
                            "done" => $handler->getPercentageDone(),
                            'status' => true
                        ]);
                    }else{
                        $error_response = array(
                            'code'=>422,
                            'status'=>'Unprocessable Entity',
                            'message'=>'Invalid File type'

                        );
                        return response()->json($error_response);
                    }
                }

                public function count_Pages($path){
                    $path=public_path($path);
                    if (file_exists($path)){
                        $text =file_get_contents($path);
                        $num = preg_match_all("/\/Page\W/",$text,$dummy);
                        return $num;
                    }
                    else{
                        dd('File not exist');
                    }
                }

                public function GDrive(Request $request){
                    $oAuthToken =$request->oauthToken;
                    $tempnameArr=$request->filename;
                    foreach ($tempnameArr as $key => $tempname) {
                        $extension = substr($tempname,  strrpos($tempname, '.'));
                        $getUrl = 'https://www.googleapis.com/drive/v2/files/' . $request->fileid[$key] . '?alt=media&mimeType=application/vnd.openxmlformats-officedocument.wordprocessingml.document&mimeType=application/vnd.ms-powerpoint';
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

                        if (session('user.temp')){
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
                        if (mime_content_type(public_path() . '/' . $path) == 'application/octet-stream') {
                            return $tempname;
                        }else {
                            if ($extension == 'csv') {
                                $pdf = str_replace('.jpg', '.pdf', $myimg);
                                $str_pdf = 'export HOME=/tmp && soffice --headless --convert-to pdf:calc_pdf_Export  ' . public_path() . '/' . $path . ' --outdir ' . public_path('thumbnail');
                                shell_exec($str_pdf);
                                $str = 'export HOME=/tmp && convert   -density 300 ' . public_path() . '/' . $pdf . '[0]' . '  -quality 100 -fill transparent -fuzz 20% -background white -flatten  ' . public_path() . '/' . $myimg;
                                shell_exec($str);
                                unlink(public_path() . '/' . $pdf);
                            } else {
                                $str = 'export HOME=/tmp && convert   -density 300 ' . public_path() . '/' . $path . '[0]' . '  -quality 100 -fill transparent -fuzz 20% -background white -flatten  ' . public_path() . '/' . $myimg;

                                // shell_exec($str);
                            }
                            $upload[] = $path;
                            $uploadimg[]= asset('assets/imges/ppt-logo.png');
                            $userfilename[] = $tempname;

                            if ($filesize < 1024) {
                                $size = $filesize . 'B';
                            } elseif ($filesize < 1048576) {
                                $size = number_format((float)$filesize / 1024, 2, '.', '') . 'KB';
                            } elseif ($filesize < 1073741824) {
                                $size = number_format((float)$filesize / 1048576, 2, '.', '') . 'MB';
                            } else {
                                $size = number_format((float)$filesize / 1073741824, 2, '.', '') . 'GB';
                            }

                            $abc = implode(',', $upload);
                            $request->session()->push('user.temp', $tempname);
                            $request->session()->push('user.uploadimg', $myimg);
                            $request->session()->push('user.uploads', $path);
                            $request->session()->push('user.size', $size);
                        }
                    }
                    return 'done';
                }

                public function DBox(Request $request){
                    $tempnameArr=$request->filename;
                    $tempnameArr = str_replace('%20',' ',$tempnameArr);
                    foreach ($tempnameArr as $key => $tempname) {
                        $extension = substr($tempname,  strrpos($tempname, '.'));
                        if($extension == '.ppt' || $extension == '.pptx'){
                            $filepdf = file_get_contents($request->linkhere[$key]);
                            $hash = Str::uuid()->toString();
                            $thumbimg = "{$hash}.jpg";
                            $hash = "{$hash}{$extension}";
                            $myimg = 'ud/thumbnails/' . $thumbimg;
                            $path = 'ud/uploads/' . $hash;
                            if (session('user.temp')){
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
                            if(mime_content_type($path) == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || mime_content_type($path) =='application/vnd.ms-powerpoint'){
                                $filesize = File::size(public_path($path));

                                if (mime_content_type(public_path() . '/' . $path) == 'application/octet-stream') {
                                    return $tempname;
                                }
                                else {
                                    if ($extension == 'csv') {
                                        $pdf = str_replace('.jpg', '.pdf', $myimg);
                                        $str_pdf = 'export HOME=/tmp && soffice --headless --convert-to pdf:calc_pdf_Export  ' . public_path() . '/' . $path . ' --outdir ' . public_path('thumbnail');
                                        shell_exec($str_pdf);
                                        $str = 'export HOME=/tmp && convert   -density 300 ' . public_path() . '/' . $pdf . '[0]' . '  -quality 100 -fill transparent -fuzz 20% -background white -flatten  ' . public_path() . '/' . $myimg;
                                        shell_exec($str);
                                        unlink(public_path() . '/' . $pdf);
                                    } else {
                                        $str = 'export HOME=/tmp && convert   -density 300 ' . public_path() . '/' . $path . '[0]' . '  -quality 100 -fill transparent -fuzz 20% -background white -flatten  ' . public_path() . '/' . $myimg;

                                        // shell_exec($str);
                                    }
                                    $upload[] = $path;
                                    $uploadimg[]= asset('assets/imges/ppt-logo.png');
                                    $userfilename[] = $tempname;

                                    if ($filesize < 1024) {
                                        $size = $filesize . 'B';
                                    } elseif ($filesize < 1048576) {
                                        $size = number_format((float)$filesize / 1024, 2, '.', '') . 'KB';
                                    } elseif ($filesize < 1073741824) {
                                        $size = number_format((float)$filesize / 1048576, 2, '.', '') . 'MB';
                                    } else {
                                        $size = number_format((float)$filesize / 1073741824, 2, '.', '') . 'GB';
                                    }

                                    $abc = implode(',', $upload);
                                    $request->session()->push('user.temp', $tempname);
                                    $request->session()->push('user.uploadimg', $myimg);
                                    $request->session()->push('user.uploads', $path);
                                    $request->session()->push('user.size', $size);
                                }
                            }else{
                                return 'false';
                            }
                        }else{
                            return 'false';
                        }
                    }
                    return 'done';
                }
            }


        }
