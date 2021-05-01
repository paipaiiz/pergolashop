@extends('template.user_template_horizontal')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 align="center">ประวัติการซื้อ</h3>
                    <table id="example" class="display table table-responsive-sm my-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสรายการสินค้า</th>
                                <th>ชื่อผู้สั่ง</th>
                                <th>จำนวนสินค้า</th>
                                <th>สถานะ</th>
                                <th>หมายเลขพัสดุ</th>
                                <th>เวลา</th>
                                <th>ตรวจสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->code }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->product_count }}</td>
                                    @if ($data->status === 'รอการยืนยัน')
                                        <td class="text-warning">{{ $data->status }}</td>
                                    @elseif ($data->status === "ยืนยัน")
                                        <td class="text-success">{{ $data->status }}</td>
                                    @else
                                        <td class="text-danger">{{ $data->status }}</td>
                                    @endif
                                    <td><button class="btn btn-link text-uppercase" id="getPostApi" data-toggle="modal"
                                            data-toggle="tooltip" data-placement="Bottom" title="คลิกเพื่อดูสถานะ"
                                            data-target="#TrackingModal" aria-hidden="true" style="cursor: pointer"
                                            onclick="getThaiPost({{ $data }})">{{ $data->supply_number }}</button>
                                    </td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-rounded btn-inverse-primary"
                                            href="{{ route('user.supply_detail', $data) }}"><i
                                                class="mdi mdi-eye"></i>&nbsp;ตรวจสอบ</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 align="center">ประวัติการเคลมสินค้า</h3>
                    <table id="return" class="display table table-responsive-sm my-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสรายการสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>วันที่ยื่นคำร้อง</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($return as $index => $value)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $value->code }}</td>
                                    <td>{{ $value->product_name }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    @if ($value->status === 'รอการยืนยัน')
                                        <td class="text-warning">{{ $value->status }}</td>
                                    @elseif ($value->status === "ยืนยัน")
                                        <td class="text-success">{{ $value->status }}</td>
                                    @else
                                        <td class="text-danger">{{ $value->status }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="TrackingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-body" id="supply_tran">
                    <h3 class="card-title">สถานะสินค้า</h3>
                    <h5>เลขพัสดุ</h5><br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <ul class="bullet-line-list">
                        </ul>
                    </div>
                    <!-- ถ้าสถานะเป็น "นำจ่ายสำเร็จ" ต้องเป็นไอคอนติ๊กถูก -->
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" /> -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $(document).ready(function() {
        $('#return').DataTable();
    });

    function getThaiPost(data) {
        let _token = $('meta[name="csrf-token"]').attr('content');
        $("#supply_tran li").remove();
        $.ajax({
            url: "/order/thaipostapi",
            type: "POST",
            data: {
                _token: _token,
                supplyNumber: data.supply_number
            },
            success: function(data) {
                if (data) {
                    for (var i = 0; i < data.length; i++) {
                        if ((data.length - 1) == i) {
                            var tr_str = "<li>" +
                                "<h5>" + data[i].status_description +
                                "  <i class='mdi mdi-checkbox-marked-circle-outline' style='color:green;'></i>" +
                                "</h5>" +
                                "<p class='mb-0'>" + data[i].location + "</p>" +
                                "<p class='text-muted'>" + "<i class='mdi mdi-clock-outline'></i>" + data[i]
                                .status_date + "</p>" +
                                "</li>";

                            $("#supply_tran ul").append(tr_str);
                        } else {
                            var tr_str = "<li>" +
                                "<h5>" + data[i].status_description +
                                "</h5>" +
                                "<p class='mb-0'>" + data[i].location + "</p>" +
                                "<p class='text-muted'>" + "<i class='mdi mdi-clock-outline'></i>" + data[i]
                                .status_date + "</p>" +
                                "</li>";

                            $("#supply_tran ul").append(tr_str);
                        }

                    }
                }
            },
        });
    }

</script>
<script src="{{ asset('js/tooltips.js') }}"></script>
