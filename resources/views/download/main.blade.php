<section class="download py-40 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h3 class="section-title  mb-4">Unduh File</h3>
                <div class="customize-imgs bg-white shadow">
                    <div class="img-preview d-flex flex-wrap justify-content-center">
                        <div class="mypreview d-flex breadcrumb mt-2 text-center">
                            @if (session()->has('opt'))
                            @if (is_array(session('opt')))  
                            @foreach (session('opt') as $key => $img)
                            <div class="previewofimg m-2 downloadable-file d-flex flex-column ">
                                <img class="img-fluid file-img pathcus" data-name="{{ basename($img) }}" src="{{ asset($img) }}" alt="">
                                <a href="{{ asset($img) }}" download class="btn cross-btn"> <img src="assets/imges/icons/download/downloadicon.svg" alt=""> </a>
                                <div class="loading">
                                    @if (session('optimize.size'))
                                    {{-- @if (session('percentage')) --}}
                                    <span class="download-percentage" style="font-size: 12px;" >{{ session('optimize.size')[$key] }}</span>
                                    @else
                                    <span class="download-percentage">Customize</span>
                                    {{-- @endif --}}
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="previewofimg m-2 downloadable-file d-flex flex-column ">
                                <img class="img-fluid file-img" src="{{ asset(session('opt')) }}" alt="">
                                <a href="{{ asset(session('opt')) }}" download class="btn cross-btn"> <img src="assets/imges/icons/download/downloadicon.svg" alt=""> </a>
                                <div class="loading">
                                    @foreach (session('percentage') as $item)
                                    <span class="download-percentage">{{ $item . '%' }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="previewofimg m-2 downloadable-file d-flex flex-column ">
                                <img class="img-fluid file-img" src="{{ asset('assets/imges/home/blog/blog-pic2.png') }}" alt="">
                                <button class="btn cross-btn"> <img src="assets/imges/icons/download/downloadicon.svg" alt=""> </button>
                                <div class="loading">
                                    <span class="download-percentage">-65%</span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-center d-flex align-items-center justify-content-center flex-wrap ">
                        <a href="{{ route('zip.download') }}" download="optimizefiles" class="btn  compress-file-btn download-btn"> <img src="assets/imges/icons/download/downloadfile.svg" alt=""> Unduh File Zip </a>
                        <a href="{{ route('download.redirect') }}" class="btn download-btn text-white restatrt-btn mt-md-4"><img src="assets/imges/icons/download/restart.svg" alt="">Mengulang kembali</a>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-center ">
                            <form action="{{ route('share.mail') }}" method="post">
                                @csrf
                                <label class="mb-2" id="share-label" for="share">Masukkan Email untuk Berbagifile</label>
                                <div style="position: relative;">
                                    <input type="text" class="form-control" name="share" id="share" placeholder="Example@gmail.com">
                                    <button type="submit" style="position: absolute;" id="send-btn" class="btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" id="share-container">
                            <a href="" data-bs-toggle="modal" data-bs-target="#ShareModal"><img src="{{ asset('assets/share-icons/link.svg') }}" class="share-icon" alt=""></a>
                            <a id='web' onclick="whatsapp()" style="margin-left: 15px" href="" target="_blank"><img src="{{ asset('assets/share-icons/whatsapp.svg') }}" class="share-icon" alt=""></a>
                        </div>
                        @include('download.popups.share')
                    </div>
                    <div class="mt-3">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function() {
            var pdfarry = [];
            $('.pathcus').each(function() {
                let mysrc = $(this).data('name');
                pdfarry.push(mysrc);
            });
            let url = window.location.href.split("/download")[0] + '/copy/' + btoa(pdfarry)
            $("#link").val(url);
            $.ajax({
                url: "/copy/" + url
                , type: 'get'
                , success: function(response) {}
            })
            $('#copyLink').click(function() {
                var value = $('input[name="link"]').select()
                document.execCommand("copy");
                $("#mail-alert").show(300);
                setTimeout(() => {
                    $("#mail-alert").hide(300);
                }, 3000);
                $('#copyLink1').modal('toggle')
            });
        })

    </script>
    @endpush
</section>
