@extends('layouts/app')

@section('CSS')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/admin/ProductType" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">類別名稱</label>
            <input type="text" class="form-control" id="name" name ="name"  >
        </div>

        <div class="form-group">
            <label for="info">排序</label>
            <input type="number" class="form-control" min = "0" setp = "1" id="sort" name ="sort" value = "0" >
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
