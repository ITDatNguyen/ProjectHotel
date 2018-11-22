<style>
	fieldset {
		position: initial;
	}
</style>
<div style="background-color: white">
	@include('layouts.head')
</div>
	@include('layouts.header')
<script src="{{URL::asset('http://code.jquery.com/jquery-1.10.2.js')}}"></script>
<script src="{{URL::asset('http://code.jquery.com/ui/1.11.2/jquery-ui.js')}}"></script>
<script src="{{URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('//cdnjs.cloudflare.com/ajax/libs/authy-forms.css/2.2/form.authy.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('../css/application.css') }}">
<link rel="stylesheet" href="{{URL::asset('../css/css.css')}}"> @if (is_null($User->proposals))

<body style="background-color: rgb(230, 234, 237)">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="display: block">
			<form id="msform" method="POST" action="/proposal/{{$User->id}}/new" files='true' enctype="multipart/form-data">
				{{ csrf_field()}}
				<ul id="progressbar">
					<li class="active">THÔNG TIN ÐỐI TÁC</li>
					<li>THÔNG TIN CÁ NHÂN</li>
				</ul>
				<fieldset>
					<h2 class="fs-title">THÔNG TIN ÐỐI TÁC</h2>
					<h3 class="fs-subtitle">Hãy cho chúng tôi biết thêm thông tin </h3>
					<input type="text" name="CompanyName" placeholder="Tên công ty" />
					<input type="text" name="CompanyEmail" placeholder="Mail" />
					<input type="text" name="Vision" placeholder="Mô tả" />
					<input type="text" name="HQAddress" placeholder="Dịa chỉ" />
					<div class="row">
						<div id="right-infoTabs" class="col-sm-5 col-md-7 container-fluid">
							<p style="text-align: justify;">Ðịa chỉ :</p>
							<div class="embed-responsive embed-responsive-4by3">
								<iframe style="left: 0px; " class="embed-responsive-item" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
								 width="auto" height="auto" allowfullscreen src="https://maps.google.com/maps?hl=en&q=3 Nguy?n Van Linh, Q H?i Châu, Ðà N?ng&ie=UTF8&t=roadmap&z=14&iwloc=B&output=embed">
              		</iframe>
							</div>
						</div>
						<div class="col-sm-5">
							<p for="imagebox" style="text-align: justify;">Ảnh hoặc logo của công ty :</p>
							{{-- <input type="hidden" value="imag.jpg" name="ImagePath" /> --}} {{-- <input type="file" name="displaypic" id="imagebox"
							 required> --}}
							<input type="file" name="featured_img" id="">
						</div>
					</div>
					<input type="button" name="next" class="next action-button" value="Tiếp theo" />
				</fieldset>
				<fieldset>
					<h2 class="fs-title">THÔNG TIN CÁ NHÂN</h2>
					<h3 class="fs-subtitle">Hãy cho chúng tôi biết thêm thông tin về bạn</h3>
					<input type="text" name="fname" placeholder="Tên" required />
					<input type="text" name="lname" placeholder="Họ" required/>
					<input type="text" name="country_code" id='authy-countries' placeholder="Quốc Gia" required/>
					<input type="text" name="phone_number" id='authy-cellphone' placeholder="Số điện thoại" required/>
					<input type="text" name="cv" placeholder="Chức vị" required/>
					<p style="text-align: justify;">Ảnh chứng minh nhân dân :</p>
					<input type="hidden" value="imag.jpg" name="ImagePath" /> {{-- <input type="file" name="displaypic" id="imagebox"> --}}
					<input type="button" name="previous" class="previous action-button-previous" value="Quay về" />
					<input type="submit" class="action-button" value="Ðăng ký" />
				</fieldset>
			</form>
			<!-- link to designify.me code snippets -->
			<div class="dme_link">
				<!-- <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p> -->
			</div>
			<!-- /.link to designify.me code snippets -->
		</div>
	</div>
	<script>
		//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        // 'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
	</script>
	<!-- /.MultiStep Form -->
	<br>
	</div>
	@else
	<div class="col-md-8 col-md-offset-2" style="">
		<div class="panel panel-default" style="border-top-color: #e74c3c;">
			<p style="text-align: center;  margin: 5px;">
				Bạn đã có đề xuất đang chờ xử lý.
			</p>
		</div>
	</div>
	@endif
	@include('layouts.footer')
	</div>

</body>