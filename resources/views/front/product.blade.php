    @extends('layouts/nav_footer')

    @section('css')
        <link rel="stylesheet" href="./css/news.css">
    @endsection

    @section('content')
        <h2 class="news_title">產品訊息</h2>
        <div class="row news_lists">
            @foreach ($product_types as $product_type)
                <div class="col-md-4">
                    <div class="">
                    <div>
                        <h3>{{$product_type->name}}</h3>
                        <div>
                            @foreach ($product_type->product as $item)
                            <div>
                                <h4>{{$item->name}}</h4>
                                <img width="100%" src="{{$item->file}}" alt="圖片建議尺寸: 1000 x 567">
                                <p class="news_content">{{$item->info}}</p>

                            </div>
                            <a class="btn btn-success" href="/product_info/{{$item->id}}" role="button">點擊查看更多 &raquo;</a>
                            <br>
                            @endforeach

                        </div>
                    </div>
                    <br>
                    <hr>





                    </div>
                </div>
            @endforeach
        </div>
        {{-- 用於製造分頁 --}}
        {{-- {{ $news_list->links() }} --}}
    @endsection



