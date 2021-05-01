@extends('template.admin_vertical')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 align="center">รายการสั่งซื้อ</h3>
            <div class="row">
                <form action="{{ route('order.print') }}">
                    <div class="row">
                        <div class="col-sm-9">
                            <div id="datepicker-popup" class="input-group date datepicker">
                                <input type="text" id="date" name="date" class="form-control" value="{{ $date }}">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input class="btn btn-inverse-warning p-3" style="margin-top:6px;" type="submit" value="พิมพ์">
                        </div>
                    </div>
                </form>
            </div>
            <table class="display table table-responsive-md" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้สั่ง</th>
                        <th>จำนวนสินค้า</th>
                        <th>ประเภทเงินจ่าย</th>
                        <th>ราคารวม</th>
                        <th>สถานะ</th>
                        <th>หมายเลขพัสดุ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->product_count }}</td>
                            <td>{{ $data->payment_type }}</td>
                            <td>{{ $data->total_price }} บาท</td>
                            <td>
                                <form id="supply_select" action="{{ route('order.update', $data->id) }}"
                                    style="width: 100px;">
                                    <select class="p-0" name="status" id="mySelect">
                                        @if ($data->status === 'รอการยืนยัน')
                                            <option class="text-warning" selected="selected" disable
                                                value="{{ $data->status }}">{{ $data->status }}
                                            </option>
                                        @elseif ($data->status === "ยืนยัน")
                                            <option class="text-success" selected="selected" disable
                                                value="{{ $data->status }}">{{ $data->status }}
                                            </option>
                                        @else
                                            <option class="text-danger" selected="selected" disable
                                                value="{{ $data->status }}">{{ $data->status }}
                                            </option>
                                        @endif
                                        <option class="text-warning" value="รอการยืนยัน">รอการยืนยัน</option>
                                        <option class="text-success" value="ยืนยัน">ยืนยัน</option>
                                        <option class="text-danger" value="ยกเลิก">ยกเลิก</option>
                                    </select><br>
                                    <div align="center"><input class="btn btn-rounded btn-inverse-warning p-2" type="submit"
                                            value="แก้ไข"></div>
                                </form>
                            </td>
                            <td>
                                <form id="supply_form" action="{{ route('order.supply', $data->id) }}"
                                    style="margin-top:25px;">
                                    <div align="center">
                                        <input id="supply_number" class="form-control p-1" onchange="supplyChange()"
                                            name=" supply_number" type="text" value="{{ $data->supply_number ?? '' }}"
                                            placeholder="หมายเลขพัสดุ" maxlength="13">
                                    </div><br>
                                </form>
                                <br>
                            </td>
                            <td><a class="btn btn-rounded btn-inverse-primary"
                                    href="{{ route('admin.order_detail', $data) }}"><i
                                        class="mdi mdi-eye"></i>&nbsp;ตรวจสอบ</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function statusChange(id) {
        var id = id;
        let _token = $('meta[name="csrf-token"]').attr('content');
        var value = document.getElementById('status').value;
        $.ajax({
            url: `/order/update/${id}/${value}`,
            type: "GET",
            data: {},
            success: function(data) {
                if (data) {
                    location.reload();
                }
            },
        });
    }

    function supplyChange() {
        document.getElementById("supply_form").submit();
    }

</script>
