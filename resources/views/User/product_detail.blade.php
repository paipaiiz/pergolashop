@extends('template.user_template_horizontal')

@section('content')
    <div class="card" style="background-color: #e3f0e6;">
        <div class="card-body pb-0">
            <div class="row rounded pt-5" style="background-color: white;">
                <div class="col-sm-6">
                    <img class="show-modal img-md rounded img-fluid" id="myImg"
                        src="{{ asset('/images/' . $data->product_image) }}" width="500px" height="500px" alt="your image"
                        style="align-items: center;" />
                    <br>
                    <div class="row ml-3">
                        @if ($data->product_360_link !== null)<img
                                src="{{ asset('images/360degree.png') }}" class="img-thumbnail" alt="360degree"
                                data-toggle="modal" data-target="#imageModal" aria-hidden="true" width="50px"
                                style="cursor: pointer">&nbsp;@endif
                        @if ($data->product_ar_id !== null)<img
                                src="{{ asset('images/AR-logo.png') }}" class="img-thumbnail" alt="ar" data-toggle="modal"
                                data-target="#imageModalAR" aria-hidden="true" width="50px" style="cursor: pointer">
                        @endif
                    </div><br>
                </div>
                <div class="col">
                    <p>
                    <h3>{{ $data->product_name }}</h3>
                    </p>
                    <p>
                    <h4 style="line-height: 25px;">ประเภท: {{ $data->product_type }} </h4>
                    </p>
                    <hr>
                    <p>
                    <h4>฿{{ $data->product_price }}&nbsp;@if ($data->status === 'sale')
                            <del class="text-danger" style="line-height: 20px;">฿{{ $data->product_old_price }}</del>
                        @endif
                    </h4>
                    </p>
                    <p>
                    <h4 style="line-height: 25px;">มีสินค้าทั้งหมด: {{ $data->product_amount }} ต้น</h4>
                    </p>
                    <hr>
                    <p>
                    <h4 style="line-height: 25px;">การจัดส่ง: ค่าจัดส่ง กทม. และปริมณฑล ฿50</h4>
                    <h4 style="line-height: 25px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        ต่างจังหวัด ฿100</h4>
                    </p>
                    <hr>
                    <p>
                    <h4 style="line-height: 25px;">รายละเอียดสินค้า:</h4>
                    </p>
                    <p>
                    <h5 style="line-height: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $data->product_detail }}</h5>
                    </p>
                    <hr>
                    <div class="card-footer p-0" style="background-color: white; border-color: white;">
                        @if ($data->product_amount > 0)
                            <a href="{{ route('cart.add', $data->id) }}"
                                class="btn btn-rounded btn-inverse-success btn-fw w-100"><i
                                    class="mdi mdi-cart"></i>&nbsp;เพิ่มเข้าตะกร้า</a>
                        @else
                            <a disabled class="btn btn-rounded btn-inverse-danger btn-fw w-100">
                                <i class="mdi mdi-cart"></i>&nbsp;สินค้าหมด</a>
                        @endif
                    </div><br>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="Sirv" data-src="{{ $data->product_360_link }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageModalAR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <iframe id="{{ $data->product_ar_id }}"
                            src="https://www.vectary.com/viewer/v1/?model={{ $data->product_ar_id }}&env=studio3&turntable=2"
                            frameborder="0" width="100%" height="480" alt="รูป AR"></iframe>
                    </div>
                </div>
            </div>
        </div>
        @if ($recommends)
            <div class="container">
                <div class="card-body">
                    <div class="card-title">สินค้าใกล้เคียง</div>
                    <div class="wrapper d-flex align-items-center justify-content-start justify-content-center flex-wrap">
                        @foreach ($recommends as $recommend)
                            <div class="wrapper m-4">
                                <div class="card" align="center" style="background-color: white; border-color: white;">
                                    <!-- <div class="bg-success card-header ">{{ $data->product_name }}</div> -->
                                    <div class="card-body pt-3 pl-3 pr-3 pb-0">
                                        <div class="container">
                                            <div class="img-product">
                                                <img class="show-modal img-md rounded" id="myImg"
                                                    src="{{ asset('/images/' . $recommend->product_image) }}"
                                                    alt="your image" width="180" height="180" />
                                            </div>
                                        </div>
                                        <div class="col"><br>
                                            <p class="font-weight-medium">
                                            <h4>{{ $recommend->product_name }}</h4>
                                            </p>
                                            <p class="font-weight-medium">
                                            <h5>฿{{ $recommend->product_price }}</h5>
                                            </p>
                                        </div><br>
                                        <div align="right">
                                            <p class="font-weight-medium">
                                            <h6 class="mb-0" style="line-height: 20px;">@if ($recommend->product_amount > 0)
                                                มีสินค้าทั้งหมด: {{ $recommend->product_amount }} ต้น
                                            @elseif( $recommend->product_amount <= 0) <h6 class="text-danger">สินค้าหมด</h6>
                                            @endif
                                            </h6>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0" style="border-color: white;">
                                        <div class="btn-group w-100">
                                            <a href="{{ route('cart.add', $recommend->id) }}"
                                                class="btn btn-light btn-fw w-100 p-2"><i
                                                    class="mdi mdi-cart"></i>&nbsp;เพิ่มเข้าตะกร้า</a>
                                            <a href="{{ route('product.detail', $recommend->id) }}"
                                                class="btn btn-light btn-fw w-100 p-2"><i
                                                    class="mdi mdi-magnify"></i>&nbsp;ดูรายละเอียด</a>
                                        </div>
                                    </div>

                                </div>
                            </div><br>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($duplicate !== [])
            <div class="container">
                <div class="card-body">
                    <div class="card-title">สินค้าที่คุณอาจจะชอบ</div>
                    <div class="wrapper d-flex align-items-center justify-content-start justify-content-center flex-wrap">
                        @foreach ($duplicate as $recommend)
                            <div class="wrapper m-4">
                                <div class="card" align="center" style="background-color: white; border-color: white;">
                                    <!-- <div class="bg-success card-header ">{{ $data->product_name }}</div> -->
                                    <div class="card-body pt-3 pl-3 pr-3 pb-0">
                                        <div class="container">
                                            <div class="img-product">
                                                <img class="show-modal img-md rounded" id="myImg"
                                                    src="{{ asset('/images/' . $recommend->product_image) }}"
                                                    alt="your image" width="180" height="180" />
                                            </div>
                                        </div>
                                        <div class="col"><br>
                                            <p class="font-weight-medium">
                                            <h4>{{ $recommend->product_name }}</h4>
                                            </p>
                                            <p class="font-weight-medium">
                                            <h5>฿{{ $recommend->product_price }}</h5>
                                            </p>
                                        </div><br>
                                        <div align="right">
                                            <p class="font-weight-medium">
                                            <h6 class="mb-0" style="line-height: 20px;">@if ($recommend->product_amount > 0)
                                                มีสินค้าทั้งหมด: {{ $recommend->product_amount }} ต้น
                                            @elseif( $recommend->product_amount <= 0) <h6 class="text-danger">สินค้าหมด</h6>
                                            @endif
                                            </h6>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0" style="border-color: white;">
                                        <div class="btn-group w-100">
                                            <a href="{{ route('cart.add', $recommend->id) }}"
                                                class="btn btn-light btn-fw w-100 p-2"><i
                                                    class="mdi mdi-cart"></i>&nbsp;เพิ่มเข้าตะกร้า</a>
                                            <a href="{{ route('product.detail', $recommend->id) }}"
                                                class="btn btn-light btn-fw w-100 p-2"><i
                                                    class="mdi mdi-magnify"></i>&nbsp;ดูรายละเอียด</a>
                                        </div>
                                    </div>

                                </div>
                            </div><br>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
