@extends('template.user_template_horizontal')

@section('content')
    @if (session()->has('success'))
        <script>
            alert('ทำรายการสำเร็จ')

        </script>
    @endif
    <div class="card" style="background-color: #f3f3f9;">
        <div class="card-body pt-0 pb-0 px-0" style="height: 30px;">@include('component.search')</div>
    </div><br>
    <div class="card" style="background-color: #e3f0e6;">
        <div class="card-body">
            <p>พบ {{ $data->count() }} ผลการค้นหา ค้นหา ' {{ request()->input('query') }}'</p>
            <div class="wrapper d-flex align-items-center justify-content-start justify-content-center flex-wrap">
                @foreach ($data as $data)
                    <div class="wrapper m-4">
                        <div class="card" align="center" style="background-color: white; border-color: white;">
                            <!-- <div class="bg-success card-header ">{{ $data->product_name }}</div> -->
                            <div class="card-footer p-0 w-100" align="left" style="background-color: white;">
                                <div class="row-6">
                                    <!-- <span class ="px-3 text-light w-100" style="background-color: red;">New</span> -->
                                    @if ($data->status === 'sale')
                                        <span class="px-3 py-0 text-light w-100"
                                            style="background-color: orange;">Sale</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body pt-3 pl-3 pr-3 pb-0">
                                <div class="container">
                                    <div class="img-product">
                                        <img class="show-modal img-md rounded" id="myImg"
                                            src="{{ asset('/images/' . $data->product_image) }}" alt="your image"
                                            width="180" height="180" />
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="font-weight-medium">
                                    <h4 style="line-height: 20px;">{{ $data->product_name }}
                                    </h4>
                                    </p>
                                    <p class="font-weight-medium">
                                    <h5 style="line-height: 20px;">&nbsp;฿{{ $data->product_price }}&nbsp;@if ($data->status === 'sale')<del class="text-danger"
                                                style="line-height: 20px;">฿{{ $data->product_old_price }}</del>
                                        @endif
                                    </h5>
                                    </p>
                                </div><br>
                                <div align="right">
                                    <p class="font-weight-medium">
                                    <h6 class="mb-0" style="line-height: 20px;">
                                        @if ($data->product_amount > 0)
                                            มีสินค้าทั้งหมด: {{ $data->product_amount }} ต้น
                                        @elseif( $data->product_amount <= 0) <h6 class="text-danger">สินค้าหมด
                                    </h6>
                @endif
                </h6>
                </p>
            </div>
        </div>
        <div class="card-footer p-0" style="border-color: white;">
            <div class="btn-group w-100">
                @if ($data->product_amount > 0)<a
                        href="{{ route('cart.add', $data->id) }}" class="btn btn-light btn-fw w-100 p-2"><i
                            class="mdi mdi-cart"></i>&nbsp;เพิ่มเข้าตะกร้า</a>@endif
                <a href="{{ route('product.detail', $data->id) }}" class="btn btn-light btn-fw w-100 p-2"><i
                        class="mdi mdi-magnify"></i>&nbsp;ดูรายละเอียด</a>
            </div>
        </div>

    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>
@endsection
<script>

</script>
