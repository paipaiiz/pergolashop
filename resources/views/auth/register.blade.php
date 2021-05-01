<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Pergola Online Shop</title>
    <!-- plugins:css -->
    <link rel="icon" href="{{ asset('images/LogoShot.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(fonts/Kanit-Light.ttf);
        }

        body {
            font-family: myFirstFont;
        }

    </style>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/horizontal-layout/style.css') }}">
    <link rel="stylesheet" href="{{ asset('images/favicon.png') }}">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel" style="background-color: #e3f0e6;">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-center p-5">
                                <div class="brand-logo">
                                    <img src="{{ asset('images/Logo.png') }}" alt="logo">
                                </div>
                                <h4>ยินดีต้อนรับ สู่ PERGOLA</h4>
                                <h6 class="font-weight-light" style="line-height: 25px;">กรุณาสมัครสมาชิก</h6>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                placeholder="ชื่อ-นามสกุล" name="name" value="{{ old('name') }}"
                                                required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                placeholder="อีเมล" name="email" value="{{ old('email') }}" required
                                                autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                placeholder="รหัสผ่าน" name="password" required
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-lg" placeholder="ยืนยันรหัสผ่าน"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 offset-md-12">
                                            <button type="submit"
                                                class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">
                                                {{ __('สมัครสมาชิก') }}
                                            </button>
                                        </div>
                                        <div class="text-center mt-4 font-weight-light">
                                            คุณมีบัญชีแล้วใช่ไหม? <a href="/login" class="text-success">เข้าสู่ระบบ</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <link rel="stylesheet" href="{{ asset('css/horizontal-layout/style.css') }}">
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
