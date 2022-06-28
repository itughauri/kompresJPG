 // /byurl
    public function byurl(Request $request)
    {
            $filepdf = file_get_contents($request->linkhere);
            $hash = Str::uuid()->toString();
            $hash = Str::uuid()->toString();
            $filehash = $hash . '.pdf';
            $pathhash = 'unirpdfs/' . $hash . '.pdf';
            $filepath = public_path($pathhash);
            file_put_contents($filepath, $filepdf);

            if ($filepath) {
                $filesize = \File::size($filepath);
                $myimg = str_replace('.pdf', '.png', $pathhash);
                $command = "export HOME=/tmp && convert   " . public_path('unirpdfs/') . $filehash . "[0]" . "  " . public_path('unirpdfs/') . $hash . ".png";
                shell_exec($command);
                $lastelement = explode(".pdf",  $request->filename);
                $fileSize = \File::size(public_path('unirpdfs/') . $hash. ".png");
                if ($fileSize)
                {
                $data =
                    [
                        "file" =>  'unirpdfs/'. $filehash ,
                        "file_img" => 'unirpdfs/'. $hash . ".png" ,
                        "size" => $this->formatSizeUnits($filesize),
                        "name" => $lastelement[0],
                    ];
                $request->session()->push("data", $data);

                }
                else
                {
                return 'error';

                }
            } else {
                return 'error';
            }
            return "success";
    }
