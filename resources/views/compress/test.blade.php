<section class="upload-file py-40 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="section-title mb-0">
                    Kompress <span style="color: #28a79e">JPG</span>
                </h1>
                <p class="text-center mt-2 mb-4">
                    Mengompres file JPG online. Tidak ada kehilangan kualitas dan
                    kejelasan; ucapkan selamat tinggal pada gambar buram.
                </p>
                {{-- route for upload --}}
                <div class="d-none" id="redirect" data-route="{{ route('compress.index') }}"></div>
                {{-- end --}}
                <div id="resumable-drop" class="upload-area shadow-sm text-center p-4">
                    <img src="{{ asset('assets/imges/icons/upload.svg') }}" alt="" />
                    <div class="upload-btn-wrapper">
                        <label data-url="{{ route('upload') }}" id="resumable-browse" class="ppt-btn upload-btn">
                            <span> </span>
                            <span class="me-2"><svg id="Group_3932" data-name="Group 3932"
                                    xmlns="http://www.w3.org/2000/svg" width="23.152" height="25"
                                    viewBox="0 0 23.152 25">
                                    <g id="Group_3928" data-name="Group 3928">
                                        <g id="_23_Upload" data-name="23 Upload">
                                            <g id="Group_3927" data-name="Group 3927">
                                                <path id="Path_9806" data-name="Path 9806"
                                                    d="M22.022,231a1.179,1.179,0,0,0-1.13,1.221c0,5.547-4.178,10.059-9.315,10.059s-9.315-4.512-9.315-10.059A1.179,1.179,0,0,0,1.13,231,1.179,1.179,0,0,0,0,232.221a12.92,12.92,0,0,0,3.391,8.838,10.977,10.977,0,0,0,16.369,0,12.929,12.929,0,0,0,3.391-8.838A1.179,1.179,0,0,0,22.022,231Z"
                                                    transform="translate(0 -219.721)" fill="#fff" />
                                                <path id="Path_9807" data-name="Path 9807"
                                                    d="M153.533,5.493l1.8-1.8V16.25a1.221,1.221,0,1,0,2.441,0V3.691l1.8,1.8a1.222,1.222,0,0,0,1.729-1.729L158.235.693a2.375,2.375,0,0,0-3.354,0l-3.071,3.071a1.221,1.221,0,0,0,1.724,1.729Z"
                                                    transform="translate(-144.979 0)" fill="#fff" />
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                            Unggah data
                        </label>
                    </div>
                    <p class="text-center">Seret atau jatuhkan File Anda di sini</p>
                    <div class="d-flex justify-content-center flex-wrap other-sorces">
                        <div class="image-upload">
                            <label class="file-input" for="file-input"><img
                                    src="{{ asset('assets/imges/icons/Drive.svg') }}" alt="" /></label>
                            <input id="file-input" type="file" hidden />
                        </div>
                        <div class="image-upload">
                            <label class="file-input" for="file-input">
                                <img src="{{ asset('assets/imges/icons/Dropbox.svg') }}" alt="" />
                                <!-- <span>Dropbox</span> -->
                            </label>
                            <input id="file-input" type="file" hidden />
                        </div>

                        <div class="image-upload">
                            <div class="link" id="div-link">
                                <img src="assets/imges/icons/link.svg" alt="" />

                                <!-- <span>Link</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/chunk.min.js') }}"></script>
        <script src="{{ asset('assets/resumble.js') }}"></script>
        <script>
        </script>
    @endpush
</section>

