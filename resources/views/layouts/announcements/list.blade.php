@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/announcements/add" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    {{ __('main.add') }}
                </a>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li class="active">{{ __('announcements.announcements') }}</li>
    </ol>

    @if (count($announcementsData))
        <hr>

        @foreach ($announcementsData as $announcementsItem)
            <div class="readable">
                @include('layouts.announcements.description')
            </div>
        @endforeach

        <div class="text-center">
            {{ $announcementsData->links() }}
        </div>
    @else
        <h3 class="text-center">{{ __('announcements.no_announcements_found') }}</h3>
    @endif
</div>
@endsection
