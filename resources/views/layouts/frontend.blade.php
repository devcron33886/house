<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ trans('panel.site_title') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<!-- ======= Property Search Section ======= -->
<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
        <form class="form-a">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label class="pb-2" for="Type">Keyword</label>
                        <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="Type">Type</label>
                        <select class="form-control form-select form-control-a" id="Type">
                            <option>All Type</option>
                            <option>For Rent</option>
                            <option>For Sale</option>
                            <option>Open House</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="city">City</label>
                        <select class="form-control form-select form-control-a" id="city">
                            <option>All City</option>
                            <option>Alabama</option>
                            <option>Arizona</option>
                            <option>California</option>
                            <option>Colorado</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="bedrooms">Bedrooms</label>
                        <select class="form-control form-select form-control-a" id="bedrooms">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="garages">Garages</label>
                        <select class="form-control form-select form-control-a" id="garages">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="bathrooms">Bathrooms</label>
                        <select class="form-control form-select form-control-a" id="bathrooms">
                            <option>Any</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="price">Min Price</label>
                        <select class="form-control form-select form-control-a" id="price">
                            <option>Unlimite</option>
                            <option>$50,000</option>
                            <option>$100,000</option>
                            <option>$150,000</option>
                            <option>$200,000</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-b">Search Property</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Property Search Section -->>
<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="{{ route('welcome') }}">OHR<span class="color-b">CS</span></a>

        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav mr-auto ml-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('all-properties') }}">Properties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('agents') }}">Agents</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01">
            <i class="bi bi-search"></i>
        </button>
    </div>
</nav><!-- End Header/Navbar -->
 @yield('content')
<!-- ======= Footer ======= -->
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">{{ trans('panel.site_title') }}</h3>
                    </div>
                    <div class="w-body-a">
                        <p class="w-text-a color-text-a">
                            Feel free to contact us.
                        </p>
                    </div>
                    <div class="w-footer-a">
                        <ul class="list-unstyled">
                            <li class="color-a">
                                <span class="color-text-a">Phone: </span> +250 784 820 467
                            </li>
                            <li class="color-a">
                                <span class="color-text-a">Email: </span> contact@ohrcs.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">{{ trans('panel.site_title') }}</span> All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End  Footer -->
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Template Main JS File -->
<script src="{{ asset('/js/main-script.js')}}"></script>
@yield('scripts')
</body>
</html>
