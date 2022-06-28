<footer id="footer" class="">
    <div class="container py-40">
        <div class="row d-flex justify-content-between ">
            <div class="col-lg-3 text-lg-start text-center   ">

                <a class="navbar-brand" href="{{ route('index') }}"><img src="assets/imges/logo/footerlogo.svg" alt=""></a>
                <p class="text-lg-start text-center footer-text  ">Kompresor jpg terbaik untuk digunakan secara gratis.</p>
            </div>
            <div class="col-lg-3  text-lg-start text-center  ">
                <div class="d-flex justify-content-center">
                    <ul class="list-unstyled mb-0">
                        <h4>informasi</h4>
                        <div>
                            <hr class="d-lg-block d-none"> </div>
                        <li><a href="{{ route('index') }}">Rumah</a></li>
                        <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                        <li><a href="{{ route('privacy_policy.index') }}">
                            Kebijakan pribadi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 text-lg-start text-center">
                <div class="d-flex justify-content-lg-end justify-content-center ">
                    <ul class="list-unstyled ">


                        <li><a href="{{ route('contactus.index') }}">Hubungi kami</a></li>
                        <li><a href="{{ route('terms.index') }}">Syarat dan ketentuan
                        </a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 text-lg-start text-center  ">
                <div class="d-flex justify-content-lg-end justify-content-center ">

                    <ul class="list-unstyled ">
                        <h4> Ikuti kami</h4>
                        <div>
                            <hr class="d-lg-block d-none"> </div>

                        <li>
                            <a class="me-3" href="#"><img src="{{ asset('assets/footer/fb.svg') }}" alt=""></a>
                            <a class="me-3" href="#"><img src="{{ asset('assets/footer/twitter.svg') }}" alt=""></a>
                            <a class="me-3" href="#"><img src="{{ asset('assets/footer/linked-in.svg') }}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-dark border-top text-white pt-2">© 2022 - All Rights Reserved. </p>
</footer>
