@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="container">
  <form method="POST" action="store" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="Title">標題</label>
          <input type="text" class="form-control" id="Title" name ="Title"  >
      </div>
      <div class="form-group">
          <label for="SubTitle">副標題</label>
          <input type="text" class="form-control" id="SubTitle" name ="SubTitle"  >
      </div>
      <div class="form-group">
        <div class="form-group">
          <label for="Img">上傳照片</label>
          <input type="file" class="form-control-file" id="Img"name = "ImageURL">
        </div>
        <div class="form-group">
          <label for="InnerText">內文</label>
          <input type="text" class="form-control" id="InnerText" name = "InnerText">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">送出審查</button>
  </form>
    
</div>


@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
@endsection
