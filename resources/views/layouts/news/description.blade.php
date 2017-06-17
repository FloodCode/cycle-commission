<a href="/news/view/{{ $newsItem->id }}"><h3>{{ $newsItem->title }}</h3></a>
<div>{!! $newsItem->short_message !!}</div>
@include('layouts.news.news-item-info')
<hr class="no-margin-top">