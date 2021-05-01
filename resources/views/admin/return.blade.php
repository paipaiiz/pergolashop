@extends('template.admin_vertical')
@section('content')
@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>

@elseif(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <h3 align="center">รายการคำขอร้องเคลมสินค้า</h3>
        <table class="display table table-responsive-md" id="example" style="width:100%">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>รหัสรายการสินค้า</th>
                    <th>ชื่อผู้สั่ง</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนสินค้า</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $index => $item)
                    <tr>
                        <td>{{$index +1 }}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->fullname}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->amount}}</td>
                        <td>
                            <form action="{{ route('return.update', $item->id) }}"style="width: 100px;">
                                <select class="p-0" name="status" id="mySelect" onchange="myFunction({{ $item->id }})">
                                    @if ($item->status === "รอการยืนยัน")
                                    <option class="text-warning" selected="selected" disable value="{{ $item->status }}">{{ $item->status }}
                                    </option>
                                    @elseif ($item->status === "ยืนยัน")
                                    <option class="text-success" selected="selected" disable value="{{ $item->status }}">{{ $item->status }}
                                    </option>
                                    @else
                                    <option class="text-danger" selected="selected" disable value="{{ $item->status }}">{{ $item->status }}
                                    </option>
                                    @endif
                                    <option class="text-warning" value="รอการยืนยัน">รอการยืนยัน</option>
                                    <option class="text-success" value="ยืนยัน">ยืนยัน</option>
                                    <option class="text-danger" value="ยกเลิก">ยกเลิก</option>
                                </select><br>
                                <div align="center"><input class="btn btn-rounded btn-inverse-warning p-2" type="submit" value="แก้ไข"></div>
                            </form>
                        </td>
                        <td><a class="btn btn-rounded btn-inverse-primary" href="{{ route('return.detail', $item->id) }}"><i class="mdi mdi-eye"></i>&nbsp;ตรวจสอบ</a></td>
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
</script>