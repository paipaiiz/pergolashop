<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pergola Online Shop Management</title>
    <!-- plugins:css -->
    <link rel="icon" href="{{ asset('images/LogoShot.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-dark/style.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('images/favicon.png') }}">
    <style>
        @media print {
            .noPrint {
                display: display: block;
                ;
            }

            .printable * {
                display: block;
            }


        }

        @media screen {
            .onlyPrint {
                display: none;
            }
        }

    </style>
</head>

<body class="sidebar-dark ">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row printable">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('images/Logo.png') }}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('images/logo-mini.png') }}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end ">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <li class="nav-item nav-profile dropdown">
                                    <a class="nav-link dropdown-toggle text-light  mdi mdi-account" style="font-size:0.8vw;" href="#" data-toggle="dropdown" id="profileDropdown">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                        aria-labelledby="profileDropdown">
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item " href="/home" target="blank" ;
                                            document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-account-box"></i>ไปยังส่วนผู้ใช้งาน
                                        </a>
                                        <a class="dropdown-item " href="{{ route('logout') }}"
                                            onclick="event.preventDefault();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-logout"></i>{{ __('ออกจากระบบ') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            @endauth
                        </div>
                    @endif
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/index">
                            <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                            <span class="menu-title">แดชบอร์ด</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/manage">
                            <i class="mdi mdi-broom  menu-icon"></i>
                            <span class="menu-title">จัดการสินค้า</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/order">
                            <i class="mdi mdi-package-variant-closed menu-icon"></i>
                            <span class="menu-title">จัดการรายการสั่งซื้อสินค้า</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/return">
                            <i class="mdi mdi-send menu-icon"></i>
                            <span class="menu-title">จัดการรายการคำร้องเคลมสินค้า</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-view-list menu-icon"></i>
                        <span class="menu-title">จัดการยอดสั่งซื้อ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-numeric menu-icon"></i>
                        <span class="menu-title">พิมพ์รายละเอียดการจัดส่ง</span>
                    </a>
                </li> -->
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel id=" printOrder"">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer> -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- Load Facebook SDK for JavaScript -->
        <!-- <div id="fb-root"></div>
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
    </script> -->
        <!-- Your Chat Plugin code -->
        <!-- <div class="fb-customerchat" attribution=setup_tool page_id="102532821672027" theme_color="#2cd5c7" logged_in_greeting="Hi" logged_out_greeting="Hi">
    </div> -->

        <!-- page-body-wrapper ends -->
        <!-- </div> -->
        <!-- container-scroller -->

        <!-- <script>
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
    </script> -->
        <!-- page-body-wrapper ends -->
        <!-- </div> -->
        <!-- container-scroller -->

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
        <script src="{{ asset('js/formpickers.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <!-- End custom js for this page-->
</body>

</html>
