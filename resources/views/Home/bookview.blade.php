	@extends('home.app') 
	@section('css')
	<style type="text/css">
	.comments-container {
		margin: 60px auto 15px;
		width: 768px;
	}

	.comments-container h1 {
		font-size: 36px;
		color: #283035;
		font-weight: 400;
	}

	.comments-container h1 a {
		font-size: 18px;
		font-weight: 700;
	}

	.comments-list {
		margin-top: 30px;
		position: relative;
	}

	/**
	 * Lineas / Detalles
	 -----------------------*/
	.comments-list:before {
		content: '';
		width: 2px;
		height: 100%;
		background: #c7cacb;
		position: absolute;
		left: 32px;
		top: 0;
	}

	.comments-list:after {
		content: '';
		position: absolute;
		background: #c7cacb;
		bottom: 0;
		left: 27px;
		width: 7px;
		height: 7px;
		border: 3px solid #dee1e3;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
	}

	.reply-list:before, .reply-list:after {display: none;}
	.reply-list li:before {
		content: '';
		width: 60px;
		height: 2px;
		background: #c7cacb;
		position: absolute;
		top: 25px;
		left: -55px;
	}


	.comments-list li {
		margin-bottom: 15px;
		display: block;
		position: relative;
	}

	.comments-list li:after {
		content: '';
		display: block;
		clear: both;
		height: 0;
		width: 0;
	}

	.reply-list {
		padding-left: 88px;
		clear: both;
		margin-top: 15px;
	}
	/**
	 * Avatar
	 ---------------------------*/
	.comments-list .comment-avatar {
		width: 65px;
		height: 65px;
		position: relative;
		z-index: 99;
		float: left;
		border: 3px solid #FFF;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		overflow: hidden;
	}

	.comments-list .comment-avatar img {
		width: 100%;
		height: 100%;
	}

	.reply-list .comment-avatar {
		width: 50px;
		height: 50px;
	}

	.comment-main-level:after {
		content: '';
		width: 0;
		height: 0;
		display: block;
		clear: both;
	}
	/**
	 * Caja del Comentario
	 ---------------------------*/
	.comments-list .comment-box {
		width: 680px;
		float: right;
		position: relative;
		-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
		-moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
		box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	}

	.comments-list .comment-box:before, .comments-list .comment-box:after {
		content: '';
		height: 0;
		width: 0;
		position: absolute;
		display: block;
		border-width: 10px 12px 10px 0;
		border-style: solid;
		border-color: transparent #85eeff;
		top: 8px;
		left: -11px;
	}

	.comments-list .comment-box:before {
		border-width: 11px 13px 11px 0;
		border-color: transparent rgba(0,0,0,0.05);
		left: -12px;
	}

	.reply-list .comment-box {
		width: 610px;
	}
	.comment-box .comment-head {
		background: #85eeff;
		padding: 10px 12px;
		border-bottom: 1px solid #E5E5E5;
		overflow: hidden;
		-webkit-border-radius: 4px 4px 0 0;
		-moz-border-radius: 4px 4px 0 0;
		border-radius: 4px 4px 0 0;
	}

	.comment-box .comment-head i {
		float: right;
		margin-left: 14px;
		position: relative;
		top: 2px;
		color: #A6A6A6;
		cursor: pointer;
		-webkit-transition: color 0.3s ease;
		-o-transition: color 0.3s ease;
		transition: color 0.3s ease;
	}

	.comment-box .comment-head i:hover {
		color: #03658c;
	}

	.comment-box .comment-name {
		color: #283035;
		font-size: 14px;
		font-weight: 700;
		float: left;
		margin-right: 10px;
	}

	.comment-box .comment-name a {
		color: #283035;
	}

	.comment-box .comment-head span {
		float: left;
		color: #999;
		font-size: 13px;
		position: relative;
		top: 1px;
	}

	.comment-box .comment-content {
		background: #FFF;
		padding: 12px;
		font-size: 15px;
		color: #595959;
		-webkit-border-radius: 0 0 4px 4px;
		-moz-border-radius: 0 0 4px 4px;
		border-radius: 0 0 4px 4px;
	}

	.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
	.comment-box .comment-name.by-author:after {
		content: 'autor';
		background: #03658c;
		color: #FFF;
		font-size: 12px;
		padding: 3px 5px;
		font-weight: 700;
		margin-left: 10px;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
	}

	/** =====================
	 * Responsive
	 ========================*/
	@media only screen and (max-width: 766px) {
		.comments-container {
			width: 480px;
		}

		.comments-list .comment-box {
			width: 390px;
		}

		.reply-list .comment-box {
			width: 320px;
		}
	}
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
					<li>{{$book->name}}</li>
				</ul>
			</div>
			<div class="w3_agile_breadcrumbs_right">
				<!-- <h2>{{$book->name}}</h2> -->
				<!-- <p>{{$book->uploaddate}}</p> -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="about w3_music">
		<div class="container">
			<h3 class="agileits_w3layouts_head" style="font-family: 'Prompt', sans-serif;"><span>{{$book->name}}</span></h3>
			<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
				<div class="col-md-5">
					<img src="{{ asset('upload/image/' . $book->image)}}" alt=" " style=" width: 450px;height: 600px;" class="img-responsive"  />
				</div>
				<!-- <div class="col-md-7">
					
				</div> -->

				<div class="col-md-7">
	  					<div class="control-box p-2 breadcrumb">

	  						<p >
	  							<strong>Tác Giả:</strong> 
	  								{{$book->author}}
	  						</p>
	  						<p>
	  							<strong>Ngày Đăng:</strong> {{ Carbon\Carbon::parse($book->createddate)->format('d-m-Y h:i:s') }} ---
	
	  								<?php \Carbon\Carbon::setLocale('vi')  ?> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($book->uploaddate  ))->diffForHumans() }}
	  						</p>
	  						<p>
	  							<strong>Số Chap:</strong> 
	  								{{$book->chaptotal}}
	  						</p>
	  						<p>
	  							<strong>Thể Loại: </strong>
		  						@foreach($tags as $tag)
									<span class="badge badge-pill badge-success">{{$tag->name}}</span>
		  						@endforeach
	  						</p>

	  						<p>
	  							<strong>Lượt Theo Dõi: </strong>
		  							{{$book->followcount}}
	  						</p>
	  					</div>
	  					<div class="control-box p-3 main-content">
	  						
	  						
	  					 <!-- <h1>O Curso  Negócio em 21 Dias do Caio Ferreira Funciona?</h1> -->
			             <p style="font-family: 'Prompt', sans-serif !important">
			                {!!$book->description!!}
			             </p>
	             
	  					</div>

	  					<div class="row" style="margin-bottom: 20px;">
	  						@guest
	  						<!-- <div class="col-md-6"></div> -->
								<div class="col-md-7"><h4 style="font-family: 'Prompt', sans-serif !important">Đăng Nhập Để Theo Dõi</h4></div>
								<div class="col-md-5"></div>
	  						
	  						@else
	  						@if($follow == 0)
	  						<form action="{{route('follow.store')}}" method="post">
        					{{csrf_field()}}
								<div class="form-group">
									<input type="hidden" name="bookid" id="bookid1" value="{{$book->id}}">
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"><button style="margin-left:50px;" class="btn btn-info"><i class="fa fa-heart"></i> Theo Dõi</button></div>
								<div class="col-md-4"></div>
								
								
							</form>
							@else
							<!-- <div class="col-md-6"></div> -->
								<div class="col-md-7"><h4 style="font-family: 'Prompt', sans-serif !important">Bạn Đã Theo Dõi Truyện Này</h4>
	  						</div>
							<div class="col-md-5"></div>
						
	  						@endif
						@endguest
	  					</div>
	
						@if(count($chaps)>0)
	  					<table class="table table-bordered">
			              <thead>
			                <tr>
			                  <th width="100px;">Số Chương</th>
			                  <th>Mô Tả Chương</th>
			                  <th>File</th>
			                </tr>
			              </thead>  
			              <tbody>
			                @foreach($chaps as $chap)
			                  <tr>  
			                      <td style="text-align: center;">
			                        {{$chap->chapnumber}}
			                      </td> 
			                      <td>
			                        {{$chap->description}}
			                      </td> 
			                      <td style="text-align: center;">
			                        <audio controls>
			                        <source src="{{ asset('upload/audio/' . $chap->filename)}}" type="audio/mpeg">
			                        Your browser does not support the audio element.
			                      </audio>
			                      </td>  
			                      
			                  </tr>
			                  @endforeach  
			                  </tbody>
              			</table>
              			@else
							<button >Đặt nghe truyện 30 ngày</button>
              			@endif

	  					
	  				</div>
	  				</div>
	  				<div class="row" style="margin-bottom: 20px;">
	  					<div class="col-md-5">
	  						@guest
	  						<div style="margin: 60px auto 15px;">
	  							<h3 style="font-family: 'Prompt', sans-serif !important">Đăng Nhập Để Bình Luận</h3>
	  						</div>
	  						@else
	  						<form action="{{route('comment.store')}}" method="post">
        					{{csrf_field()}}
	  						<div style="margin: 60px auto 15px;">
								<h1 style="font-family: 'Prompt', sans-serif !important">Viết Bình Luận</h1>
								<div class="form-group">
									<input type="hidden" name="bookid" id="bookid" value="{{$book->id}}">
									<textarea name="content" placeholder="Viết Bình Luận Của Bạn Tại Đây" style="width: 100%" rows="5"></textarea>
									<!-- <button class="btn btn-info"></button> -->
								</div>
								<div class="form-group" >
									<button style="float: right;" class="btn btn-info">Gửi Bình Luận</button>
								</div>
									
							</div>
						</form>
						@endguest
		  				</div>

		  				<div class="col-md-7">
							    <div class="comments-container" >
									<h1 style="font-family: 'Prompt', sans-serif !important">Bình Luận</h1>
									@if (count($comment) > 0)
    									<ul id="comments-list" class="comments-list">
										@foreach($comment as $c)
										<li>
											<div class="comment-main-level">
												<!-- Avatar -->
												<div class="comment-avatar"><img src="{{ asset('upload/comment-icon.png')}}" alt=""></div>
												<!-- Contenedor del Comentario -->
												<div class="comment-box">
													<div class="comment-head">
														<h6 class="comment-name"><a href="http://creaticode.com/blog">{{$c->name}}</a></h6>
														<span class="comment-name" style="float: right;"><?php \Carbon\Carbon::setLocale('vi')  ?> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($c->createdate  ))->diffForHumans() }}</span>
														
													</div>
													<div class="comment-content">
														{!!$c->content!!}
													</div>
												</div>
											</div>
										</li>
										@endforeach
										</ul>
									@else
									<h3 style="font-family: 'Prompt', sans-serif !important">Truyện Chưa Có Bình Luận</h3>
									@endif
									
								</div>
							</div>
	  				</div>
	  				
			



			
			
		</div>
		</div>
	</div>
@include('home.request')
	@include('home.login')
	@endsection