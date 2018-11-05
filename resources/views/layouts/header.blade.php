<style>
    <style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #bdc3c7;
    height: auto;
    width:  110px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    left: -10px;
    right: -20px;
    top: 60px;
}
#right-header a {
    color: black;
}
.dropdown-content a {
    color: black;
    text-align: center;
    color: #4CAF50;
    text-decoration: none;
    display: block;
    height: 30px;
    line-height: 30px;
}

.dropdown-content a:hover {
    background-color: #0366d6;
}
.dropdown:hover .dropdown-content {
    display: block;
    color: #4CAF50;
}
.dropdown:hover .dropbtn { color: #e74c3c; }
</style>
<header>
    <div class="container-fluid">
        <div id="left-header">
        <a href="{{url('/')}}" target="_self" title="Về trang chủ">
                <img class="animated bounce" src="{{URL::asset('/img/img/logo.png')}}" width="110px" height="64px"/> <span href={{url('/')}}>Mạng đặt phòng khách sạn Online</span>
            </a>
        </div>
        <div id="right-header">
            <div style="float: left; border-right: solid thin rgb(238,238,238)">
                <a href="download-apps.html" target="_self" style="color: black" title="Tải ứng dụng YOY">
                    <img src="{{URL::asset('/img/img/mobile-icon.png')}}" height="40px"/>
                    <span style="margin-right: 10px">Download App </span>
                </a>
            </div>
            <div id="welcome" style="padding-left: 10px">
                <i class="material-icons" style="float: left; margin-top: 15px; font-size: 30px">
                    supervisor_account
                </i>
                <div class="dropdown" style="float: left;">
                    <button class="btn btn-default dropdown-toggle mybtn-style1" type="button" data-toggle="dropdown">
                        Xin chào Group 6
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li style="line-height: 30px">
                            <a onclick="alert('Đang cập nhật...')">
                                <i class="material-icons" style="color: rgb(166, 166, 166)">info</i>
                                <span>Thông tin tài khoản</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="alert('Đang cập nhật...')">
                                <i class="material-icons" style="color: rgb(166, 166, 166)">card_travel</i>
                                <span>Các chuyến đi đã lưu</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="container-fluid"
                               onclick="
                                localStorage.check_login = 'false';
                                history.go(0); ">
                                <span style="float: left">Đăng xuất</span>
                                <i class="fa fa-sign-out" style="font-size: 20px; float: right; color: rgb(166, 166, 166)"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="signup-signin" style="float: left; margin-right: 5px; margin-left: 10px">
                  @if (Auth::guest())
                        <a href="{{ url('/register') }}" class="signup">ĐĂNG KÝ</a>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="{{ url('/login') }}" class="login" style="margin-right: 10px">ĐĂNG NHẬP</a>
                        @else
                                <div class="dropdown">
                                    <span class="dropbtn" style="margin-left: 5px">{{ Auth::user()->name }}</span><span class="caret"></span>
                                    <div class="dropdown-content">
                                        <div style="text-align: center;border-bottom: 1px solid #e74c3c">
                                            <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                            </a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                        <a href="#">Profile</a>
                                    </div>
                                </div>
                        @endif
            </div>
            <div id="star" style="float: left; border-right: solid thin rgb(238,238,238); margin-right: 5px">
                <img id="language" src="{{URL::asset('/img/img/flagvn_thumbnail.png')}}"
                     onclick="var $src = $(this).attr('src');
                        if ($src == 'header-footer/img/flagvn_thumbnail.png'){
                            $(this).attr('src','header-footer/img/flageng_thumbnail.png');
                            } else {
                            $(this).attr('src','header-footer/img/flagvn_thumbnail.png');
                        }"
                     style="margin-right: 15px; "  width="32px" height="24px" title="Chọn ngôn ngữ"/>
            </div>
            <a href="modal-user/user-24h.html" data-toggle="modal" data-target="#myModal-24h" title="Gọi trực tuyến"
               style="color: white; float: left">
                <img src="{{URL::asset('/img/img/24h_white.png')}}"/>
            </a>
        </div>
    </div>
</header>
