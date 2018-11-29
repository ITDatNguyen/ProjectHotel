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
                    <input class="form-control biginput" type="search" name="searchterm" id="checkin" placeholder="Nhập tên khách sạn, quận, tên đường ...">
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
                              <option value=""></option>
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
                            YOY <span class="txt-name-location" name="County" value="Hải Châu">Quận Hải Châu</span>
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
            <div id="comment_title"> Nhận xét gần đây về YOY</div>
            <!-- make blockquote http://jsfiddle.net/pz6kx0bw/ -->
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1"></div>
                <!--thuoc tinh display: inline-flex thay the cho float tung` phan tu ben trong-->
                <div class="col-xs-5 col-sm-5 col-md-5" style="display: inline-flex">
                    <div style="width: 22%">
                        <!--khi co' responsive + display: inline-flex => ko cai` duoc width, height -->
                        <img class="effect-shadow img-responsive" src="../img/homepage/comment1_gordonramsay.jpg" style="border-radius: 5px" />
                    </div>
                    <img src="../img/homepage/quote.png" width="20" height="20" style="margin-left: 3px" />
                    <p style="width: 70%">
                        Tôi đánh giá cao về ẩm thực ở các khu nghỉ dưỡng của các bạn. Bạn đã mang đến nhiều trải nghiệm tuyệt vời về ẩm thực Việt
                        Nam với những món ăn mang đậm bản sắc dân tộc đến các món ăn độc đáo.<br/>
                        <span class="comment_name">Gordon Ramsay</span><span class="comment_country"> - Scotland</span>
                    </p>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5" style="display: inline-flex">
                    <div style="width: 22%">
                        <img class="effect-shadow img-responsive" src="../img/homepage/comment1_davidbeckham.jpg" style="border-radius: 5px" />
                    </div>
                    <img src="../img/homepage/quote.png" width="20" height="20" style="margin-left: 3px" />
                    <p style="width: 70%">
                        Thật tuyệt vời, lần đầu tiên tôi đến Việt Nam. Thật tuyệt khi được một nhà cung cấp dịch vụ về nghỉ dưỡng tốt như các bạn.
                        Mong rằng ở Việt Nam sẽ có những dịch vụ như các bạn để du khách có thể trải nghiệm những điều tuyệt
                        vời nhất ở Việt Nam!!!<br/>
                        <span class="comment_name">David Beckham</span><span class="comment_country"> - England</span>
                    </p>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1"></div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1"></div>

                <div class="col-xs-5 col-sm-5 col-md-5" style="display: inline-flex">
                    <div style="width: 22%">
                        <img class="effect-shadow img-responsive" src="../img/homepage/comment1_mrbean.jpg" style="border-radius: 5px" />
                        <!--<img src="../img/homepage/quote.png" style="margin-top: -85px; float: right"/>-->
                    </div>
                    <img src="../img/homepage/quote.png" width="20" height="20" style="margin-left: 3px" />
                    <p style="width: 70%">
                        Lần đầu tiên tôi đặt phòng ở OYO, đó là một trải nghiệm tuyệt vời về dịch vụ nghỉ dưỡng của các khu nghỉ dưỡng cao cấp mà
                        các bạn giới thiệu cho chúng tôi. Tôi và gia đình tôi vô cùng hài lòng về điều đó!!!!!<br/>
                        <span class="comment_name">Mr.Bean</span><span class="comment_country"> - England</span>
                    </p>
                </div>

                <div class="col-xs-5 col-sm-5 col-md-5" style="display: inline-flex">
                    <div style="width: 22%">
                        <img class="effect-shadow img-responsive" src="../img/homepage/comment1_ronaldo.jpg" style="border-radius: 5px" />
                    </div>
                    <img src="../img/homepage/quote.png" width="20" height="20" style="margin-left: 3px" />
                    <p style="width: 70%">
                        Thật tuyệt vời!!! Đó là lí do tôi sẽ quay lại Đà Nẵng Việt Nam !!!<br/>
                        <!--Lần đầu tiên tôi đặt phòng ở YOY, đó là một trải nghiệm tuyệt vời về dịch vụ nghỉ-->
                        <!--dưỡng của các khu nghỉ dưỡng  cao cấp mà các bạn giới thiệu cho chúng tôi.-->
                        <!--Tôi và gia đình tôi vô cùng hài lòng về điều đó!!!!!<br/>-->
                        <span class="comment_name">Ronaldo</span><span class="comment_country"> - Saudi Arabia</span>
                    </p>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1"></div>
            </div>
        </div>
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
  if(setdate == ""){
    Command: toastr["warning"]
           ("Ngày phải được điền")
    toastr.options = {
          "positionClass" : "toast-top-center",
         }
    return false;
  }
}
</script>
@endsection