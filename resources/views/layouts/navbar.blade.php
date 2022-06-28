<div id="navbar">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="assets/imges/logo/navlogo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('index') }}">Rumah</a>
                    </li>

                    <li class="nav-item mx-lg-5">
                        <a class="nav-link " aria-current="page" href="{{ route('blogs.index') }}">Blog</a>
                    </li>

                </ul>
                <div>
                    <a class="btn contactus-btn " href="{{ route('contactus.index') }}">Hubungi ka</a>
                </div>
            </div>
        </div>
    </nav>
</div>
