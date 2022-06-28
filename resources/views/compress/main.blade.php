<section class="upload-file py-40 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h3 class="section-title mb-4">Sesuaikan File</h3>
                <div class="customize-imgs bg-white shadow ">
                    <div class="row">
                        <div class="col-lg-6 file-view">
                            <h5>File</h5>
                            <div id="sort" class="img-preview d-flex flex-wrap">
                                <div class="mypreview d-flex breadcrumb  text-center">
                                    <div class="d-flex flex-column mt-2 d-none " id="loader"></div>
                                    @if (session()->has('user.uploads'))
                                        @foreach (session('user.uploads') as $item)
                                        <div class="previewofimg m-2  mt-2" data-id="{{ $item }}">
                                            <img class="img-fluid file-img" src="{{ asset($item) }}" alt="">
                                            <button class="btn cross-btn" data-id="{{ $item }}"><img
                                                    src="{{ asset('assets/imges/icons/compresspage/cross.svg') }}"
                                                    alt="" width="100%"> </button>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="mypreview text-center">
                                            <div class="previewofimg d-flex flex-column ">
                                                <img class="img-fluid file-img"
                                                    src="{{ asset('assets/imges/home/blog/blog-pic2.png') }}" alt="">
                                                <button class="btn cross-btn"> <img
                                                        src="{{ asset('assets/imges/icons/compresspage/cross.svg') }}"
                                                        alt="">
                                                </button>
                                            </div>
                                            {{-- <span class="file-name">File name.jpg</span> --}}
                                        </div>
                                    @endif
                                    <div id="resumable-drop"
                                        class="uploadmorefiles d-flex justify-content-center align-items-center">
                                        <input type="file" name="file" id="uploadmore" hidden>
                                        <div data-url="{{ route('upload') }}" id="resumable-browse" for="uploadmore"><img
                                                src="{{ asset('assets/imges/icons/compresspage/addmorefiles.svg') }}"
                                                alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  text-center ">
                            <div class="custom-imges ">
                                <h5>Filter Keluaran</h5>
                                <div class="custom-section">
                                    <ul class="nav nav-pills my-nav-pills  justify-content-center " id="pills-tab"
                                        role="tablist">
                                        <!-- set percentage btn starts -->
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link my-nav-btn1 btn-padding active" id="pills-home-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                role="tab" aria-controls="pills-home"
                                                aria-selected="true">Persentase</button>
                                        </li>
                                        <!-- set percentage btn ends -->

                                        <!-- Exact Output starts -->
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link my-nav-btn2 btn-padding" id="pills-profile-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                                role="tab" aria-controls="pills-profile" aria-selected="false">Keluaran
                                                yang Tepat</button>
                                        </li>
                                        <!-- Exact Output ends -->
                                    </ul>
                                    @csrf
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane Percentage text-start fade show active" id="pills-home"
                                            role="tabpanel" aria-labelledby="pills-home-tab">
                                            <span>Tetapkan Persentase</span>
                                            <div class="range">

                                                <input id="myinput"  type="range" min="1"  max="100" name="percentage" value="1"
                                                    oninput="this.nextElementSibling.value = this.value">

                                                <div class="text-end">
                                                    <output class="progressValue percentage-value" for="myinput"></output><span
                                                        style="color: #28A79E">%</span>

                                                </div>
                                            </div>
                                            <div class="suggestion ">
                                                <p class="mb-0">Jika file Anda<span
                                                        style="color: #28A79E; font-size: 14px;">10 MB</span>, maka
                                                    memilih <span
                                                        style="color: #28A79E; font-weight: bold;">50%</span>akan
                                                    menghasilkan file<span style="color: #28A79E; font-size: 14px;">5
                                                        MB</span> File.
                                                </p>
                                            </div>
                                            <div class="mycheckboxes">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Sesuaikan ukuran Gambar
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="add-custom-size ">
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div class="">
                                                        <div class="addsize">
                                                            <span>Lebar</span> <input value="{{ old('width') }}"
                                                                class="mysizeinput" name="width" type="number"
                                                                id="imgWidth">
                                                            <span class="mypx">px</span>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="addsize ">
                                                            <span>Tinggi</span> <input class="mysizeinput"
                                                                name="height"
                                                                data-route="{{ route('download.index') }}"
                                                                type="number" name="" id="imgHeight">
                                                            <span class="mypx">px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="button"  id="percent-submit"
                                                    class="btn  compress-file-btn">Kompres Gambar
                                                    <img class="ms-3"
                                                        src="{{ asset('assets/imges/icons/compresspage/compressbtnicon.svg') }}"
                                                        alt="">
                                                </button>
                                            </div>

                                        </div>
                                        <!-- exact output starts -->
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">
                                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                                <span>Ukuran file keluaran:</span>
                                                <div class="addsize">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        @if(session()->has('user.filesize'))
                                                        <input type="hidden" id="filesize" value="{{ array_sum(session()->get('user.filesize')) }}" >
                                                        @else
                                                        <input type="hidden" id="filesize" value="0" >
                                                        @endif
                                                        <input value="" class="mysizeinput" type="number" name="number"
                                                            id="custom-size">
                                                        <select style="background-color: #28A79E; color: white;"
                                                            name="file_size_type" id="file_size_type"
                                                            class="form-control">
                                                            <option value="KB" selected>B</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tbs two suggestion -->
                                            <div class="suggestion text-start ">
                                                <p class="mb-0"> Masukkan ukuran output yang tepat yang
                                                    Anda inginkan</p>
                                            </div>
                                            <div class="form-check  my-3 text-start">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" checked>
                                                <label class="form-check-label " for="flexCheckDefault">Sesuaikan
                                                    ukuran Gambar</label>
                                            </div>
                                            <div class="add-custom-size2">
                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div class="d-flex">
                                                        <div class="addsize">
                                                            <span>Lebar</span> <input class="mysizeinput"
                                                                type="number" name="" id="custom-width">
                                                            <span class="mypx">px</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="addsize ">
                                                            <span>Tinggi</span> <input class="mysizeinput"
                                                                type="number" name="" id="custom-height">
                                                            <span class="mypx">px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" id="customize-compress"
                                                    class="btn  compress-file-btn">Kompres Gambar<img
                                                        class="ms-3"
                                                        src="assets/imges/icons/compresspage/compressbtnicon.svg"
                                                        alt=""></button>
                                            </div>
                                        </div>
                                        <!-- exact output ends -->
                                    </div>
                                </div>
                                <!-- set percentage tab ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    {{-- <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script> --}}
    @push('scripts001')
        <script src="{{ asset('assets/chunk.min.js') }}"></script>
        <script src="{{ asset('assets/resumbleconvert.js') }}"></script>
        <script>
            $(document).ready(function() {
                $("#myinput").val('');
                //according to percentage
                $("#percent-submit").click(function() {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('compress.img') }}",
                        type: 'get',
                        data: {
                            percentage: $("#myinput").val(),
                            width: $("#imgWidth").val(),
                            height: $("#imgHeight").val()
                        },
                        success: function(response) {
                            if (response.error === true) {
                                alert(response.message);
                                return false;
                            } else {
                                window.location.href = '/download';
                            }
                        }
                    })
                })
                //customize
                $("#customize-compress").click(function() {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route('compress.customize') }}',
                        type: 'get',
                        data: {
                            filesize: $("#filesize").val(),
                            size: $("#custom-size").val(),
                            width: $("#custom-width").val(),
                            height: $("#custom-height").val(),
                        },
                        success: function(response) {
                            // console.log(response);
                            // return false;
                            if (response.error === true) {
                                alert(response.message);
                                return false;
                            } else {
                                window.location.href = '/download';
                            }
                        }
                    })
                })

                $(".cross-btn").click(function() {
                    let id = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route('compress.delete') }}',
                        type: 'get',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    })
                })
            })
        </script>
    @endpush
</section>
