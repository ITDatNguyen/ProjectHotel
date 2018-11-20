@extends('layouts.app') 
@section('css')
<style>
    #language {
        margin-top: 18px;
    }

    #star {
        height: 60px;
    }
</style>
@endsection



<div class="container">

    
@section('content')
 
    <div id="booking" style="margin-top: 69px">
        <div id="booking_slogan">
            Kỳ nghỉ thú vị tại thành phố Đà Nẵng</br>
            với trên 100 khách sạn
        </div>
        <div id="search_form">
            <div style="background-color: black; opacity: 0.3;width: 100%;  height: 328px; position: absolute; border-radius: 5px"></div>
            <form method="POST" action="/search" style="position: absolute; padding: 15px" enctype="multipart/form-data" name="search"
                onsubmit="return validateForm()">
                {{ csrf_field()}}
                <div id="search-locations">
                    <img src="../img/homepage/Delete-25.png" width="16px" style="position: absolute; margin-left: 405px; margin-top: 14px; display: none"
                    />
                    <input class="form-control biginput" type="search" name="searchterm" id="checkin" placeholder="Nhập tên thành phố, khu vực, khách sạn ...">
                </div>
                <div style="height: 160px">
                    <table class="table borderless">
                        <tr style="color: white">
                            <label class="text-muted" for="checkin">Vui lòng chọn ngày nhận phòng và ngày trả phòng :</label>
                            <input class="date form-control" type="text" name="daterange" id="checkin" placeholder="Chọn ngày.." required>
                        </tr>
                        <tr>
                            <label class="text-muted" for="travelers">Số người :</label>
                            <select name="numtravelers" class="form-control">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                        </tr>
                    </table>
                </div>
                <div style="margin-top: auto; text-align: center">
                    <button type="submit" class="btn mybtn-style1" id="booking_form_search"> TÌM KIẾM </button>
                </div>
                <div style="color: white; text-align: center; width: 100%; height: 35px; line-height: 35px">Đặt bây giờ. Thanh toán sau tại khách sạn.</div>
            </form>
        </div>
    </div>
    <img src="../img/homepage/Center_1440x860.jpg" width="100%" height="82%" />
</div>
</div>
<div id="our_promise">
    <div class="container-fluid">
        <div id="our_promise_title"> CHÚNG TÔI ĐẢM BẢO:</div>
        <!-- khi dung flexbox thi class="img-responsive" ko tac dung -->
        <div class="row" style="width: 80%; margin: 0 auto; text-align: center;  color: rgb(70,68,68)">
            <!--<div class="col-xs-2 col-sm-2 col-md-2">-->
            <div class="col-sm-2 col-md-2">
                <p>Điều hòa nhiệt độ</p>
                <!--do co' class="img-responsive" nen ko the? canh vao` center-->
                <img class="img-responsive" src="../img/homepage/tiennghi-AC_Rooms.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Truyền hình cáp</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Cable_TV.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Ra trải giường sạch sẽ</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Spotless_Linen.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Bữa sáng miễn phí</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Complimentary_Breakfast.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Miễn phí Wi-Fi</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Free_Wi-Fi.png" />
            </div>
            <div class="col-sm-2 col-md-2">
                <p>Nhà vệ sinh đạt chuẩn</p>
                <img class="img-responsive" src="../img/homepage/tiennghi-Hygienic_Washrooms.png" />
            </div>
        </div>
    </div>
</div>

<div id="promotion">
    <div class="container-fluid">
        </br>
        <div id="promotion_title"> Khách Sạn Các Quận
            <div class="redline" style="width: 50px; margin: 0 auto;"></div>
        </div>


            <div class="container" style="margin-top: 10px">
                <div class="grid">
                    <figure class="effect-chico">
                        <img src="../img/homepage/promotion_1.jpg" width="550px" alt="img15" />
                        <figcaption>
                            <!--<strong>YOY <span class="txt-name-location">ĐÀ NẴNG</span></strong>-->
                            <h3 style="margin-top: 20%">
                                YOY <span class="txt-name-location" name="County" value="Hải Châu" >Quận Hải Châu</span>
                            </h3>
                            <a href="hotel/location=hải+châu"></a>
                            <p>Lập kế hoạch nghỉ ngơi những điểm yêu thích tại Đà Nẵng</p>
                            <!--<a href="#">View more</a>-->
                        </figcaption>
                    </figure>
                    <!--mac dinh the figure dag cai` float: left-->
                    <figure class="effect-chico">
                        <img src="../img/homepage/promotion_2.jpg" width="550px" height="200px" alt="img04" />
                        <figcaption>
                            <h3>
                                YOY <span class="txt-name-location" name="County" value="Sơn Trà">Quận Sơn Trà</span>
                            </h3>
                            <a href="hotel/location=sơn+trà"></a>
                            <!--<a href="#">View more</a>-->
                        </figcaption>
                    </figure>
                    <figure class="effect-chico">
                        <img src="../img/homepage/promotion_3.jpg" width="550px" height="200px" alt="img04" />
                        <figcaption>
                            <h3>
                                YOY <span class="txt-name-location" name="County" value="Liên Chiểu">Quận Liên Chiểu</span>
                            </h3>
                            <a href="hotel/location=liên+chiểu"></a>
                            <!--<a href="#">View more</a>-->
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
<div id="comment">
    <div class="container-fluid">
        <div id="comment_title"> <span>Khách Sạn Có Khuyến Mãi</span></div>
        @foreach ($Hotels as $Hotel)
        <div class="card">
          <div>
            <img class="card-img-top" style="height: 170px; width: 100%; padding: 7px" src="{{$Hotel->thumbnail->path}}" alt="Card image">
          </div>
          <div class="card-block">
            <h4 class="card-Title">{{ $Hotel->Name}}</h4>
            <p class ="card-text">{{$Hotel->description}}</p>
         </div>
          @if (Auth::check())
            <a href="/hotels/{{$Hotel->id}}" class="btn btn-primary" style="float: right;margin: 0px 10px 5px 10px;">Xem</a>
            @else
              <a href="/login" class="btn btn-primary" style="float: right;margin: 0px 10px 5px 10px;">Xem</a>
            @endif
         </div>
    @endforeach
</div>
@endsection

</div>

@section('scripts')
<script src="https://unpkg.com/flatpickr"></script>
<script>
    flatpickr(".date", {
	minDate: "today",
  mode:"range",
});
function validateForm() {
  var setdate = document.forms["search"]["daterange"].value;
//   if(setdate == ""){
//     Command: toastr["warning"]
//            ("Ngày phải được điền")
//     toastr.options = {
//           "positionClass" : "toast-top-center",
//          }
//     return false;
//   }
}

</script>
@endsection