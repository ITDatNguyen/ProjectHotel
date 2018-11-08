@extends('layouts.app')

@section('content')
  <a class="btn btn-default pull-right" href="/yourhotels/{{$Hotel->id}}/dashboard">Trở về</a>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 " style="margin-top: 69px">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading">Đặt chỗ của {{$Hotel->Name}}: </div>
            <div class="panel-body">
        <!-- Displays all the reservations for a selected hotel and all the reservation details.-->
        <br />
        @foreach ($Reservations  as $Reservation)
        <a class="btn btn-sm btn-danger pull-right" href="/reservations/{{$Reservation->id}}/cancel">Cancel</a>
          <h5><u>{{$Reservation->room->RoomType}}</u></h5>
          <p><mark>Tên khách :</mark>  {{$Reservation->guestFirstName}} {{$Reservation->guestlastName}}.  </p>
          <p><mark>Ngày nhận phòng :</mark> {{$Reservation->CheckIn}}.  </p>
          <p><mark>Ngày trả phòng:</mark> {{$Reservation->CheckOut}}.  </p>
          <p><mark>Tổng giá :</mark> {{$Reservation->totalPrice}} vnd.  </p>
          <hr />
        @endforeach
    </div>
    </div>
    </div>
    </div>
</div>
@endsection
