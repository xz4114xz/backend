    @extends('layouts/nav_footer')

    @section('css')
        <link rel="stylesheet" href="./css/news.css">
    @endsection

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
                    <a class="btn btn-success" href="./news_info/{{$news->id}}" role="button">點擊查看更多 &raquo;</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- 用於製造分頁 --}}
        {{ $news_list->links() }}
    @endsection



