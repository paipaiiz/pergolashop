@extends('template.user_template_horizontal')
@section('content')
    <div class="container my-3">
        <div class="card">
            <div class="card-body">
                <h3>รายละเอียดการซื้อสินค้า</h3>
                <table id="example" class="display table table-responsive-sm my-3" style="width:100%">
                    <thead align="center">
                        <tr>
                            <th>ลำดับ</th>
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @foreach ($data as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->total_price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>รวม</h4>
                            </td>
                            <td>
                            </td>
                            <td>
                                <h5>{{ $data->where('order_id', $data->order_id)->sum('quantity') }} ชิ้น</h5>
                            </td>
                            <td>
                                <h5>{{ $data->order->total_price }} บาท</h5>
                            </td>
                            <td>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">ข้อมูลลูกค้า</h3>
                    <button type="button" class="btn btn-rounded btn-secondary btn-md" data-toggle="modal"
                        data-target="#imageModal"><i class="mdi mdi-magnify" aria-hidden="true"></i>ขยายใบเสร็จ
                    </button>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">
                                        <img class="img-fluid show-modal" id="myImg"
                                            src="{{ asset('/images/' . $data->order->slip_payment) }}" alt="your image"
                                            width="300px" height="400px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                        </div>
                                        <div class="list d-flex align-items-center border-bottom pb-3">
                                            <div class="wrapper w-100 ml-3">
                                                <div class="row">
                                                    <label>ชื่อ-นามสกุล : </label>&nbsp;&nbsp;&nbsp;
                                                    <p> {{ $data->order->shipping_fullname }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list d-flex align-items-center border-bottom py-3">
                                            <div class="wrapper w-100 ml-3">
                                                <div class="row">
                                                    <label>ที่อยู่ : </label>&nbsp;&nbsp;&nbsp;
                                                    <p>บ้านเลขที่:{{ $data->order->shipping_house_number }}
                                                        ตำบล:{{ $data->order->shipping_district }}
                                                        อำเภอ:{{ $data->order->shipping_amphore }}
                                                        จังหวัด:{{ $data->order->shipping_province }}
                                                        รหัสไปรษณีย์:{{ $data->order->shipping_postal_code }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list d-flex align-items-center border-bottom py-3">
                                            <div class="wrapper w-100 ml-3">
                                                <div class="row"><label>เบอร์ติดต่อ : </label>&nbsp;&nbsp;&nbsp;
                                                    <p>{{ $data->order->shipping_tel }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4>หมายเหตุ* (ถ้ามี)</h4>
                    <textarea class="form-control" cols="120" rows="5" placeholder="แจ้งหมายเหตุ" disabled
                        name="order_note">{{ $data->order->order_note }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid" id="myImg" src="{{ asset('/images/' . $data->order->slip_payment) }}"
                        alt="your image" width="500px" height="800px" />
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" /> -->
<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
