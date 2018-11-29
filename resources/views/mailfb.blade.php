<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
<div class="form-group">

<p>xin chào:{{($user->name)}}!</p>
<br>
<p>Thông Tin Đặt Phòng Của Bạn:</p>
<p>Tên Người Đặt:{{$reservation->guestName}}</p>
<p>SĐT:{{$reservation->phone}}</p>
<p>Ngày Nhận Phòng:{{ \Carbon\Carbon::parse($reservation->checkIn)->format('d/m/Y')}}.  </p>
<p>Ngày Trả Phòng:{{ \Carbon\Carbon::parse($reservation->checkOut)->format('d/m/Y')}}.   </p>
<p>Tổng Tiền:{{$reservation->totalPrice}}</p>
@if($reservation->statuspayment==0)
<p>Trạng Thái Thanh Toán: Chưa Thanh Toán</p>
@else
<p>Trạng Thái Thanh Toán: Đã Thanh Toán</p>
@endif
<p>Cảm ơn bạn đã đặt phòng tại OYO.com</p>
</div>


</body>
</html>