<p class="news-item-info">
    <span>{{ __('news.created') }}: </span><span class="muted">{{ $newsItem->created_at }}</span>
    <span class="horizontal-delimiter"></span>
    <span>{{ __('news.views') }}: </span><span class="muted">{{ $newsItem->views }}</span>
    <span class="horizontal-delimiter"></span>
    <span>{{ __('news.author') }}: </span><span class="muted">{{ $newsItem->user->name }}</span>
</p>