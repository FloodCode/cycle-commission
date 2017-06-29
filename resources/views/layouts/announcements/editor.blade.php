@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb no-margin">
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li><a href="/announcements">{{ __('announcements.announcements') }}</a></li>
        <li class="active">{{ __('announcements.' . $mode . '_announcement') }}</li>
    </ol>

    <h2 class="margin-vertical-l">{{ __('announcements.' . $mode . '_announcement') }}</h2>

    @if (count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $postUrl }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="title">{{ __('announcements.title') }}:</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="{{ __('announcements.title') }}"
                value="{{ isset($announcementsItem) ? $announcementsItem->title : '' }}"
                required>
        </div>
        <div class="form-group">
            <label for="message">{{ __('announcements.message') }}:</label>
            <textarea name="message" class="hidden" required>{{ isset($announcementsItem) ? $announcementsItem->message : '' }}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('main.' . $mode) }}</button>
            <a href="{{ $mode === 'edit' ? '/announcements/view/' . $announcementsItem->id : '/announcements' }}" class="btn btn-default">{{ __('main.cancel') }}</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

    <script>
        var locale = '{{ App::getLocale() }}';
        var ckEditorOptions = {
            language: locale === 'ach' ? jipt.target_language : locale
        };

        CKEDITOR.replace('message', ckEditorOptions);
    </script>
@endsection