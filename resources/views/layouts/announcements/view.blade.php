@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/announcements/edit/{{ $announcementsItem->id }}" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    {{ __('main.edit') }}
                </a>
                <form method="post" action="/announcements/delete" class="display-inline-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $announcementsItem->id }}">
                    <button type="submit" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        {{ __('main.delete') }}
                    </button>
                </form>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li><a href="/announcements">{{ __('announcements.announcements') }}</a></li>
        <li class="active">{{ $announcementsItem->title }}</li>
    </ol>
    <div class="readable">
        <h3>{{ $announcementsItem->title }}</h3>
        {!! $announcementsItem->message !!}
        @include('layouts.announcements.item-info')
    </div>
</div>
@endsection
