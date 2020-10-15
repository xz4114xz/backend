@extends('layouts/app')

@section('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">產品名稱</label>
            <input type="text" class="form-control" id="name" name ="name"  >
        </div>

        <div class="form-group">
            <label for="info">產品價錢</label>
            <input type="number" class="form-control" id="price" name ="price"  >
        </div>

        <div class="form-group ">

            <label for="product_type_id">產品類型</label>
            <select class ="form-control  " name="product_type_id" id="product_type_id">
                @foreach ($product_types as $product_type)
                    <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                @endforeach
            </select>

        <div class="form-group mt-3">
            <label for="info">排序</label>
            <input type="number" class="form-control" id="sort" name ="sort" required >
        </div>

        <div class="form-group">
            <label for="file">上傳照片</label>
            <input type="file" class="form-control-file" id="file"name = "file" required>
        </div>

        <div class="form-group">hphp
            <label for="multiple_images">內頁多張照片</label>
            <input type="file" class="form-control-file" id="multiple_images"name = "multiple_images[]" multiple>
        </div>

        <<div class="form-group">
            <label for="info">內文</label>
            <textarea  id ="summernote" type="text" class="form-control" id="info" value ="" name = "info"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">送出審查</button>

    </form>

</div>


@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-zh-TW.min.js" ></script>


    <script>
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
    </script>

@endsection
