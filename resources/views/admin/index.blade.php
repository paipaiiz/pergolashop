@extends('template.admin_vertical')
@section('content')
    <div class="row" align="center">
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                    <h6 class="font-weight-normal">ยอดขายทั้งหมด</h6>
                    <h2 class="mb-0">{{ $order->sum('total_price') }} บาท</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                <div class="card-body">
                    <h6 class="font-weight-normal">จำนวนคำสั่งซื้อทั้งหมด</h6>
                    <h2 class="mb-0">{{ $order->count() }} รายการ</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                <div class="card-body">
                    <h6 class="font-weight-normal">จำนวนผู้ใช้งานทั้งหมด</h6>
                    <h2 class="mb-0">{{ $user->count() }} คน</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">ผู้ใช้งานทั้งหมด</h6>
                    </div>
                    <table class="display table table-responsive-md" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $index => $user)
                                <tr>
                                    <td>
                                        <div class="list d-flex align-items-center pb-3">
                                            <img class="img-sm rounded-circle" src="{{ asset('images/logo-mini.png') }}"
                                                alt="">
                                            <div class="wrapper w-100 ml-3">
                                                <p class="mb-0">{{ $user->name }}</p>
                                                <small class="text-muted">{{ $user->email }}</small>
                                                <small class="text-muted">(สมัครสมาชิกเมื่อ
                                                    {{ date('d-m-Y', strtotime($user->created_at)) }})</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">รายการสั่งซื้อ</h4>
                    <div class="d-flex table-responsive">
                        <!-- <div class="btn-group mr-2">
                                    <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Add</button>
                                </div> -->
                        <!-- <div class="btn-group mr-2">
                                    <button type="button" class="btn btn-light"><i class="mdi mdi-alert-circle-outline"></i></button>
                                    <button type="button" class="btn btn-light"><i class="mdi mdi-delete-empty"></i></button>
                                </div> -->
                        <div class="btn-group mr-2">
                            <a class="btn btn-rounded btn-inverse-secondary" href="{{ route('order.print') }}"><i
                                    class="mdi mdi-printer"></i>&nbsp;&nbsp;พิมพ์ยอดสั่งซื้อ</a>
                        </div>
                        <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-light"><i class="mdi mdi-cloud"></i></button>
                                    <button type="button" class="btn btn-light"><i class="mdi mdi-dots-vertical"></i></button>
                                </div> -->
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="display table table-responsive-md" id="example" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อผู้สั่ง</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>ราคารวม</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getOrder as $index => $getOrder)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $getOrder->user->name }}</td>
                                        <td>{{ $getOrder->product_count }}</td>
                                        <td>{{ $getOrder->total_price }} บาท</td>
                                        <td>
                                            @if ($getOrder->status === 'รอการยืนยัน')
                                                <div class="badge badge-warning badge-fw"> {{ $getOrder->status }} </div>
                                            @elseif ( $getOrder->status === "ยืนยัน")
                                                <div class="badge badge-success badge-fw"> {{ $getOrder->status }}
                                                </div>
                                            @else
                                                <div class="badge badge-danger badge-fw"> {{ $getOrder->status }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    </div>
@endsection
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
