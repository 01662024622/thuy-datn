@extends('admin.layouts.app')   

@section('title')
Quản Lí Truyện Audio
@endsection


@section('page-header')
<h1>
  Danh Sách Truyện
  <small>Danh Sách Truyện</small>
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
              "positionClass": "toast-top-center",
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
          "positionClass": "toast-top-center",
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
          "positionClass": "toast-top-center",
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
    <h3 class="box-title">Danh Sách Bộ Môn</h3>
  </div>
  <!-- /.box-header -->

  <div class="box-body">

    <table class="table table-bordered table-hover" id="example2">
      <thead>
          <th colspan="8">Thông Tin Truyện</th>
          <th colspan="2">Tác Vụ</th>
          <tr>
            <th>STT</th>
            <th>Tên Truyện</th>
            <th>Ảnh Bìa</th>
            <th>Số Chap</th>
            <th>Tác Giả</th>
            <th>Lượt Theo Dõi</th>
            <th>Ngày Đăng</th>
            <th>Trạng Thái</th>
            <th style="text-align: center;">

              <a href=" {{ route('book.create') }}" ><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
               <i class="fa fa-plus"></i> Thêm Truyện
             </button></a>
           </th>
         </tr>
       </thead>
       <tbody>
        @foreach ($dsbook as $k)
        <tr>
          <td>{{$loop->index + 1}}</td>
          <td style="text-align: left;">{{ str_limit($k->name, $limit = 20, $end = '...') }}</td>
          <td><img src="{{ asset('upload/image/' . $k->image)}}" width="100px", height="100px"> </td>
          <td>{{$k->chaptotal}}</td>
          <td style="text-align: left;">{{$k->author}}</td>
          <td>{{$k->followcount}}</td>
          <td>{{ Carbon\Carbon::parse($k->uploaddate)->format('d-m-Y h:i:s') }}</td>
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
            <a href=" {{ route('book.edit', ['book' => $k->id]) }}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
            
            <button class="btn btn-danger" data-catid="{{$k->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
          </td>
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
      <form action="{{route('book.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="idbook" id="idbook" value="">
          <p class="text-center">
            Bạn Có Chắc Chắn Xóa?
          </p>
          <input type="hidden" name="idbook" id="idbook" value="">

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

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('catid') 
    var modal = $(this)
    modal.find('.modal-body #idbook').val(id);
  })
</script>


@endsection
