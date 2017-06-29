@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/news/edit/{{ $newsItem->id }}" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    {{ __('main.edit') }}
                </a>
                <form method="post" action="/news/delete" class="display-inline-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $newsItem->id }}">
                    <button type="submit" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        {{ __('main.delete') }}
                    </button>
                </form>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li><a href="/news">{{ __('main.menu_news') }}</a></li>
        <li class="active">{{ $newsItem->title }}</li>
    </ol>
    <div class="readable">
        <div class="clearfix">
            <a href="/img/news/{{ $newsItem->picture }}">
                <img src="/img/news/{{ $newsItem->picture }}" alt="{{ $newsItem->title }}" class="news-picture">
            </a>
            <h3 class="no-margin-top">{{ $newsItem->title }}</h3>
            {!! $newsItem->message !!}
        </div>
        <div class="row">
            <div class="col-md-6 item-info-full">
                @include('layouts.news.item-info')
            </div>
            <div class="col-md-6 text-right">
                <div class="addthis_inline_share_toolbox"></div>
            </div>
        </div>
    </div>
    <div id="disqus_thread"></div>
</div>
@endsection

@section('styles')
    @parent
    <link href="{{ asset('css/modules/news.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    @parent
    <script id="dsq-count-scr" src="//cycle-commission.disqus.com/count.js" async></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5953c66bd3b59cb0"></script>
    <script>
        (function() {
        var d = document, s = d.createElement('script');
        s.src = 'https://cycle-commission.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
@endsection