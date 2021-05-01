@extends('template.admin_vertical')
@section('content')
    <div class="container my-3">
        <div class="card">
            <form action="{{ route('admin.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                    <h4 class="card-title">แก้ไขสินค้า</h4><br>
                    <div class="row">
                        <div class="col-lg-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">
                                        <div><img class="img-fluid img-md rounded show-modal" id="product_image"
                                                src="{{ asset('/images/' . $data->product_image) }}" alt="your image" />
                                        </div><br>
                                        <input type="file" name="product_image" onchange="readURL(this);"
                                            placeholder="Add profile picture" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label>ชื่อสินค้า : </label>&nbsp;&nbsp;&nbsp;
                                    <input class="form-control" hidden type="text" name="id" value="{{ $data->id }}">
                                    <input class="form-control" type="text" name="product_name"
                                        value="{{ $data->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label>ราคา(บาท) </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control " type="number" name="product_price"
                                                value="{{ $data->product_price }}">
                                        </div>
                                        <div class="col-md-3">
                                            <h6>ราคาเดิม: {{ $data->product_old_price }} บาท</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ประเภท : </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-control" type="text" name="product_type"
                                        value="{{ $data->product_type }}">
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียดสินค้า : </label>&nbsp;&nbsp;&nbsp;
                                    <textarea class="form-control" type="text" cols="75" name="product_detail"
                                        rows="4">{{ $data->product_detail }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>รหัส AR : </label>&nbsp;&nbsp;&nbsp;
                                    <input class="form-control" type="text" name="product_ar_id"
                                        value="{{ $data->product_ar_id }}">
                                </div>
                                <div class="form-group">
                                    <label>ลิ้งรูป 360 : </label>&nbsp;&nbsp;&nbsp;
                                    <input class="form-control" type="text" name="product_360_link"
                                        value="{{ $data->product_360_link }}">
                                </div>
                            </form>
                            <div class="card my-5">
                                <div class="card-body" align="center">
                                    <a class="btn btn-rounded btn-inverse-danger btn-md" href="/admin/manage">
                                        <i class="mdi mdi-chevron-left"></i>&nbsp;ย้อนกลับ
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-rounded btn-inverse-warning btn-md"><i
                                            class="mdi mdi-check"></i>&nbsp;แก้ไขสินค้า
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><br>
@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#product_image')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(400);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
