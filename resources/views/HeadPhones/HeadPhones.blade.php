@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <table id="HeadPHone" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>耳機型號</th>
                <th>耳機品牌</th>
                <th>種類</th>
                <th>照片</th>
                <th>產品內文</th>
                <th style="width:180px;">功能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($HeadPhones_list as $HeadPhone)
                <tr>
                    <td>{{$HeadPhone->Model}}</td>
                    <td>{{$HeadPhone->Brand}}</td>
                    <td>{{$HeadPhone->Type}}</td>
                    <td>{{$HeadPhone->InnerText}}</td>
                    <td>
                        <img width ='200'src={{$HeadPhone->ImagePath}} alt="HeadPhone">
                    </td>
                    <td>
                        <a href="/admin/HeadPhone/edit/{{$HeadPhone->id}}" class ="btn btn-sm btn-secondary">編輯消息</a>
                        <a href="/admin/HeadPhone/destroy{{$HeadPhone->id}}" class ="btn btn-sm btn-secondary">刪除消息</a>

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
        $('#HeadPHone').DataTable();
    } );
    </script>
@endsection
