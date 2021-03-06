@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/news/add" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    {{ __('main.add') }}
                </a>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li class="active">{{ __('main.menu_news') }}</li>
    </ol>

    @if (count($newsData))
        <hr>

        @foreach ($newsData as $newsItem)
            <div class="readable">
                @include('layouts.news.description')
            </div>
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