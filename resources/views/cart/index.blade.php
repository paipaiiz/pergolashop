@extends('template.user_template_horizontal')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2>ตะกร้าสินค้า</h2>
                <div class="table-responsive mt-2">
                    <table class="table mt-3 border-top">
                        <thead>
                            <tr>
                                <th>สินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคาต่อชิ้น</th>
                                <th>จำนวน</th>
                                <th>แอคชั่น</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td scope="row"><img class="img-fluid show-modal" id="myImg"
                                            src="{{ asset('/images/' . $item->associatedModel->product_image) }}"
                                            alt="your image" width="100px" height="100px" /></td>
                                    <td scope="row">{{ $item->name }}</td>
                                    <td>{{ $item->price }} บาท</td>
                                    <td>
                                        {{ $item->quantity }} ต้น
                                    </td>
                                    <td><a class="btn btn-rounded btn-inverse-danger p-2"
                                            href="{{ route('cart.destroy', $item->id) }}">&nbsp;&nbsp;ลบ&nbsp;&nbsp;</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                ราคาสินค้า รวม : {{ \Cart::session(auth()->id())->getTotal() }} บาท
                <div align="center">
                    <br><a class="btn btn-rounded btn-inverse-primary"
                        href="{{ route('cart.checkout') }}">ดำเนินการต่อ&nbsp;<i class="mdi mdi-chevron-right"></i></a>
                </div>
                @if (session()->has('message'))
                    <h1>Nice</h1>
                @endif
            </div>
        </div>

    </div>
@endsection
<script>
    function quantityChange(id) {
        var id = id;
        let _token = $('meta[name="csrf-token"]').attr('content');
        var value = document.getElementById('quantity').value;
        $.ajax({
            url: `/cart/update/${id}/${value}`,
            type: "GET",
            data: {},
            success: function(data) {
                if (data) {
                    location.reload();
                }
            },
        });
    }

</script>
