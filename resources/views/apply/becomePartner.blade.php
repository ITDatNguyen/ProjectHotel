@extends('layouts.app')
@section('content')
@if (is_null($User->proposals))
<div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading">Đối tác with OYO.com</div>
            <div class="panel-body">
    <form method="POST" action="/proposal/{{$User->id}}/new">
      {{ csrf_field()}}
        <label for="namebox" class="col-2 col-form-label">Tên công ty:</label>
          <div class="col-10">
              <input class="form-control" name="CompanyName" type="text" value="" id="namebox">
          </div>

        <label for="emailbox" class="col-2 col-form-label">Email:</label>
            <div class="col-10">
               <input class="form-control" name="CompanyEmail" type="text" value="" id="emailbox">
            </div>

        <label for="Addressbox" class="col-2 col-form-label">Địa chỉ:</label>
           <div class="col-10">

              <input class="form-control" name="HQAddress" type="text" value="" id="Addressbox">
          </div>

        <label for="Descbox" class="col-2 col-form-label">Mô tả:</label>
           <div class="col-10">

              <textarea class="form-control" rows="4" name="Vision" type="text" value="" id="Descbox"></textarea>
          </div>

      <button type="submit" style="margin-top: 7px" class="btn btn-primary">Đăng ký</button>
  </form>
  
</div>
        </div>
        </div>
<!-- If the User does have a Proposal -->
@else
  <div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
  <div class="panel panel-default" style="border-top-color: #e74c3c;">
    <p style="text-align: center;  margin: 5px;">
      Bạn đã có đề xuất đang chờ xử lý.
    </p>
  </div>
  </div>
@endif
@endsection
