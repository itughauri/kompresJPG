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
                    <div class="upload-btn-wrapper d-flex justify-content-center">
                        <div data-url="{{ route('upload') }}" id="resumable-browse" class="ppt-btn upload-btn">
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
                        </div>
                    </div>
                    <ul id="sort"></ul>
                    <p class="text-center">Seret atau jatuhkan File Anda di sini</p>
                    <div class="d-flex justify-content-center flex-wrap other-sorces">
                        <div class="image-upload">
                            <label onclick="byGoogleDrive()" class="file-input" for="google-drive"><img
                                    src="{{ asset('assets/imges/icons/Drive.svg') }}" alt="" /></label>
                        </div>
                        <div class="image-upload">
                            <label class="file-input" for="dropbox">
                                <img src="{{ asset('assets/imges/icons/Dropbox.svg') }}" alt="" />
                                <!-- <span>Dropbox</span> -->
                            </label>
                            <input id="dropbox" type="file" hidden />
                        </div>

                        <div class="image-upload">
                            <div class="link" id="div-link">
                                <img onclick="openmodal()" src="assets/imges/icons/link.svg" alt="" />
                                <!-- <span>Link</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.popups.url')
    @section('scripts')
        <script src="{{ asset('assets/chunk.min.js') }}"></script>
        <script src="{{ asset('assets/resumble.js') }}"></script>
        <script src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="3fzifswyxgm6eeg"></script>
        <script type="text/javascript" src="https://apis.google.com/js/api.js?onload=loadPicker"></script>
        <script>
            $("#dropbox").click(function(e) {
                e.preventDefault();
                options = {
                    success: function(files) {
                        mylinkfilesave(files)
                    },
                    cancel: function() {},
                    linkType: "direct", // or "direct"
                    multiselect: true, // or true
                    extensions: ['.jpg', '.png', '.jpeg', '.gif', '.tif', '.webp', '.svg'],
                    folderselect: false, // or true
                };
                Dropbox.choose(options);
            })

            function mylinkfilesave(filesarray) {
                $('#loader').css(`display`, 'block');
                document.body.style.opacity = ".5"
                let linkarr = [];
                let filnamearr = [];
                for (var i = 0; i < filesarray.length; i++) {
                    linkarr.push(filesarray[i].link)
                    filnamearr.push(filesarray[i].name)
                }

                $.ajax({
                    url: "{{ route('dropbox') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        linkhere: linkarr,
                        filename: filnamearr
                    },
                    error: function() {
                        $('#loading').hide();
                        alert('Ada yang salah, coba lagi!');
                    },
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(response) {
                        console.log(response);
                        $('#loading').hide();
                        if (response == 'error') {
                            window.location.reload();
                        } else {
                            window.location.href = "{{ route('compress.index') }}";
                        }
                    },
                    complete: function(response) {
                        $('#loading').hide();
                    }
                });
            }

            //google-drive

            function byGoogleDrive() {

                loadPicker()
            }
            var developerKey = 'AIzaSyCUmjZCjoHybEsMzEkwdNOsaFxyyQnEMm4';
            var clientId = "310084687505-5pf3vv5tmjaqusgi5vcpvbp8k7nhcn4h.apps.googleusercontent.com"
            var appId = "310084687505";
            var scope = ['https://www.googleapis.com/auth/drive.file'];
            var pickerApiLoaded = false;
            var oauthToken;

            function loadPicker() {
                gapi.load('auth', {
                    'callback': onAuthApiLoad
                });
                gapi.load('picker', {
                    'callback': onPickerApiLoad
                });
            }

            function onAuthApiLoad() {
                window.gapi.auth.authorize({
                        'client_id': clientId,
                        'scope': scope,
                        'immediate': false
                    },
                    handleAuthResult);
            }

            function onPickerApiLoad() {
                pickerApiLoaded = true;
                createPicker();
            }

            function handleAuthResult(authResult) {
                if (authResult && !authResult.error) {
                    oauthToken = authResult.access_token;
                    createPicker();
                }
            }

            function createPicker() {

                if (pickerApiLoaded && oauthToken) {
                    var view = new google.picker.View(google.picker.ViewId.DOCS);
                    view.setMimeTypes(["image/png", "image/jpeg", "image/jpg", "image/gif", "image/tif", "image/svg",
                        "image/webp", "image/ico", "image/bmp"
                    ]);
                    var picker = new google.picker.PickerBuilder()
                        .enableFeature(google.picker.Feature.NAV_HIDDEN)
                        .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
                        .setAppId(appId)
                        .setOAuthToken(oauthToken)
                        .addView(view)
                        .addView(new google.picker.DocsUploadView())
                        .setDeveloperKey(developerKey)
                        .setCallback(pickerCallback)
                        .build();
                    picker.setVisible(true);
                }
            }

            function pickerCallback(data) {
                if (data.action == google.picker.Action.PICKED) {
                    mydlinkfilesave(data.docs, oauthToken)
                }
            }

            function mydlinkfilesave(docsarray, oauthToken) {
                $('#loader').css(`display`, 'block');
                document.body.style.opacity = ".5"
                let arraylink = [];
                let arrayfilename = [];
                let arrayfileid = [];
                for (var i = 0; i < docsarray.length; i++) {
                    arraylink.push(docsarray[i].url)
                    arrayfilename.push(docsarray[i].name)
                    arrayfileid.push(docsarray[i].id)
                }

                const object = {
                    _token: '{{ csrf_token() }}',
                    linkhere: arraylink,
                    filename: arrayfilename,
                    fileid: arrayfileid,
                    oauthToken: oauthToken
                };

                $.ajax({
                    url: `{{ route('google_drive') }}`,
                    method: "POST",
                    data: object,
                    error: function() {
                        $('#loading').hide();
                        alert('Ada yang salah, coba lagi!');
                    },
                    beforeSend: function() {
                        $('#loading').show();
                    },
                    success: function(response) {
                        $('#loading').hide();
                        if (response == 'error') {
                            window.location.reload();
                        } else {
                            window.location.href = "{{ route('compress.index') }}";
                        }
                    },
                    complete: function(response) {
                        $('#loading').hide();
                    }
                });
            }

            function openmodal() {
                $("#link").val('');
                $("#url").modal('show');
                $('#url').removeClass("modal-backdrop");
            }

            function Byurl() {
                var slices = $('#link').val()
                var sliceinindexing = slices.split("/")
                if (slices.indexOf(".jpg") != -1 || slices.indexOf(".jpeg") != -1 || slices.indexOf(".png") != -1) {
                    // It is a img
                    var totalsileces = slices.length;
                    if (slices != '' || slices != null) {
                        $.ajax({
                            url: '{{ route('byurl') }}',
                            method: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                linkhere: slices,
                                filename: sliceinindexing[sliceinindexing.length - 1]
                            },
                            error: function() {
                                $('#loading').hide();
                                alert('ada yang salah silakan coba lagi');
                            },
                            beforeSend: function() {
                                $('#loading').show();
                            },
                            success: function(response) {
                                if (response = 'done') {
                                    $('#loading').hide();
                                    window.location.href = "{{ route('compress.index') }}";
                                }
                            },
                            complete: function(response) {
                                $('#loading').hide();
                            }
                        });
                    } else {
                        $('#liveurlvalue').css('border-color', "red")
                    }
                } else {
                    $('#liveurlvalue').css('border-color', "red")
                    alert("Ini bukan URL gambar")
                }
                clearInterval(timeinterval);
            }
        </script>
    @endsection
</section>
