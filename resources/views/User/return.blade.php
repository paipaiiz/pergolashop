@extends('template.user_template_horizontal')

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Pergola Online Shop</title>
    <!-- plugins:css -->
    <link rel="icon" href="{{ asset('images/Logo_shot.png') }}" type="image/icon type">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script> <!-- CSS (optional) -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/vue-thailand-address@3/dist/vue-thailand-address.min.css" />
    <!-- JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/combine/npm/vue-thailand-address@3/dist/db.web.min.js,npm/vue-thailand-address@3">
    </script>
</head>
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>

    @elseif(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <body>
        <div class="container">
            <h2>คำขอเคลมสินค้า</h2>
            <form action="{{ route('return.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6 mb-1">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h3>ที่อยู่</h3>
                                </div><br>
                                @csrf
                                <div class="form-group">
                                    <label for="">
                                        ชื่อ-นามสกุล:
                                    </label><br>
                                    <input type="text" name="fullname" id="" required class="form-control"><br>
                                    <label for="">
                                        บ้านเลขที่-หมู่:
                                    </label><br>
                                    <input type="text" name="house_number" id="" required class="form-control"><br>
                                    <div id="app">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <addressinput-subdistrict name="district" required id=""
                                                    v-model="subdistrict">
                                                </addressinput-subdistrict>
                                            </div>
                                            <div class="col-sm-6">
                                                <addressinput-district name="amphore" required v-model="district">
                                                </addressinput-district>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <addressinput-province name="province" required v-model="province">
                                                </addressinput-province>
                                            </div>
                                            <div class="col-sm-6">
                                                <addressinput-zipcode name="postal_code" required v-model="zipcode">
                                                </addressinput-zipcode>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="">
                                        เบอร์โทรติดต่อ:
                                    </label><br>
                                    <input type="text" name="tel" id="" required class="form-control"><br>
                                    <label for="">
                                        สาเหตุ:
                                    </label><br>
                                    <textarea class="form-control" cols="120" rows="2" required placeholder="แจ้งสาเหตุ"
                                        name="note"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h3>รายละเอียดสินค้า</h3>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อต้นไม้:</label>
                                    <input type="text" id="product_name" required name="product_name" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>รหัสรายการสินค้า:</label>
                                            <input type="text" id="code" required name="code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>จำนวน:</label>
                                            <input type="number" id="amount" required name="amount" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <label for="">
                                    แนบรูป:
                                </label>
                                <input type="file" name="product_image" id="" required class="form-control text-truncate"
                                    onchange="readURL(this);" placeholder="Add profile picture">
                                <br><div align="center">
                                    <img class="img-fluid img-md rounded show-modal" required id="product_image"
                                        src="/images/add_image.jpg" alt="your image" width="206px" height="206px" />
                                </div>  <br>
                                <div align="center">
                                        <button type="submit" class="btn btn-rounded btn-inverse-success">ยืนยัน</button>
                                        <a href="/service" class="btn btn-rounded btn-inverse-danger">ยกเลิก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            new Vue({
                el: '#app',
                data: {
                    subdistrict: '',
                    district: '',
                    province: '',
                    zipcode: ''
                }
            });

        </script>
    </body>

@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#product_image')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
