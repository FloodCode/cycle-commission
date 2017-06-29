<div class="clearfix">
    <a href="/news/view/{{ $newsItem->id }}">
        <img src="/img/news/{{ $newsItem->picture }}" alt="{{ $newsItem->title }}" class="news-picture">
        <h3 class="no-margin-top">{{ $newsItem->title }}</h3>
    </a>
    {!! $newsItem->short_message !!}
</div>
@include('layouts.news.item-info')
<hr class="no-margin-top">