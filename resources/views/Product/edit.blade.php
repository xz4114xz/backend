@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/admin/Product/edit/update/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">產品名稱</label>
            <input type="text" class="form-control" id="name" value ={{$product->name}} name ="name"  >
        </div>

        <div class="form-group">
            <label for="info">產品價錢</label>
            <input type="number" class="form-control" id="price" value ={{$product->price}} name ="price"  >
        </div>

        <div class="form-group">

            <label for="product_type_id">產品類型</label>
            <select class ="form-control " name="product_type_id" id="product_type_id">
                @foreach ($product_types as $product_type)
                    <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                @endforeach
            </select>

            {{-- <input type="number" class="form-control mt-3" id="product_type_id" value ={{$product->product_type_id}} name ="product_type_id"  > --}}
        </div>

        <div class="form-group">
            <label for="info">排序</label>
            <input type="number" class="form-control" id="sort" value ={{$product->sort}} name ="sort"  >
        </div>

        <div class="form-group">
            <label for="file">上傳照片</label>
            <img width=200 src={{$product->file}} alt="">
            <input type="file" class="form-control-file" id="file" value ={{$product->file}} name = "file">
        </div>
        {{-- <div>{{$product_imgs}}</div> --}}
        <div class="form-group">
            <label for="multiple_images">內頁多張照片</label>
            <input type="file" class="form-control-file" id="multiple_images"name = "multiple_images[]" multiple>
        </div>

        <div>
            @foreach ($product_imgs as $product_img)
                <img width="200" src={{$product_img->product_image}} alt="">
                <div id ="delete_btn_{{$product_img->id}}"class="deleteBtn btn btn-sm alert-danger" data-imgid={{$product_img->id}}>刪除</div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="info">內文</label>
            <textarea  id ="summernote" type="text" class="form-control" id="info" value ="{{$product->info}}" name = "info">{{$product->info}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">送出審查</button>

    </form>

    {{-- delete  product_images --}}
    @foreach ($product_imgs as $product_img)
        <form method="POST" id="deleteform_{{$product_img->id}}" class="deleteform"  action="/admin/ProductImages/{{$product->id}}/{{$product_img->id}}">
            @csrf
            @method('DELETE')
            {{-- <input type="hidden" value => --}}
        </form>
    @endforeach

</div>


@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-zh-TW.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- sweet alert -->

    <script>
        // summer note initialize
        $(document).ready(function() {
            // $('#summernote').summernote();
            $('#summernote').summernote({
                height: 150,
                lang: 'zh-TW',
                callbacks: {
                    onImageUpload: function(files) {
                        for(let i=0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete : function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                }
            })


            $.upload = function (file) {
                let out = new FormData();
                out.append('file', file, file.name);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_upload_img',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function (img) {
                        $('#summernote').summernote('insertImage', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };

            $.delete = function (file_link) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_img',
                    data: {file_link:file_link},
                    success: function (img) {
                        console.log("delete:",img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
        });
        var btnArr = document.querySelectorAll(".deleteBtn");

        //刪除資料之按鈕
        btnArr.forEach(element => {
            var imgid = element.dataset.imgid;
            var select_form = "#deleteform_" + imgid;
            console.log(select_form);

            element.onclick = function() {
                console.log(select_form);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        console.log(select_form);

                        document.querySelector(select_form).submit();
                    }
                })

            }
        })
    </script>

@endsection
