@guest
@else
<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
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
					<div class="col-md-6 w3_modal_body_right agile_mail_grid_left" style="margin-top: 50px;">
						<h2 style="font-family: 'Prompt', sans-serif !important">Gửi Yêu Cầu Truyện</h2>
						<form  method="POST" action="{{ route('request.store') }}">
							{{ csrf_field() }}
							<div>

								<label for="username">Tên Truyện </label>
								<input id="bookname" type="text" name="bookname"  value="{{ old('bookname') }}">

							</div>


							<div>

								<label for="username">Nội Dung Yêu Cầu </label>
								<textarea name="content" placeholder="Nội Dung Yêu Cầu" style="width: 100%" rows="2"></textarea>

							</div>

							<div>
								<label for="username">Thể Loại Yêu Cầu </label>
								<select style="outline: none; border: 1px solid black; padding: 12px; font-size: 14px;color: #fff;background: none; width: 100%; color: black" id="cmbLoai" name="categoryid">
			                      @foreach($dscate as $l)
			                        <option value="{{$l->id}}">{{$l->name}}</option>
			                      @endforeach
			                	</select>
							</div>
							
							<div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
								<input type="submit" value="Gửi Yêu Cầu"  style="float: right; width: 100%" >
								
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

@endguest