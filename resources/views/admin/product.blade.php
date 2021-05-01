@extends('template.admin_vertical')
@section('content')
    <div class="card">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>

        @elseif(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-body">
            <h3 align="center">จัดการสินค้า</h3>&nbsp;&nbsp;&nbsp;&nbsp;<a
                class="btn btn-rounded btn-inverse-success btn-sm pt-2 pb-2" href="{{ route('admin.add') }}"><i
                    class="mdi mdi-playlist-plus"></i>&nbsp;เพิ่มสินค้า</a><br>
            <div class="row justify-content-center my-3">
                <table class="table table-responsive-sm my-3" id="example">
                    <thead>
                        <tr align="center">
                            <th>รูป</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคาต่อชิ้น</th>
                            <th>จำนวน</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @foreach ($data as $data)
                            <tr>
                                <td><img class="img-fluid show-modal" id="myImg"
                                        src="{{ asset('/images/' . $data->product_image) }}" alt="your image"
                                        width="100px" height="100px" /></td>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ $data->product_price }}</td>
                                <td>
                                    @if ($data->product_amount > 0)
                                        {{ $data->product_amount }} ต้น
                                    @elseif( $data->product_amount <= 0) <h6 class="text-danger">สินค้าหมด</h6>
                                    @endif
                                </td>
                                <td><a class="btn btn-rounded btn-inverse-warning pt-2 pb-2"
                                        href="{{ route('admin.edit', $data->id) }}"><i
                                            class="mdi mdi-border-color"></i>&nbsp;แก้ไข</a>
                                    <a class="btn btn-rounded btn-inverse-danger pt-2 pb-2"
                                        href="{{ route('admin.delete', $data->id) }}"><i
                                            class="mdi mdi-close"></i>&nbsp;ลบ</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" /> -->
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" /> -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
