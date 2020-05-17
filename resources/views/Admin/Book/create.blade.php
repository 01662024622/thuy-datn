    @extends('admin.layouts.app')   

    @section('title')
      Thêm Truyện
    @endsection


    @section('page-header')
          <h1>
            Thêm Truyện
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
    <form name="frmSanPham" method="POST" action="{{route('book.store')}}" enctype="multipart/form-data"> <!-- action tu controller -->
      <!-- enctype="multipart/form-data" để đưa ảnh lên host -->
      {{ csrf_field() }}
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
          <form role="form">
            <div class="box-body">

              <!-- <audio controls>
                <source src="{{ asset ('upload/audio/A.mp3') }}" type="audio/mpeg">
                Your browser does not support the audio element.
              </audio> -->
              
              <!-- <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputPassword1">Hãng Sản Xuất</label>
                <select name="hsx_ma" id="hsx_ma" class="form-control">
                  @foreach($dscate as $l)
                  <option value="{{$l->id}}">{{$l->name}}</option>
                  @endforeach
                </select>
              </div>
              </div> -->

              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Truyện</label>
                  <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" placeholder="Nhập Tên Truyện" required="" oninvalid="this.setCustomValidity('Vui Lòng Nhập Tên Truyện')"
                  oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tác Giả</label>
                  <input type="text" class="form-control" id="author" name="author"  value="{{ old('author') }}" placeholder="Nhập Tên Tác Giả" required="" oninvalid="this.setCustomValidity('Vui Lòng Nhập Tác Giả')"
                  oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Tổng Số Chương</label>
                  <input type="number" class="form-control" id="chaptotal" name="chaptotal"  value="{{ old('chaptotal') }}" placeholder="Nhập Tổng Số Chương" required="" onkeypress="return event.charCode >= 48" min="1" oninvalid="this.setCustomValidity('Vui Lòng Nhập Tổng Số Chương')"
                  oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label>Thể Loại (Có thể chọn nhiều thể loại)</label>
                    <select multiple="" class="form-control" name="tags[]" required="" oninvalid="this.setCustomValidity('Vui Lòng Chọn Thể Loại')" oninput="setCustomValidity('')">
                      @foreach($dscate as $l)
                        <option value="{{$l->id}}">{{$l->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">

                  <label for="exampleInputEmail1">Mô Tả Truyện</label>
                  <textarea id="editor1" name="description" rows="10" cols="80">
                          {!! old('description') !!}
                  </textarea>
                </div>


              </div>

             


              
              <!-- <div class="col-md-6">
                
              </div> -->

              

              <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputFile">Audio</label>
                    <input type="file" id="exampleInputFile" name="audio" accept="audio/mp3,audio/*;capture=microphone">
                  </div>
              </div> -->

              <div class="col-md-7">
              <table class="table table-bordered" id="dynamic_field">
              <thead>
                <tr>
                  <th width="100px;">Số Chương</th>
                  <th>Mô Tả Chap</th>
                  <th>File</th>
                  <th>Tác Vụ</th>
                </tr>
              </thead>  
              <tbody>
                  <tr>  
                      <td>
                        <input type="number" name="chap[][chapnumber]" onkeypress="return event.charCode >= 48" min="1" class="form-control" required="" oninvalid="this.setCustomValidity('Vui Lòng Nhập Số Chương')"
                        oninput="setCustomValidity('')"/>
                      </td> 
                      <td>
                        <textarea name="desc[][desc]" class="form-control"></textarea>
                      </td> 
                      <td>
                        <input type="file" name="chap[][filename]" accept="audio/mp3,audio/*;capture=microphone"> 
                      </td>  
                      <td><button type="button" name="add" id="add" class="btn btn-success">Thêm Chap</button></td>  
                  </tr>  
                  </tbody>
              </table>


              <div id="filediv">
                <label for="exampleInputFile">Ảnh Bìa Truyện</label>
                <input type="file" id="image" name="image">
              </div>


              <div class="form-group" style="margin-top: 50px;">
                <button type="submit" id="btnSubmit" class="btn btn-primary">Tải Truyện</button>  
              </div>
                  
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
               
            </div>
          </form>

      </div>
      </form>

    <!-- noi dung can thay doi o giua -->



    @endsection


    @section('script')
    <script src=" {{ asset ('theme/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
      $(function () {
        CKEDITOR.replace('editor1');
        
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
            var i=1;  
            $('#add').click(function(){  
             i++;  
             $('#dynamic_field').append(
              '<tr id="row'+i+'" class="dynamic-added"><td><input type="number" onkeypress="return event.charCode >= 48" min="1" name="chap[][chapnumber]" class="form-control name_list" required=""/></td>'+
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