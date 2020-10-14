@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <a href="/admin/ProductType/create" class ="btn  btn-secondary mb-3 mt-3">新增類別</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>產品類別</th>
                <th>產品類別id</th>
                <th>權重</th>
                <th style="width:180px;">功能</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($product_types as $product_type)
            <tr>
                <td>{{$product_type->name}}</td>
                    <td>{{$product_type->id}}</td>
                    <td>{{$product_type->sort}}</td>
                    <td>
                        <a href="/admin/ProductType/{{$product_type->id}}/edit" class ="btn btn-sm btn-secondary">編輯類別</a>
                        {{-- <a href="/admin/ProductType/destroy{{$product_type->id}}" class ="btn btn-sm btn-secondary">刪除類別</a> --}}
                        <div id="deleteBtn_{{$product_type->id}}"  class="deleteBtn btn btn-sm btn-secondary alert-danger" data-ptid = "{{$product_type->id}}">刪除類別
                            <form method="POST" id="deleteform_{{$product_type->id}}" class="deleteform" data-ptid="{{$product_type->id}}" action="/admin/ProductType/{{$product_type->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>

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
            $('#example').dataTable( {
                 "order": [[ 2, 'desc' ]]//2為權重那格
            } );
        } );


        $( "#deleteBtn_1" ).click(function() {
            console.log("click");
        });
        var btnArr = document.querySelectorAll(".deleteBtn");

        btnArr.forEach(element => {
            var ptid = element.dataset.ptid;
            var select_form = "#deleteform_" + ptid;
            console.log( select_form );
            element.onclick = function(){
                // console.log(document.querySelector(select_form));
                document.querySelector(select_form).submit();
                // console.log("click");
            }

            // })

        })
        // console.log(btnArr);
    </script>
@endsection
