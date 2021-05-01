@extends('template.user_template_horizontal')
@section('content')
<div class="col-md-6 grid-margin stretch-card d-sm-inline">
    <div class="card" style="background-color: #e3f0e6;">
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <!-- <li class="nav-item">
                      <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register-1" role="tab" aria-controls="home-1" aria-selected="true">การสมัครสมาชิก</a>
                    </li> -->
                <li class="nav-item">
                    <a class="nav-link active" id="payment-tab" data-toggle="tab" href="#payment-1" role="tab" aria-controls="profile-1" aria-selected="true">วิธีการสั่งซื้อสินค้าและชำระเงิน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="guarantee-tab" data-toggle="tab" href="#guarantee-1" role="tab" aria-controls="contact-1" aria-selected="false">การประกันสินค้าและการเคลมสินค้า</a>
                </li>
            </ul>
            <div class="tab-content py-0 px-2">
                <!-- <div class="tab-pane fade show active" id="register-1" role="tabpanel" aria-labelledby="register-tab">
                      <div class="media">
                        <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/115x115" alt="sample image">
                        <div class="media-body">
                          <h4 class="mt-0">การสมัครสมาชิก</h4>
                          <p>
                              เนื้อหา
                          </p>
                        </div>
                      </div>
                    </div> -->
                <div class="tab-pane fade show active" id="payment-1" role="tabpanel" aria-labelledby="payment-tab">
                    <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/115x115" alt="sample image"> -->
                        <div class="media-body">
                            <p>
                                <img class="img-md rounded img-fluid py-2" src="{{ asset('images/payment.png') }}" alt="Responsive image" />
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="guarantee-1" role="tabpanel" aria-labelledby="guarantee-tab">
                    <div class="media">
                        <!-- <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/115x115" alt="sample image"> -->
                        <div class="media-body">
                            <p>
                               <a href="/return"> <img class="img-md rounded img-fluid py-2" src="{{ asset('images/guarantee.png') }}" alt="Responsive image"  style="cursor: pointer" /></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(400);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>