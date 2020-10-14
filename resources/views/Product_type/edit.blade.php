@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="/admin/ProductType/{{$product_type->id}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        {{-- <div>{{$product_type}}</div> --}}
        <div class="form-group">
            <label for="name">類別名稱</label>
            <input type="text" class="form-control" id="name" name ="name" value ={{$product_type->name}} ></div>

        <div class="form-group">
            <label for="info">排序</label>
        <input type="number" class="form-control" min = "0" setp = "1" id="sort" name ="sort" value = "{{$product_type->sort}}" >
        </div>

        <button type="submit" class="btn btn-primary">送出審查</button>

    </form>

</div>


@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
@endsection
