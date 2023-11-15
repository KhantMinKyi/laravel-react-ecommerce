<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Ecommerce
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    {{-- Toastify JS Css --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        .centered {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    {{-- Custome css --}}

    @yield('css')
</head>

<body class="">
    <div class=" position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg bg-white border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4 ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{ url('/') }}">Area's Shoppy</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fa fa-solid fa-list mt-2"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            {{-- Left Side Of Nav --}}
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('/') ? 'active text-primary' : '' }}"
                                        aria-current="page" href="/">{{ __('site.nav_home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('product*') ? 'active text-primary' : '' }} "
                                        href={{ url('/products') }} tabindex="-1" aria-disabled="true">
                                        {{ __('site.nav_products') }}</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Categories
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Brands
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ url('/about') }}" tabindex="-1"
                                        aria-disabled="true">{{ __('site.nav_aboutUs') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ url('/contact') }}" tabindex="-1"
                                        aria-disabled="true">{{ __('site.nav_contactUs') }}</a>
                                </li>
                            </ul>
                            {{-- Right Side Of Nav --}}
                            <ul class="navbar-nav justify-content-end">
                                <li class="nav-item d-flex align-items-center">
                                    <a href="/profile#/cart" class="nav-link  font-weight-bold px-0 ">
                                        <i class="fa fa-solid fa-cart-plus ">
                                        </i>
                                    </a>
                                    <small class=" badge bg-danger me-3 rounded-circle mb-2" style="font-size: 10px;"
                                        id="cartCount">
                                        {{ $cart_count }}
                                    </small>
                                </li>
                                {{-- Guest Show Nav --}}
                                @guest
                                    <li class="nav-item dropdown pe-2 px-3 d-flex align-items-center">
                                        <a href="#" class="nav-link text-dark p-0" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user "></i>
                                            <span class="d-sm-inline d-none">{{ __('site.nav_user') }}</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                            aria-labelledby="dropdownMenuButton">
                                            <li class="mb-2">
                                                <a class="dropdown-item border-radius-md" href="{{ url('/login') }}">
                                                    <div class="d-flex py-1">
                                                        <div class="d-flex justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">Login</span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a class="dropdown-item border-radius-md" href="{{ url('/register') }}">
                                                    <div class="d-flex py-1">
                                                        <div class="d-flex justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">Register</span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                                @auth
                                    <li class="nav-item dropdown pe-2 px-3 d-flex align-items-center">
                                        <a href="#" class="nav-link text-dark p-0 " id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user "></i>
                                            <span
                                                class="d-sm-inline d-none {{ request()->is('profile*') ? 'text-primary' : '' }}">{{ auth()->user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                            aria-labelledby="dropdownMenuButton">
                                            <li class="mb-2">
                                                <a class="dropdown-item border-radius-md" href="{{ url('/profile') }}">
                                                    <div class="d-flex py-1">
                                                        <div class="my-auto">
                                                            <img src="{{ auth()->user()->img_url }}"
                                                                class="avatar avatar-sm me-3" />
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">Profile</span>
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a class="dropdown-item border-radius-md" href="{{ url('/logout') }}">
                                                    <div class="d-flex py-1">
                                                        <div class="d-flex justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">Log Out</span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth



                                <li class="nav-item dropdown pe-2 px-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link p-0" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-solid fa-globe cursor-pointer"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="{{ url('/locale/en') }}">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="https://flagcdn.com/h20/gb.png"
                                                            srcset="https://flagcdn.com/h40/gb.png 2x,
                                                          https://flagcdn.com/h60/gb.png 3x"
                                                            height="20" class=" me-3" />
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">English</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="{{ url('/locale/mm') }}">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="https://flagcdn.com/h20/mm.png"
                                                            srcset="https://flagcdn.com/h40/mm.png 2x,
                                                        https://flagcdn.com/h60/mm.png 3x"
                                                            height="20" class=" me-3" />
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">Myanmar</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <div>
        {{-- bg image --}}
        <div class="bg-image rounded fadein"
            style="
    background-image: url({{ asset('/assets/img/vr-bg.jpg') }});
    height: 65vh;
    background-size: cover;
    background-position: center;
  ">
            <div class="centered row">
                <h2>Area's <b class="text-primary bg-white rounded px-2 py-1">SHOPPY </b></h2>
                @guest
                    <div class="col-12 ">
                        <span class="text-white text-center mt-2">{{ __('site.home_banner') }}</span>
                    </div>
                    <div class="mt-4 col-12">
                        <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                        <a href="{{ url('/register') }}" class="btn btn-dark">Register</a>
                    </div>
                @endguest
                @auth
                    <div class="col-12 ">
                        <span class="text-white text-center mt-2">Your Best Shopping Area!</span>
                    </div>
                    <div class="col-12 ">
                        <h3 class="text-white text-center mt-2">@yield('header-text')</h3>
                    </div>
                @endauth
            </div>
        </div>

        <main class="main-content  mt-0">
            <section>
                @yield('content')
            </section>
        </main>
        @include('Layouts.fooder')


        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
        {{-- Toastify Js --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        @if (session()->has('error'))
            <script>
                Toastify({
                    text: "{{ session('error') }}",
                    className: "info",
                    position: 'center',
                    style: {
                        background: "#FF5537",
                        opacity: "0.8",
                    }
                }).showToast();
            </script>
        @endif
        @if (session()->has('success'))
            <script>
                Toastify({
                    text: "{{ session('success') }}",
                    className: "info",
                    position: 'center',
                    style: {
                        background: "#235426",
                        opacity: "0.8",
                    }
                }).showToast();
            </script>
        @endif
        <script>
            // Update Cart
            window.updateCart = cart => {
                const cartCount = document.getElementById('cartCount');
                cartCount.innerText = cart;
            }
            // user to react
            window.auth = @json(auth()->user());
            // language to react
            window.locale = "{{ app()->getLocale() }}"

            // toastify to react
            const showToast = (message, type = "success") => {
                Toastify({
                    text: message,
                    className: "info",
                    position: 'center',
                    style: {
                        background: [
                            type === "success" ? "#235426" : "#FF5537"
                        ],
                        opacity: "0.8",
                    }
                }).showToast();
            }
        </script>
        {{-- Custome Js --}}
        @yield('script')
</body>

</html>
