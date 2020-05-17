@extends('home.app') 
@section('css')



@endsection 
@section('header')
@include('home.header')
@endsection  
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<!-- <div class="w3l_breadcrumbs_left">
			<ul>
				<li><a href="index.html">Home</a><i>/</i></li>
				<li>Music</li>
			</ul>
		</div> -->
		<div class="w3_agile_breadcrumbs_right">
			<h2>Được Theo Dõi Nhiều Nhất</h2>
			<p>Top 4 Truyện Được Theo Dõi Nhiều Nhất.</p>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="banner-bottom">
	@foreach($top4book as $k)
		<div class="col-md-3 wthree_banner_bottom_grid">
			<div class="wthree_banner_bottom_grid1">

				<img src="{{ asset('upload/image/' . $k->image)}}" style="width: 380px; height: 500px !important" class="img-responsive" />
				<div class="wthree_banner_bottom_grid_pos">
					<h4>{{$k->followcount}}  <span>Follows</span></h4>
				</div>
			</div>
			<div class="w3layouts_banner_bottom_grid">
				<a href="{{ route('home.show', ['book' => $k->id]) }}" target="_blanks">
				<h3 style="font-family: 'Prompt', sans-serif;"><i class="fa fa-wpbeginner"></i> {{ str_limit($k->name, $limit = 10, $end = '...') }}</h3></a>
				<!-- <h4 class="w3ls_color"> <i class="fa fa-user"></i> {{ str_limit($k->author, $limit = 10, $end = '...') }}</h4>
				<h4 class="w3ls_color"> <i class="fa fa-calendar"></i><?php \Carbon\Carbon::setLocale('vi')  ?> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($k->uploaddate  ))->diffForHumans() }}</h4> -->
				<li>Tác Giả: {{ str_limit($k->author, $limit = 10, $end = '...') }}</li>
				<li>Số Chương: {{ $k->chaptotal }}</li>
				<li>Ngày Đăng: {{ Carbon\Carbon::parse($k->uploaddate)->format('d-m-Y h:i:s') }}</li>
				<a style="margin-top: 5px; float: right" href="{{ route('home.show', ['book' => $k->id]) }}" target="_blanks">Đọc Truyện >>>></a>
				
			</div>


		</div>
	@endforeach

		
		<div class="clearfix"></div>
	</div>

<div class="breadcrumbs">
	<div class="container">
		<h3 style="font-family: 'Prompt', sans-serif !important">Tìm Kiếm Truyện</h3>
		<form>
			<div class="row" style="margin-top: 20px;">
				<div class="col-md-3">
					<input style="border-color: black" name="bookname" id="txtName" placeholder="Tên Truyện" type="text" color: black>
				</div>

				<div class="col-md-3">
					<select style="outline: none; border: 1px solid black; padding: 12px; font-size: 14px;color: #fff;background: none; width: 100%; color: black" id="cmbLoai">
						<option value="0">ALL</option>
                      @foreach($dscate as $l)
                        <option value="{{$l->id}}">{{$l->name}}</option>
                      @endforeach
                	</select>
				</div>

				<div class="col-md-3">
					<input style="border-color: black" name="author" id="txtAuthor" placeholder="Tác Giả" type="text" style="color: black">
				</div>

				<div class="col-md-3">
					<button type="button" style="height: 52px; width: 100%" style="margin-left:50px;" id="btnTimkiem" class="btn btn-info"><i class="fa fa-heart"></i> Tìm Kiếm</button>
				</div>
			</div>
				
				
				<!-- <input name="cate" placeholder="Thể Loại" type="text" > -->
				
				
			</form>
		<div class="clearfix"> </div>
	</div>
</div>


@include('home.request')
@include('home.login')
@endsection


@section('script')
	<script>
    $(document).ready(function(){
        $("#btnTimkiem").click(function(){
        Name = $('#txtName').val().trim();
        Name = Name == "" ? "-" : Name;
        Author = $('#txtAuthor').val().trim();
        Author = Author == "" ? "-" : Author;
        maLoai = $('#cmbLoai :selected').val();
        location.href = "/audio/public/search/"+maLoai+"/"+Name+"/"+Author;
    });
});
</script>
	@endsection