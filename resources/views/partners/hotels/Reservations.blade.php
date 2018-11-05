@extends('layouts.app')
@section('content')
<div style="margin-top:69px"> 
  <a class="btn btn-default pull-right" href="/yourhotels/{{$Hotel->id}}/dashboard">Back</a>

  <div class="row">
    <div class="col-md-6 col-md-offset-3 ">


        <!-- Displays all the reservations for a selected hotel and all the reservation details.-->
        <h4>Các đơn đặt phòng của {{$Hotel->Name}}: </h4>

        <br />

  <table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
                    <tr>
                        <th>Tên Phòng</th>
                        <th>Tên Người Đặt</th>
                        <th>Ngày Nhận Phòng</th>
                        <th>Ngày Trả Phòng</th>
                        <th>Tổng Tiền</th>
                    </tr>
                </thead>
</table>
    </div>
</div>
</div>
@endsection
