@extends('admin.layouts.app')   

@section('title')
Quản Lí Thể Loại
@endsection


@section('page-header')
<h1>
  Danh Sách Thể Loại Truyện
  <small>Danh Sách Thể Loại Truyện</small>
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
  .btn{
    width: 40%;
  }
</style>
@endsection
@section('content')

<div class="box">

  @if($errors->any())
      @foreach($errors->all() as $error)
      
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
              "hideDuration": "1000"
            }
            toastr.warning( '{{$error}}', 'Error!!!', {timeOut: 50000});
        }, 500);
    </script>
      @endforeach
@endif

@if(Session::has('success'))
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
        toastr.success('Thêm Thành Công', 'Successfully!!!', {timeOut: 800});
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
        toastr.success('Xóa Thành Công', 'Successfully!!!', {timeOut: 800});
    }, 500);
</script>
@endif
  <div class="box-header">
    <h3 class="box-title">Danh Sách Thể Loại Truyện</h3>
  </div>
  <!-- /.box-header -->

  <div class="box-body">

    <table class="table table-bordered table-hover" id="example2">
      <thead>
          <th colspan="3">Thông Tin Thể Loại</th>
          <th colspan="2">Tác Vụ</th>
          <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Tên Thể Loại</th>
            <th>Trạng Thái</th>
            <th style="text-align: center;">
              <button type="button" class="btn btn-info" style="width: 70%" data-toggle="modal" data-target="#myModal">
               <i class="fa fa-plus"></i> Thêm Thể Loại
             </button>
           </th>
         </tr>
       </thead>
       <tbody>
        @foreach ($dscategory as $k)
        <tr>
          <td>{{$loop->index + 1}}</td>
          <td>{{$k->code}}</td>
          <td>{{$k->name}}</td>
          @if($k->active == 1)
          <td>
          <span class="pull-center badge bg-green">Khả Dụng</span>
          </td>
          @else
          <td>
          <span class="pull-center badge bg-red">Khóa</span>
          </td>
          @endif
          <td>
            <button class="btn btn-warning" data-mytitle="{{$k->name}}" data-catid="{{$k->id}}" data-active="{{$k->active}}" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Cập Nhật</button>
            <button class="btn btn-danger" data-catid="{{$k->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> Xóa</button>
          </td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- /.box-body -->
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm Thể Loại</h4>
      </div>
      <form action="{{route('category.store')}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Tên Thể Loại</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>

          <div class="form-group">
            <label for="title">Trạng Thái</label>
            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="active", id="active">

              <option value="1">Khả Dụng</option>
              <option value="0">Khóa</option>

            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập Nhật Thể Loại</h4>
      </div>
      <form action="{{route('category.update','test')}}" method="post">
        {{method_field('patch')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="title">Tên Thể Loại</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>

          <div class="form-group">
            <label for="title">Trạng Thái</label>
            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="active", id="active">

              <option value="1">Khả Dụng</option>
              <option value="0">Khóa</option>

            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Xác Nhận Xóa</h4>
      </div>
      <form action="{{route('category.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="">
          <p class="text-center">
            Bạn Có Chắc Chắn Xóa?
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

@endsection

@section('script')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset ('theme/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('theme/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })


  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var name = button.data('mytitle') 
    var id = button.data('catid') 
    var active = button.data('active') 
    var modal = $(this)
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #active').val(active);
  })
  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('catid') 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
  })

</script>


@endsection
