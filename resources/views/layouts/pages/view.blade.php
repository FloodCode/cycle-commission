@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb no-margin">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/pages/edit/{{ $pageItem->name }}" class="btn btn-primary btn-xs">{{ __('main.edit') }}</a>
                <form method="post" action="/pages/delete" class="display-inline-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="name" value="{{ $pageItem->name }}">
                    <button type="submit" class="btn btn-danger btn-xs">{{ __('main.delete') }}</button>
                </form>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li class="active">{{ $pageItem->title }}</li>
    </ol>

    <hr>

    {!! $pageItem->content !!}
</div>
@endsection