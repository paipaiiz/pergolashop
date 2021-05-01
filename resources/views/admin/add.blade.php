@extends('template.admin_vertical')
@section('content')
<div class="container my-3">
    <div class="card">
        <div class="card-body">
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>

            @elseif(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="card-title">เพิ่มสินค้า</h2>
                <div class="row">
                    <div class="col-lg-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">
                                    <img class="img-fluid img-md rounded show-modal" id="product_image" src="/images/add_image.jpg" alt="your image" width="400px" height="400px" />
                                    <input type="file" name="product_image" id="" class="form-control text-truncate" onchange="readURL(this);" placeholder="Add profile picture">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <form class="forms-sample">
                            <div class="form-group">
                                <label>ชื่อสินค้า : </label>&nbsp;&nbsp;&nbsp;
                                <input class="form-control" hidden type="text" name="id" value="">
                                <input class="form-control" type="text" name="product_name" value="">
                            </div>
                            <div class="form-group">
                                <label>ราคา(บาท) </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-control " type="number" name="product_price" value="">
                            </div>
                            <div class="form-group">
                                <label>ประเภท : </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-control" type="text" name="product_type" value="">
                            </div>
                            <div class="form-group">
                                <label>รายละเอียดสินค้า : </label>&nbsp;&nbsp;&nbsp;
                                <textarea class="form-control" type="text" cols="75" name="product_detail" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>รหัส AR : </label>&nbsp;&nbsp;&nbsp;
                                <input class="form-control" type="text" name="product_ar_id" value="">
                            </div>
                            <div class="form-group">
                                <label>ลิ้งรูป 360 : </label>&nbsp;&nbsp;&nbsp;
                                <input class="form-control" type="text" name="product_360_link" value="">
                            </div>
                        </form>
                        <div class="card my-5">
                            <div class="card-body" align="center">
                                <a class="btn btn-rounded btn-inverse-danger btn-md" href="/admin/manage">
                                    <i class="mdi mdi-chevron-left"></i>&nbsp;ย้อนกลับ
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-rounded btn-inverse-success btn-md"><i class="mdi mdi-check"></i>&nbsp;เพิ่มสินค้า
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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