
<!-- login -->
@if (session('warning'))
<script>
    alert("{{ session('warning') }}");
</script>
@endif 
@if ($errors->has('email') || $errors->has('password'))
<script>
    alert("Vui Lòng Kiểm Tra Lại Email và Mật Khẩu!");
</script>
@endif


<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- <div class="modal-header" style="background-image: url('{{ asset('Theme/Home/images/banner.jpg')}}')">
				Đăng Nhập
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div> -->
			<section>

				<div class="modal-body">

					<div class="col-md-6 w3_modal_body_left">
						<img src="https://freedesignfile.com/upload/2018/04/Book-with-colored-abstract-wave-background-vector-04.jpg" alt=" " class="img-responsive" />
					</div>
					<div class="col-md-6 w3_modal_body_right agile_mail_grid_left" style="margin-top: 100px;">
						<h2 style="font-family: 'Prompt', sans-serif !important">Đăng Nhập</h2>
						<form  method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}
							<div class="{{ $errors->has('email') ? ' has-error' : '' }}">

								<label for="username">Email </label>
								<input id="email" type="email" name="email"  value="{{ old('email') }}">

							</div>
							<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password">Password</label>
								<input id="password" type="password" name="password">
							</div>
							<div class="col-md-12" style="margin-top: 20px;">
								<input type="submit" value="Đăng Nhập"  style="float: right; width: 100%" >
								
								<!-- <input type="submit" value="Đóng" style="float: left; width: 100%" data-dismiss="modal"> -->
								
								
								
							</div>
							
						</form>


					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>



<div class="modal video-modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- <div class="modal-header" style="background-image: url('{{ asset('Theme/Home/images/banner.jpg')}}')">
				Đăng Nhập
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div> -->
			<section>

				<div class="modal-body">


					<div class="col-md-6 w3_modal_body_left">
						<img src="https://freedesignfile.com/upload/2018/04/Book-with-colored-abstract-wave-background-vector-04.jpg" alt=" " class="img-responsive" />
					</div>
					<div class="col-md-6 w3_modal_body_right agile_mail_grid_left" style="margin-top: 5px;">
						<h2 style="font-family: 'Prompt', sans-serif !important">Đăng Kí</h2>
						<form method="POST" action="{{ route('register') }}">
							{{ csrf_field() }}
							<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="username">Tên Hiển Thị </label>
								<input id="name" type="text" name="name"  value="{{ old('name') }}">
							</div>

							<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="username">Email </label>
								<input id="email" type="email" name="email"  value="{{ old('email') }}">
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password">Mật Khẩu</label>
								<input id="password" type="password" name="password">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password">Nhập Lại Mật Khẩu</label>
								<input id="password_confirmation" type="password" name="password_confirmation">
							</div>
							
							<div class="col-md-12" style="margin-top: 20px;">
								<input type="submit" value="Đăng Kí"  style="float: right; width: 100%" >
							</div>
							
						</form>


					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>