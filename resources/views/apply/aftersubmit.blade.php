@extends('layouts.app')
@section('content')
<div>
    <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading">Đối tác với OYO.com </div>
            <div class="panel-body">
      <p>
        {{$request->CompanyName}} - Chúng tôi cảm ơn bạn đã chọn OYO.com làm Đối tác đặt chỗ trực tuyến của bạn. Chúng tôi sẽ nhanh chóng xem xét đơn đăng ký của bạn và thông báo cho bạn về phản hồi của chúng tôi.
      </p>
      <a href="/home">Trở về trang chủ</a>
    </div>
  </div>
  </div>
@endsection