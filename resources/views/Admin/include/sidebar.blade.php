<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset ('Theme/admin/dist/img/avatar.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        Trạng Thái
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <hr/>

    <!-- Sidebar user panel (optional) -->
     <!--  <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          Status
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::user()->isadmin==2)

        <li><a href="#"><i class="fa fa-dashboard"></i> <span>Trang Chủ Admin</span></a></li>
        <li><a href="{{route('home.index')}}"><i class="fa fa-dashboard"></i> <span>Trang Chủ </span></a></li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Người Dùng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.index')}}"><i class="fa fa-users"></i> <span>Quản Lý Người Dùng</span></a></li>
          </ul>
        </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i>
            <span>Thể Loại</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> <span>Quản Lý Thể Loại</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-align-justify"></i>
            <span>Yêu Cầu Truyện</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('request.index')}}"><i class="fa fa-circle-o"></i> <span>Quản Lý Yêu Cầu Truyện</span></a></li>
            </ul>
          
        </li>    
        @endif

        <li class="treeview">
          <a href="#">
            <i class="fa  fa-headphones"></i>
            <span>Truyện</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('book.index')}}"><i class="fa fa-circle-o"></i> <span>Quản Lý Truyện</span></a></li>
            <li><a href="{{route('book.create')}}"><i class="fa fa-circle-o"></i> <span>Upload Truyện</span></a></li>
          </ul>
          
        </li>
    



        



      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>