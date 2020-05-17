	<div class="banner">
			<div class="container">
	<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="{{ route('home.index') }}">Audio<span>Online</span></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
						<nav class="menu menu--iris">
							<ul class="nav navbar-nav menu__list">
								<li class="menu__item menu__item"><a href="{{ route('home.index') }}" class="menu__link">Trang Chủ</a></li>
								<li class="menu__item"><a href="{{ route('search') }}" class="menu__link">Truyện</a></li>
								<li class="menu__item"><a href="{{ route('myBook') }}" class="menu__link">Truyện Của Tôi</a></li>
								@guest
	                            <li class="menu__item menu__item"><a data-toggle="modal" href='#myModal' class="menu__link">Đăng Nhập</a></li>
	                            <li class="menu__item menu__item"><a data-toggle="modal" href='#register' class="menu__link">Đăng Kí</a></li>
	                            <!-- <li class="menu__item menu__item"><a href="{{ route('login') }}" class="menu__link">Đăng Nhập</a></li> -->
	                            <!-- <li class="menu__item menu__item"><a href="{{ route('register') }}" class="menu__link">Đăng Ký</a></li> -->
	                        	@else
								<li class="dropdown menu__item">
									<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
									
									<ul class="dropdown-menu agile_short_dropdown">
										<li><a data-toggle="modal" href='#myModal1'>Gửi Yêu Cầu Truyện</a></li>
										<li>@if(Auth::user()->isadmin == '1')
										<a href="{{ route('book.index') }}">Về Trang Quản Trị</a>
										@endif</li>
										<li><a href="{{ route('logout') }}"
	                                    onclick="event.preventDefault();
	                                             document.getElementById('logout-form').submit();">
	                                    Logout
			                                </a>

			                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                                    {{ csrf_field() }}
			                                </form>
			                            </li>
									</ul>
								</li>
								
								@endguest
								<!-- <li class="menu__item"><a href="mail.html" class="menu__link">Mail Us</a></li> -->
							</ul>
						</nav>
					</div>
				</nav>

				<div class="agile_banner_info">
	<h3>Truyện</h3>
	<div class="agile_banner_info_pos">
	<h2>Thư viện báo</h2>
	</div>
	</div>
	</div>
	</div>