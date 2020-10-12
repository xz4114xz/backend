@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
  <form method="POST" action="/admin/Prouduct/HeadPhones" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="Model">耳機型號</label>
          <input type="text" class="form-control" id="Model" name ="Model"  >
      </div>
      <div class="form-group">
          <label for="Brand">耳機品牌</label>
          <input type="text" class="form-control" id="Brand" name ="Brand"  >
      </div>
      <label for="Type">種類</label>
              <select multiple class="form-control" id="Type" name="Type">
                <option>耳罩</option>
                <option>耳道</option>
                <option>耳塞</option>
                <option>客製化</option>
              </select>
            </div>
      <div class="form-group">
        <div class="form-group">
          <label for="ImagePath">上傳照片</label>
          <input type="file" class="form-control-file" id="ImagePath"name = "ImagePath">
        </div>
        <div class="form-group">
          <label for="InnerText">產品內文</label>
          <input type="text" class="form-control" id="InnerText" name = "InnerText">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">送出更改</button>
  </form>
  </div>    
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
@endsection
