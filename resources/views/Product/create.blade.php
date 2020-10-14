@extends('layouts/app')

@section('CSS')
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
            <input type="number" class="form-control" id="sort" name ="sort"  >
        </div>

        <div class="form-group">
            <label for="file">上傳照片</label>
            <input type="file" class="form-control-file" id="file"name = "file">
        </div>
        <div class="form-group">
            <label for="info">內文</label>
            <textarea  id ="summernote" type="text" class="form-control" id="info" name = "info"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">送出審查</button>

    </form>

</div>


@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection
