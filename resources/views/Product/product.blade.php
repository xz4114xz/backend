@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <a href="/admin/Product/create" class ="btn  btn-secondary mb-3 mt-3">新增產品</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>產品名稱</th>
                <th>產品資訊</th>
                <th>圖片</th>
                <th>類別</th>
                <th>價錢</th>
                <th>權重</th>
                <th style="width:180px;">功能</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($product_list as $product)
            <tr>
                <td>{{$product->name}}</td>
                    <td>{{$product->info}}</td>
                    <td>
                        <img width ='200'src={{$product->file}} alt="">
                    </td>
                    <td>{{$product->product_type_id}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sort}}</td>
                    <td>
                        <a href="/admin/Product/edit/{{$product->id}}" class ="btn btn-sm btn-secondary">編輯消息</a>
                        <a href="/admin/Product/destroy{{$product->id}}" class ="btn btn-sm btn-secondary">刪除消息</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
@endsection
