	@extends('home.app') 
	@section('css')
	<style type="text/css">
	
	</style>
	@endsection
	@section('header')
	@include('home.miniheader')
	@endsection  
	@section('content')
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3l_breadcrumbs_left">
				<ul>
					<li><a href="{{ route('home.index') }}">Home</a><i>/</i></li>
					<li><a href="{{ route('myBook') }}">Truyện Của Tôi</a></li>
				</ul>
			</div>
			<div class="w3_agile_breadcrumbs_right">
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
@guest
<div class="breadcrumbs">
	<div class="container">
		<h3 style="font-family: 'Prompt', sans-serif !important">Truyện Của Tôi ---------- Bạn Chưa Đăng Nhập</h3>
		<!-- <h4 style="font-family: 'Prompt', sans-serif !important">Bạn Chưa Đăng Nhập</h4> -->
		<div class="clearfix"> </div>
	</div>
</div>
@else
<div class="breadcrumbs">
	<div class="container">
		<h3 style="font-family: 'Prompt', sans-serif !important">Truyện Của Tôi</h3>
		<h4 style="font-family: 'Prompt', sans-serif; float: right; !important">Xin Chào {{Auth::user()->name }} Bạn đã theo dõi tất cả {{$count}} truyện</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="container" style="margin-top: 20px;">
	<div class="banner-bottom">
	@foreach($dsbook as $k)
		<div class="col-md-4 wthree_banner_bottom_grid">
			<div class="wthree_banner_bottom_grid1">

				<img src="{{ asset('upload/image/' . $k->image)}}" style="width: 380px; height: 500px !important" class="img-responsive" />
				<div class="wthree_banner_bottom_grid_pos">
					<h4>{{$k->followcount}}  <span>Follows</span></h4>
				</div>
			</div>
			<div class="w3layouts_banner_bottom_grid">
				<a href="{{ route('home.show', ['book' => $k->bookid]) }}" target="_blanks">
				<h3 style="font-family: 'Prompt', sans-serif;"><i class="fa fa-wpbeginner"></i> {{ str_limit($k->name, $limit = 10, $end = '...') }}</h3></a>
				<!-- <h4 class="w3ls_color"> <i class="fa fa-user"></i> {{ str_limit($k->author, $limit = 10, $end = '...') }}</h4>
				<h4 class="w3ls_color"> <i class="fa fa-calendar"></i><?php \Carbon\Carbon::setLocale('vi')  ?> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($k->uploaddate  ))->diffForHumans() }}</h4> -->
				<li>Tác Giả: {{ str_limit($k->author, $limit = 10, $end = '...') }}</li>
				<li>Số Chương: {{ $k->chaptotal }}</li>
				<li>Ngày Đăng: {{ Carbon\Carbon::parse($k->uploaddate)->format('d-m-Y h:i:s') }}</li>
				<a style="margin-top: 5px; float: right" href="{{ route('home.show', ['book' => $k->bookid]) }}" target="_blanks">Đọc Truyện >>>></a>
				
			</div>


		</div>
	@endforeach


		
		<div class="clearfix"></div>
		<div style="float: right">{{ $dsbook->links() }}</div>
		
	</div>
	</div>
	@include('home.request')
@endguest
	@include('home.login')
@endsection

	