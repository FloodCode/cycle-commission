@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/news/edit/{{ $newsItem->id }}" class="btn btn-primary btn-xs">{{ __('main.edit') }}</a>
                <form method="post" action="/news/delete" class="display-inline-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $newsItem->id }}">
                    <button type="submit" class="btn btn-danger btn-xs">{{ __('main.delete') }}</button>
                </form>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li><a href="/news">{{ __('main.menu_news') }}</a></li>
        <li class="active">{{ $newsItem->title }}</li>
    </ol>
    <h3>{{ $newsItem->title }}</h3>
    <div>{!! $newsItem->message !!}</div>
    @include('layouts.news.news-item-info')
</div>
@endsection

@section('styles')
    @parent
    <link href="{{ asset('css/modules/news.css') }}" rel="stylesheet">
@endsection