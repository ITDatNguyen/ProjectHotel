@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2" style="margin-top: 69px;">
  <div class="panel panel-default" style="border-top-color: #e74c3c;">
    <div class="panel-heading">Thêm khách sạn</div>
    <div class="panel-body">
<!-- A form to collect all the Hotel Details when the Partner sets up a new Hotel.-->
  <form method="POST"  action="/hotels/{{$partner->id}}/add" enctype="multipart/form-data">
    {{ csrf_field()}}
      <div class="form-group">
          <label for="namebox" class="col-2 col-form-label">Tên khách sạn:</label>
        <div class="col-8">
          <input class="form-control" name="Name" type="text" value="" id="namebox">
        </div>
      </div>
      <div class="form-group">
          <label for="Addressbox" class="col-2 col-form-label">Địa chỉ :</label>
        <div class="col-8">
          <input class="form-control" name="Address" type="text" value="" id="Addressbox">
        </div>
      </div>
      <div class="form-group">
          <label for="Citybox" class="col-2 col-form-label">Thành phố :</label>
        <div class="col-8">
          <input class="form-control" name="City" type="text" value="" id="Citybox">
        </div>
      </div>
      <div class="form-group">
          <label for="Countrybox" class="col-2 col-form-label">Quốc gia:</label>
        <div class="col-8">
          <input class="form-control" name="Country" type="text" value="" id="Countrybox">
        </div>
      </div>
      <div class="form-group">
          <label for="Telbox" class="col-2 col-form-label">Điện thoại:</label>
        <div class="col-8">

          <input class="form-control" name="TelephoneNumber" type="text" value="" id="Telbox">
        </div>
      </div>

      <!-- Thumbnail is Uploaded Here.-->
      <div class="form-group">
          <label for="imagebox" class="col-2 col-form-label">Hình ảnh:</label>
        <div class="col-8">
          <input type="hidden" value="imag.jpg" name="ImagePath" />
          <input type="file"  name="displaypic"  id="imagebox" required>
        </div>
      </div>

      <div class="form-group">
          <label for="Descbox" class="col-2 col-form-label">Mô tả:</label>
        <div class="col-8">

          <textarea class="form-control" name="description" type="text" value="" id="Descbox"></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Thêm khách sạn</button>
      <a class="btn btn-default pull-right" href="/home">Trở về</a>
  </form>
</div>
</div>
</div>
</div>
@endsection
