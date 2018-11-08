@extends('layouts.app')
@section('content')

  <a class="btn btn-default pull-right" href="/yourhotels/{{$Hotel->id}}/dashboard">Back</a>

  <div class="row">
    <div class="col-md-6 col-md-offset-3 ">


        <!-- Displays all the reservations for a selected hotel and all the reservation details.-->
        <h4>Các đơn đặt phòng của {{$Hotel->Name}}: </h4>

        <br />

  <table id="example" class="table table-striped table-bordered" style="margin-top:100px">
  <thead>
                    <tr>
                        <th>Tên Phòng</th>
                        <th>Tên Người Đặt</th>
                        <th>Ngày Nhận Phòng</th>
                        <th>Ngày Trả Phòng</th>
                        <th>Tổng Tiền</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                @foreach ($Reservations  as $Reservation)
                <tbody>
                    <tr>
                        <td>{{$Reservation->room->RoomType}}</td>
                        <td>{{$Reservation->guestFirstName}} {{$Reservation->guestlastName}}</td>
                        <td>{{$Reservation->CheckIn}}</td>
                        <td>{{$Reservation->CheckOut}}</td>
                        <td>{{$Reservation->totalPrice}}</td>
                        <td><a class="btn btn-sm btn-danger pull-right" href="/reservations/{{$Reservation->id}}/cancel">Cancel</a></td>
                    </tr>
                </tbody>
                @endforeach


</table>
    </div>
</div>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable();
} );

    </script>
@endsection
