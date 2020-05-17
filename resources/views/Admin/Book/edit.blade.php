    @extends('admin.layouts.app')   

    @section('title')
      Cập Nhật Truyện
    @endsection


    @section('page-header')
          <h1>
            Cập Nhật Truyện
          </h1>
    @endsection

    @section('css')

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
          width: 60%;
        }*/

        .img-overlay {
          position: absolute;
    right: 14px; /*your button position*/
          text-align: center;
        }

        
      </style>
    @endsection

    @section('content')
    @if($errors->any())
          <div class="callout callout-warning">
            <h4>Warning!!!</h4>
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
          </div>
          
    @endif


    <form name="frmSanPham" method="POST" action="{{route('book.update', ['book'=> $book->id]) }}" enctype="multipart/form-data"> <!-- action tu controller -->
      <!-- enctype="multipart/form-data" để đưa ảnh lên host -->
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="box box-primary">
          <div class="box-header with-border">
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4">
              
            </div>
            <div class="col-md-4">
             <!--  <button type="submit" id="btnSubmit" class="btn btn-primary">Tải Truyện</button> -->
            </div>

            
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <div class="box-body">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Truyện</label>
                  <input type="text" class="form-control" id="name" name="name"  value="{{$book->name}}" placeholder="Nhập Tên Truyện" required="" oninvalid="this.setCustomValidity('Vui Lòng Nhập Tên Truyện')"
                  oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tác Giả</label>
                  <input type="text" class="form-control" id="author" name="author"  value="{{$book->author}}" placeholder="Nhập Tên Tác Giả" required="" oninvalid="this.setCustomValidity('Vui Lòng Nhập Tác Giả')"
                  oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tổng Số Chương</label>
                  <input type="number" class="form-control" id="chaptotal" name="chaptotal"  value="{{$book->chaptotal}}" placeholder="Nhập Tổng Số Chương" required="" onkeypress="return event.charCode >= 48" min="1" oninvalid="this.setCustomValidity('Vui Lòng Nhập Tổng Số Chương')"
                  oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label>Thể Loại</label>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Tên Thể Loại</th>
                        <th>Tác Vụ</th>
                      </tr>
                    </thead>  
                    <tbody>
                      @foreach($tags as $tag)
                        <tr>  
                            <td style="text-align: left;">
                              {{$tag->name}}
                            </td> 
                            
                            <td>
                              <button type="button" class="btn btn-danger" data-catid="{{$tag->tagid}}" data-toggle="modal" data-target="#deletetag"><i class="fa fa-trash"></i> </button>
                            </td>  
                        </tr>
                        @endforeach  
                        </tbody>
                    </table>
                  </div>

                <div class="form-group">
                    <label>Thể Loại (Có thể chọn nhiều thể loại)</label>
                    <select multiple="" class="form-control" name="tags[]">
                      
                      @foreach($dscate as $l)
                        <option value="{{$l->id}}">{{$l->name}}</option>
                      @endforeach
                      
                    </select>
                  </div>

                  <div class="form-group">

                  <label for="exampleInputEmail1">Mô Tả Truyện</label>
                  <textarea id="editor1" name="description" rows="10" cols="80">
                          {!! $book->description !!}
                  </textarea>
                </div>


              </div>


              <div class="col-md-7">
              <div class="form-group">
              <label for="title">Trạng Thái</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="active", id="active">
                <option value="1" <?php echo ($book->active == 1) ? 'selected' : ''  ?>>Khả Dụng</option>
                <option value="0" <?php echo ($book->active == 0) ? 'selected' : ''  ?>>Khóa</option>

              </select>
            </div>
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="100px;">Số Chương</th>
                  <th>Mô Tả Chap</th>
                  <th>File</th>
                  <th>Tác Vụ</th>
                </tr>
              </thead>  
              <tbody>
                @foreach($chaps as $chap)
                  <tr>  
                      <td>
                        {{$chap->chapnumber}}
                      </td> 
                      <td>
                        {{$chap->description}}
                      </td> 
                      <td>
                        <audio controls>
                        <source src="{{ asset('upload/audio/' . $chap->filename)}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                      </td>  
                      <td>
                        <button class="btn btn-warning" data-fileaudio="{{$chap->filename}}" data-number="{{$chap->chapnumber}}" data-mytitle="{{$chap->description}}" data-catid="{{$chap->id}}" data-toggle="modal" data-target="#editchap"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" data-catid="{{$chap->id}}" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> </button>
                      </td>  
                  </tr>
                  @endforeach  
                  </tbody>
              </table>

              <table class="table table-bordered" id="dynamic_field">
                <button type="button" name="add" id="add" class="btn btn-success">Thêm Chap</button>
              <thead id="header">
                <tr>
                  <th width="100px;">Số Chương</th>
                  <th>Mô Tả Chap</th>
                  <th>File</th>
                  <th>Tác Vụ</th>
                </tr>
              </thead>  
              <tbody>
                  <!-- <tr>  
                      <td>
                        <input type="number" name="chap[][chapnumber]" onkeypress="return event.charCode >= 48" min="1" class="form-control" />
                      </td> 
                      <td>
                        <textarea name="desc[][desc]" class="form-control"></textarea>
                      </td> 
                      <td>
                        <input type="file" name="chap[][filename]" accept="audio/mp3,audio/*;capture=microphone"> 
                      </td>  
                      <td></td>  
                  </tr>   -->
                  </tbody>
              </table>  


              <div id="filediv">
                <label for="exampleInputFile">Ảnh Bìa Truyện</label>
                <img src="{{ asset('upload/image/' . $book->image)}}" width="100%">
                <input type="file" id="image" name="image" >
              </div>

              
                  
            </div>

              

              <div class="col-md-12">
              


              
            </div>


          <!--   <div class="col-md-6">
                  <div id="filediv">
                    <label for="exampleInputFile">Ảnh Bìa Truyện</label>
                    <input type="file" id="image" name="image">
                  </div>
              </div> -->


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
               <!-- <div class="form-group" style="margin-top: 50px;"> -->
                <button style="float: right" type="submit" id="btnSubmit" class="btn btn-primary">Cập Nhật Truyện</button>  
              <!-- </div> -->
            </div>
      </div>
      </form>


      
<div class="modal fade" id="editchap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập Nhật Chap</h4>
      </div>
      <form action="{{route('chap.update','test')}}" method="post" enctype="multipart/form-data">
        {{method_field('patch')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="chapid" id="chapid" value="">
          <div class="form-group">
            <label for="title">STT Chap</label>
            <input type="text" class="form-control" name="chapnumber" id="chapnumber">
          </div>

          <div class="form-group">
            <label for="title">Mô Tả Chap</label>
            <input type="text" class="form-control" name="chapdescription" id="chapdescription">
          </div>

          <div class="form-group">
            <label for="title">File</label>
            <input type="text" class="form-control" name="fileaudio" id="fileaudio" readonly="true"> 
          </div>

          <div class="form-group">
            <input type="file" id="audioedit" name="audioedit" accept="audio/mp3,audio/*;capture=microphone">
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
      <form action="{{route('chap.update','test')}}" method="post">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="chapid" id="chapid" value="">
          <p class="text-center">
            Bạn Có Chắc Chắn Xóa?
          </p>
          <input type="hidden" name="chapid" id="chapid" value="">
          <input type="hidden" name="active" id="active" value="0">
          <!-- <input type="hidden" name="bookid"  value="{{$book->id}}"> -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Không</button>
          <button type="submit" class="btn btn-warning">Có</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- delete tag -->
<div class="modal modal-danger fade" id="deletetag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Xác Nhận Xóa</h4>
      </div>
      <form action="{{route('tag.update','test')}}" method="post">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="modal-body">
          <input type="hidden" name="tagid" id="tagid" value="">
          <p class="text-center">
            Bạn Có Chắc Chắn Xóa?
          </p>
          <input type="hidden" name="tagid" id="tagid" value="">
          <input type="hidden" name="tagactive" id="tagactive" value="0">
          <!-- <input type="hidden" name="bookid"  value="{{$book->id}}"> -->

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
    <script src=" {{ asset ('theme/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
      $(function () {
        CKEDITOR.replace('editor1');
        
      })

      //Cập Nhật Chap
      $('#editchap').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var desc = button.data('mytitle') 
        var id = button.data('catid') 
        console.log(id);
        var fileaudio = button.data('fileaudio') 
        var chapnumber = button.data('number') 
        var modal = $(this)
        modal.find('.modal-body #chapdescription').val(desc);
        modal.find('.modal-body #chapid').val(id);
        modal.find('.modal-body #chapnumber').val(chapnumber);
        modal.find('.modal-body #fileaudio').val(fileaudio);
      })
      //Xóa Chap
      $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var chapid = button.data('catid') 
        console.log(chapid);
        var modal = $(this)
        modal.find('.modal-body #chapid').val(chapid);
      })

      //Xóa tag
      $('#deletetag').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var tagid = button.data('catid') 
        console.log(tagid);
        var modal = $(this)
        modal.find('.modal-body #tagid').val(tagid);
      })
      function deletePreview(ele, i) {
        try {
          $(ele).parent().remove();
          document.getElementById('image').value = "";
          window.filesToUpload.splice(i, 1);
        } catch (e) {
          console.log(e.message);
        }
      }
      $("#image").on('change', function() {
        window.filesToUpload = [];
        if (this.files.length >= 1) {
          $("[id^=previewImg]").remove();
          $.each(this.files, function(i, img) {
            var reader = new FileReader(),
              newElement = 
              $("<div id='previewImg" + i + "' class='media-object'><img width= 100%; height=100% style='margin-top: 5px;'/><hr/></div>"),
              deleteBtn = $("<button class='btn btn-danger img-overlay' onClick='deletePreview(this, " + i + ")'><i class='fa fa-trash'></i></button>").prependTo(newElement),
              preview = newElement.find("img");
            reader.onloadend = function() {
              preview.attr("src", reader.result);
              preview.attr("alt", img.name);
            };
            try {
              window.filesToUpload.push(document.getElementById("file").files[i]);
            } catch (e) {
              console.log(e.message);
            }
            if (img) {
              reader.readAsDataURL(img);
            } else {
              preview.src = "";
            }
            newElement.appendTo("#filediv");
          });
        }
      });

    </script>


    <script type="text/javascript">
          $(document).ready(function(){
            $('#header').hide();
            var i=0;  
            $('#add').click(function(){ 
            $('#header').show(); 
             i++;  
             $('#dynamic_field').append(
              '<tr id="row'+i+'" class="dynamic-added"><td><input type="number" onkeypress="return event.charCode >= 48" min="1" name="chap[][chapnumber]" class="form-control name_list" required="" /></td>'+
              '<td>'+
                '<textarea name="desc[][desc]" class="form-control"></textarea>'+
              '</td> '+
              '<td>'+
                '<input type="file" name="chap[][filename]" accept="audio/mp3,audio/*;capture=microphone"> '+
              '</td> '+
              '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa fa-trash"></i></button></td></tr>');  
        });  


        $(document).on('click', '.btn_remove', function(){  
             var button_id = $(this).attr("id");   
             $('#row'+button_id+'').remove();  
        });  

            
          });
        </script>
    @endsection