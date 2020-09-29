    @extends('layouts/nav_footer')

    @section('content')
        <h2 class="news_title">最新消息</h2>
        <div class="row news_lists">

        @foreach ($news_list as $news)
            <div class="col-md-4">
                <div class="news_list">
                    <h3>{{$news->Title}}</h3>
                    <h4>{{$news->SubTitle}}</h4>
                    <img width="100%" src="{{$news->ImageURL}}" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">{{$news->InnerText}}</p>
                    <a class="btn btn-success" href="./news_info" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div>
        @endforeach
        {{-- <div class="row news_lists">
            <div class="col-md-4">
                <div class="news_list">
                    <h3></h3>
                    <h4>景點名稱</h4>
                    <img width="100%" src="./images/index/news/news_example.JPG" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字...</p>
                    <a class="btn btn-success" href="./news_info" role="button">點擊查看更多 &raquo;</a>

                </div>
            </div>
            <div class="col-md-4">
                <div class="news_list">
                    <h3>東台灣推薦秘境景點</h3>
                    <h4>景點名稱</h4>
                    <img width="100%" src="./images/index/news/news_example.JPG" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字...</p>
                    <a class="btn btn-success" href="./news_info" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news_list">
                    <h3>南台灣推薦秘境景點</h3>
                    <h4>景點名稱</h4>
                    <img width="100%" src="./images/index/news/news_example.JPG" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字一串文字</p>
                <a class="btn btn-success" href="./news_info" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div> --}}
        </div>
    @endsection
        {{-- {{'news_list'}} --}}
        {{-- {{$news_list->Title}} --}}




