@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/admin/Product/edit/update/{{$products->id}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">產品名稱</label>
            <input type="text" class="form-control" id="name" value ={{$products->name}} name ="name"  >
        </div>

        <div class="form-group">
            <label for="info">產品價錢</label>
            <input type="number" class="form-control" id="price" value ={{$products->price}} name ="price"  >
        </div>

        <div class="form-group">

            <label for="product_type_id">產品類型</label>
            <select class ="form-control " name="product_type_id" id="product_type_id">
                @foreach ($product_types as $product_type)
                    <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                @endforeach
            </select>

            {{-- <input type="number" class="form-control mt-3" id="product_type_id" value ={{$products->product_type_id}} name ="product_type_id"  > --}}
        </div>

        <div class="form-group">
            <label for="info">排序</label>
            <input type="number" class="form-control" id="sort" value ={{$products->sort}} name ="sort"  >
        </div>

        <div class="form-group">
            <label for="file">上傳照片</label>
            <img width=200 src={{$products->file}} alt="">
            <input type="file" class="form-control-file" id="file" value ={{$products->file}} name = "file">
        </div>
        {{-- <div>{{$product_imgs}}</div> --}}
        <div class="form-group">hphp
            <label for="multiple_images">內頁多張照片</label>
            <input type="file" class="form-control-file" id="multiple_images"name = "multiple_images[]" multiple>
        </div>

        <div>
            @foreach ($product_imgs as $product_img)
                <img width="200" src={{$product_img->product_image}} alt="">
            @endforeach
        </div>

        <div class="form-group">
            <label for="info">內文</label>
            <textarea  id ="summernote" type="text" class="form-control" id="info" value ="{{$products->info}}" name = "info">{{$products->info}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">送出審查</button>

    </form>

</div>


@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
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
