@extends('template.user_template_horizontal')

@section('content')
<div class="card" style="background-color: #e3f0e6;">
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>

    @elseif(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card-body pb-0">
        <h3 align="center">แก้ไขข้อมูลส่วนตัว</h3>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="">
                    ชื่อ-นามสกุล:
                </label><br>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}"><br>
                <label for="">
                    Email:
                </label><br>
                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}"><br>
                <label for="">
                    แก้ไขรหัสผ่าน:
                </label><br>
                <input type="password" name="password" id="password" class="form-control" value=""><br>
            </div>
            <div align="center">
                <button type="submit" class="btn btn-rounded btn-inverse-success">&nbsp;ยืนยัน</button>
                <a href="/home" class="btn btn-rounded btn-inverse-danger">&nbsp;ยกเลิก</a>
            </div><br>
        </form>
    </div>
</div>
@endsection