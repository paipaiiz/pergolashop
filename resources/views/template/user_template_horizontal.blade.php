<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pergola Online Shop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- plugins:css -->
    <link rel="icon" href="{{ asset('images/LogoShot.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/horizontal-layout/style.css') }}">
    <link rel="stylesheet" href="{{ asset('images/favicon.png') }}">
    <!-- endinject -->
    <script src="https://scripts.sirv.com/sirv.js"></script>
</head>
<style>
    .badged {
        padding-left: 9px;
        padding-right: 9px;
        -webkit-border-radius: 9px;
        -moz-border-radius: 9px;
        border-radius: 9px;
    }

    .labeld-warning[href],
    .badged-warning[href] {
        background-color: white;
        border-color: #c67605;
    }

    #lblCartCountd {
        font-size: 12px;
        background: white;
        border-color: #ff0000;
        color: #ff0000;
        padding: 0 7px;
        vertical-align: text-top;
        margin-left: -20px;
    }

</style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0 bt-0"
                style="background-color: #badcc4; border-color: #badcc4;">
                <div class="nav-top flex-grow-1">
                    <div class="container d-flex h-100 align-items-center">
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo" href="/home"><img src="{{ asset('images/Logo.png') }}"
                                    alt="logo" /></a>
                            <a class="navbar-brand brand-logo-mini" href="/home"><img
                                    src="{{ asset('images/logo-mini.png') }}" alt="logo" /></a>
                        </div>
                        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end flex-grow-1">
                            <ul class="navbar-nav navbar-nav-right">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <li class="nav-item dropdown">
                                        <div>
                                            <i class="mdi mdi-basket text-dark" style="font-size:27px"></i>
                                            <span class='badged badged-warning' id='lblCartCountd'> @auth
                                                    {{ Cart::session(auth()->id())->getContent()->count() }}
                                                @else
                                                    0
                                                @endauth
                                            </span>
                                        </div>
                                    </li>
                                </a>
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <li class="nav-item nav-profile dropdown">
                                                <a class="nav-link dropdown-toggle text-dark mdi mdi-account" style="font-size:0.8vw;" href="#" data-toggle="dropdown" id="profileDropdown">{{ Auth::user()->name }}</a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                    aria-labelledby="profileDropdown">
                                                    <div class="dropdown-divider"></div>
                                                    @if (Auth::user()->status === 'user')<a
                                                            class="dropdown-item" style="background-color: #e3f0e6;"
                                                            href="{{ route('user.edit', Auth::user()->id) }}">
                                                            <i class="mdi mdi-account-edit"></i>แก้ไขข้อมูลส่วนตัว
                                                    </a>@elseif(Auth::user()->status === 'admin')<a
                                                            class="dropdown-item" style="background-color: #e3f0e6;"
                                                            href="/admin" target="blank">
                                                            <i class="mdi mdi-home-variant"></i>จัดการข้อมูลร้าน
                                                        </a>@endif
                                                    <a class="dropdown-item " style="background-color: #e3f0e6;"
                                                        href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   document.getElementById('logout-form').submit();">
                                                        <i class="mdi mdi-logout"></i>{{ __('ออกจากระบบ') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('ออกจากระบบ') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item nav-profile dropdown">
                                                <a class="text-dark" alt="profile">กรุณาเข้าสู่ระบบ</a>
                                                <a class="nav-link dropdown-toggle text-dark" href="#"
                                                    data-toggle="dropdown" id="profileDropdown"></a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                    aria-labelledby="profileDropdown">
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" style="background-color: #e3f0e6;"
                                                        href="{{ route('login') }}">
                                                        <i class="mdi mdi-account-edit"></i>เข้าสู่ระบบ
                                                    </a>
                                                    <a class="dropdown-item " style="background-color: #e3f0e6;"
                                                        href="{{ route('register') }}">
                                                        <i class=" mdi mdi-logout"></i>{{ __('สมัครสมาชิก') }}
                                                    </a>
                                                </div>
                                            </li>
                                        @endauth
                                    </div>
                                @endif
                            </ul>
                            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                                type="button" data-toggle="horizontal-menu-toggle">
                                <span class="mdi mdi-menu"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar" style="background-color: #badcc4; border-color: #badcc4;">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                <i class="mdi mdi-home menu-icon"></i>
                                <span class="menu-title">หน้าแรก</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/product">
                                <i class="mdi mdi-flower  menu-icon"></i>
                                <span class="menu-title">สินค้า</span>
                            </a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="/supply">
                                    <i class="mdi mdi-shopping menu-icon"></i>
                                    <span class="menu-title">ประวัติการซื้อ</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/service">
                                <i class="mdi mdi-alert-circle menu-icon"></i>
                                <span class="menu-title">การช่วยเหลือ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- partial -->
        <div class="row">
            {{-- <div class="col col-sm-1">
            </div> --}}
            <div class="col">
                <div class="container-fluid page-body-wrapper">
                    <div class="main-panel">
                        <div class="content-wrapper">
                            @yield('content')
                        </div>
                        <footer class="footer pt-3" style="background-color: #badcc4; border-color: #badcc4;">
                            <div class="w-100 clearfix">
                                <div class="container">
                                    <div class="row-sm" align="center">
                                        <div class="col col-sm col-md-6" align="center">
                                            <div class="col px-0" align="center">
                                                <img src="{{ asset('images/Pergola.png') }}" alt="logo"
                                                    align="center" width="100px" />
                                            </div><br>
                                            <div class="row-3" align="center">
                                                <a class="px-2" href="https://www.facebook.com/pergolaservice"
                                                    target="blank"><img src="{{ asset('images/facebook.png') }}"
                                                        alt="logo" align="center" width="40px" /></a>
                                                <a class="px-2" href="https://www.instagram.com/pergola_shop"
                                                    target="blank"><img src="{{ asset('images/instagram.png') }}"
                                                        alt="logo" align="center" width="40px" /></a>
                                                <a class="px-2" href="https://lin.ee/jq4ITch" target="blank"><img
                                                        src="{{ asset('images/line.png') }}" alt="logo"
                                                        align="center" width="40px" /></a>
                                            </div><br>
                                            <div>
                                                <span align="center"
                                                    class="text-center text-sm-left d-block d-sm-inline-block text-dark">©
                                                    2021 <a href="https://www.facebook.com/pergolaservice/"
                                                        target="_blank">Pergola Online Shop.</a> All rights
                                                    reserved.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </footer>
                    </div>
                    <!-- main-panel ends -->
                </div>
            </div>
        </div>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v9.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

        </script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="102532821672027" theme_color="#2cd5c7"
            logged_in_greeting="Hi" logged_out_greeting="Hi">
        </div>

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script>
        function openForm() {
            var test = document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

    </script>
    <script>
        ! function(e, t, a) {
            var c = e.head || e.getElementsByTagName("head")[0],
                n = e.createElement("script");
            n.async = !0, n.defer = !0, n.type = "text/javascript",
                n.src = t + "/static/js/chat_widget.js?config=" + JSON.stringify(a), c.appendChild(n)
        }
        (document, "https://app.engati.com", {
            bot_key: "18e7884b402d4ba8",
            welcome_msg: true,
            branding_key: "default",
            server: "https://app.engati.com",
            e: "p"
        });

    </script>
    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/wizard.js') }}"></script>
    <script src="{{ asset('js/dropify.js') }}"></script>
    <script src="{{ asset('js/tooltips.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
