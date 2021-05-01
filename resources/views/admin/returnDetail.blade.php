@extends('template.admin_vertical')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>รายละเอียดสั่งสินค้า</h3>
            <table class="table table-responsive-sm" id="myDataTable">
                <thead>
                    <tr>
                        <th>รหัสรายการสินค้า</th>
                        <th>สินค้า</th>
                        <th>ชื่อผู้ส่ง</th>
                        <th>จำนวน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->code }}</td>
                        <td>{{ $data->product_name }}</td>
                        <td>{{ $data->fullname }}</td>
                        <td>{{ $data->amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="container my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>รูปสินค้า</h3>
                                <button type="button" class="btn btn-rounded btn-inverse-secondary btn-sm"
                                    data-toggle="modal" data-target="#imageModal"><i class="mdi mdi-magnify"></i>ขยายใบเสร็จ
                                </button>
                                <div align="center">
                                    <img class="img-fluid show-modal" id="myImg"
                                        src="{{ asset('/images/' . $data->image) }}" alt="your image" width="300px"
                                        height="300px" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h3 style="color:red;">
                                    หมายเหตุ*
                                </h3><br>
                                <textarea class="form-control" cols="120" rows="5" placeholder="แจ้งหมายเหตุ" disabled
                                    name="note" style="color:black;">{{ $data->note }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="container my-3">
                <div class="card">
                    <div class="card-body">
                        <h3>รายละเอียดที่อยู่</h3>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <div class="wrapper w-100 ml-3">
                                <div class="row">
                                    <p>บ้านเลขที่: {{ $data->house_number }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <div class="wrapper w-100 ml-3">
                                <div class="row">
                                    <p>
                                        ตำบล: {{ $data->district }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <div class="wrapper w-100 ml-3">
                                <div class="row">
                                    <p>
                                        อำเภอ: {{ $data->amphore }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <div class="wrapper w-100 ml-3">
                                <div class="row">
                                    <p>
                                        จังหวัด: {{ $data->province }}
                                        รหัสไปรษณีย์: {{ $data->postal_code }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <div class="wrapper w-100 ml-3">
                                <div class="row">
                                    <p>
                                        รหัสไปรษณีย์: {{ $data->postal_code }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <div class="wrapper w-100 ml-3">
                                <div class="row"><label>เบอร์ติดต่อ : </label>&nbsp;&nbsp;&nbsp;
                                    <p>{{ $data->tel }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid" id="myImg" src="{{ asset('/images/' . $data->image) }}" alt="your image"
                        width="500px" height="800px" />
                </div>
            </div>
        </div>
    </div>
@endsection
