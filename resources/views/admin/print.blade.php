@extends('template.admin_vertical')

@section('content')
    <div class="card " id="printOrder" style="background-color: white;">
        <style>
            @media print {
                .noPrint {
                    display: none;
                }
            }

            div {
                color: black;
            }

            table {
                width: 100%;
                text-align: center;
            }

        </style>
        <div class="card-body" align="center">
            <h3>Pergola Shop</h3>
            <h4>รายการสั่งซื้อ </h4>
            <h4>ประจำวันที่ {{ $date }}</h4>
            <table style="color: black;">
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสมาชิก</th>
                    <th>รหัสรายการ</th>
                    <th>จำนวนสินค้า</th>
                    <th>ประเภทการจ่ายเงิน</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>ราคา</th>
                </tr>
                @foreach ($data as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->code }}</td>
                        <td>{{ $data->product_count }}</td>
                        <td>{{ $data->payment_type }}</td>
                        <td>{{ $data->shipping_tel }}</td>
                        <td>{{ $data->total_price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>รวมทั้งหมด {{ $count }} รายการ</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>รวมเป็น {{ $sumPrice }} บาท</td>
                </tr>

            </table>
        </div>
    </div>
    <div align="right">
        <button class="btn btn-inverse-warning p-3" onclick="printDiv()" style="margin-top:6px;"
            type="submit">พิมพ์ใบรายการสั่งซื้อ</button>
    </div>
@endsection
<script>
    function myPrintFunction() {
        // do something maybe
        window.print('printOrder');
    }

    function printDiv() {
        var divContents = document.getElementById("printOrder").innerHTML;
        var a = window.open('', '', 'height=1200, width=2000');
        a.document.write('<html>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
        sleep(500);
    }

</script>
