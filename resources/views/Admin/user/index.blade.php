@extends('admin.layouts.app')   

@section('title')
  Danh Sách Người Dùng
@endsection


@section('page-header')
      <h1>
        Danh Sách Người Dùng
        
      </h1>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset ('css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset ('theme/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<style>
/*a {
  color: black !important;
  }*/
  td{
    text-align: center; !important;
  }

  th{
    text-align: center; !important;
  }

  .badge{
    width: 80%;
  }
  /*.btn{
    width: 40%;
  }*/
</style>
@endsection


<!-- noi dung can thay doi o giua -->
@section('content')


@if(Session::has('capquyensuccess'))
<script type="text/javascript">
     setTimeout(function () {
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "100",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr.success('Xóa Người Dùng Thành Công', 'Successfully!!!', {timeOut: 800});
    }, 500);
</script>
@endif
@if(Session::has('deletesuccess'))
<script type="text/javascript">
     setTimeout(function () {
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "100",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr.success('Xóa Người Dùng Thành Công', 'Successfully!!!', {timeOut: 800});
    }, 500);
</script>
@endif
<div class="box">
            <div class="box-header">
              

              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover" id="example2">
                 <thead>
                  <th colspan="5">Thông Tin Người Dùng</th>
                  <th colspan="1">Tác Vụ</th>
                  <tr>
                  <th>STT</th>
                  <th>Tên Hiển Thị</th>
                  <th>Email</th>
                  <th>Ngày Đăng Ký</th>
                  <th>Loại Tài Khoản</th>
                  <th></th>
                  <th></th>
                </tr></thead>
                <tbody>
                @foreach ($dsUser as $kh)
        <!-- nhãn từ controller -->
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$kh->name}}</td>
                    <td>{{$kh->email}}</td>
                    <td>{{ Carbon\Carbon::parse($kh->created_at)->format('d-m-Y h:i:s') }}</td>
                    @if($kh->isadmin == 1)
                    <td>
                      <span class="pull-center badge bg-green">Manager</span>
                    </td>
                    @else
                    <td>
                      <span class="pull-center badge bg-blue">User</span>
                    </td>
                    @endif
                    @if($kh->isadmin == 0)
                    <td>
                      <button class="btn btn-info" data-catid="{{$kh->id}}" data-toggle="modal" data-target="#Add"><i class="fa fa-users"></i> Cấp Quyền Manager</button>
                    </td>
                    @else
                    <td>
                     <button class="btn btn-info" data-catid="{{$kh->id}}" data-toggle="modal" data-target="#Move"><i class="fa fa-users"></i> Hủy Quyền Manager</button>
                    </td>
                    @endif
                    <td>
                      <button class="btn btn-danger" data-catid="{{$kh->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> Xóa</button>
                    </td>
                    
                </tr>
        @endforeach
      </tbody>

                
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center" id="myModalLabel">Xác Nhận Xóa</h4>
                </div>
                <form action="{{route('user.destroy','test')}}" method="post">
                  {{method_field('delete')}}
                  {{csrf_field()}}
                  <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <p class="text-center">
                      Bạn Có Chắc Chắn Xóa?
                    </p>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-warning">Có</button>
                  </div>
                </form>
              </div>
            </div>
</div>







<div class="modal modal-danger fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Xác Cấp Quyền Manager</h4>
      </div>
      <form action="/user" method="post">
        {{-- {{method_field('put')}} --}}
        {{csrf_field()}}
        <div class="modal-body">
          <p class="text-center">
            Bạn Có Chắc Chắn Cấp Quyền Manager?
          </p>
          <input type="hidden" name="id" id="id" value="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Không</button>
          <button type="submit" class="btn btn-warning">Có</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="Move" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Xác Nhận Hủy Quyền Manager</h4>
      </div>
      <form action="/user" method="post">
        {{-- {{method_field('put')}} --}}
        {{csrf_field()}}
        <div class="modal-body">
          <p class="text-center">
            Bạn Có Chắc Chắn Hủy Quyền Manager?
          </p>
          <input type="hidden" name="id" id="eid" value="">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Không</button>
          <button type="submit" class="btn btn-warning">Có</button>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection

@section('script')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset ('theme/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('theme/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
$('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('catid') 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
  })
$('#Add').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('catid') 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
  })

$('#Move').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('catid') 
    var modal = $(this)
    modal.find('.modal-body #eid').val(id);
  })
</script>


@endsection
