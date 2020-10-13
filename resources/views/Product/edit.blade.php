@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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
                    <option value="{{$product_type->product_id}}">{{$product_type->name}}</option>
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

        <div class="form-group">
            <label for="info">內文</label>
            <textarea  id ="" type="text" class="form-control" id="info" value ="{{$products->info}}" name = "info">{{$products->info}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">送出審查</button>

    </form>

</div>


@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
@endsection
