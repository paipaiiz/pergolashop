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

    <body>
        <div class="container">
            <h2>ชำระสินค้า</h2>
            <div class="row">
                <div class="col-sm-6 mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h3>ที่อยู่</h3>
                            </div><br>
                            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">
                                        ชื่อ-นามสกุล:
                                    </label><br>
                                    <input type="text" required name="shipping_fullname" id="" class="form-control"><br>
                                    <label for="">
                                        บ้านเลขที่-หมู่:
                                    </label><br>
                                    <input type="text" required name="shipping_house_number" id="" class="form-control"><br>
                                    <div id="app">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <addressinput-subdistrict name="shipping_district" id=""
                                                    v-model="subdistrict" required></addressinput-subdistrict>
                                            </div>
                                            <div class="col-sm-6">
                                                <addressinput-district name="shipping_amphore" required v-model="district">
                                                </addressinput-district>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <addressinput-province name="shipping_province" required v-model="province">
                                                </addressinput-province>
                                            </div>
                                            <div class="col-sm-6">
                                                <addressinput-zipcode name="shipping_postal_code" required
                                                    v-model="zipcode">
                                                </addressinput-zipcode>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="">
                                        เบอร์โทรติดต่อ:
                                    </label><br>
                                    <input type="text" name="shipping_tel" id="" required class="form-control"><br>
                                    <label for="">
                                        อื่นๆ:
                                    </label><br>
                                    <input type="text" name="shipping_note" id="" required class="form-control"><br>
                                    <div>
                                        <p>เลือกช่องทางการชำระเงิน:</p>
                                        <input type="radio" id="promtpay" name="payment_type" value="พร้อมเพย์"
                                            checked><label for="huey">&nbsp;&nbsp;พร้อมเพย์</label><br>
                                        <input type="radio" id="payment" name="payment_type" value="โอนผ่านธนาคาร"><label
                                            for="dewey">&nbsp;&nbsp;โอนผ่านธนาคาร</label><br>
                                        <input type="radio" id="destination" name="payment_type" value="ชำระปลายทาง"><label
                                            for="louie">&nbsp;&nbsp;ชำระปลายทาง</label><br>
                                    </div><br>

                                    <label for="">
                                        สลิปโอนเงิน:
                                    </label><br>
                                    <input type="file" name="slip_payment" id="" class="form-control text-truncate"><br>
                                </div>
                                <div align="center">
                                    <button type="submit" class="btn btn-rounded btn-inverse-primary"><i
                                            class="mdi mdi-cash"></i>&nbsp;ชำระเงิน</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h3>ช่องทางชำระเงิน</h3>
                            </div>
                            <div class="my-5" align="center">
                                <p>
                                <h4>จำนวน : {{ \Cart::session(auth()->id())->getContent()->count() }} รายการ</h4>
                                </p>
                                <p>
                                <h4>ยอดชำระ : {{ \Cart::session(auth()->id())->getTotal() }} บาท</h4>
                                </p>
                                <p>
                                <h4>ค่าจัดส่ง กทม. และปริมณฑล ฿50 : ต่างจังหวัด ฿100</h4>
                                </p>
                                <img class="img-md rounded img-fluid py-2" src="{{ asset('images/ktb.png') }}"
                                    alt="Responsive image" width="300px">
                                <img class="img-md rounded img-fluid py-2" src="{{ asset('images/scb.png') }}"
                                    alt="Responsive image" width="300px">
                                <img class="img-md rounded img-fluid py-2" src="{{ asset('images/promtpay.png') }}"
                                    alt="Responsive image" width="300px" height="300px">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
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
