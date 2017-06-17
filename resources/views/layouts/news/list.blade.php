@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/news/add" class="btn btn-primary btn-xs">{{ __('news.add') }}</a>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li class="active">{{ __('main.menu_news') }}</li>
    </ol>

    @if (count($newsData))
        <hr>

        @foreach ($newsData as $newsItem)
            @include('layouts.news.description')
        @endforeach

        <div class="text-center">
            {{ $newsData->links() }}
        </div>
    @else
        <h3 class="text-center">{{ __('news.no_news_found') }}</h3>
    @endif
</div>
@endsection

@section('styles')
    @parent
    <link href="{{ asset('css/modules/news.css') }}" rel="stylesheet">
@endsection