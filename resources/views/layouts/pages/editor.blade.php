@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb no-margin">
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li><a href="/pages/list">{{ __('pages.pages_list') }}</a></li>
        <li class="active">{{ __('pages.' . $mode . '_page') }}</li>
    </ol>

    <h2 class="margin-vertical-l">{{ __('pages.' . $mode . '_page') }}</h2>

    @if (count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $postUrl }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="title">{{ __('pages.page_name') }}:</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="{{ __('pages.page_name') }}"
                value="{{ isset($pageItem) ? $pageItem->title : '' }}"
                required>
        </div>
        <div class="form-group">
            <label for="name">{{ __('pages.page_url') }}:</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="{{ __('pages.page_url') }}"
                value="{{ isset($pageItem) ? $pageItem->name : '' }}"
                required>
        </div>
        <div class="form-group">
            <label for="content">{{ __('pages.page_content') }}:</label>
            <textarea name="content" class="hidden" required>{{ isset($pageItem) ? $pageItem->content : '' }}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('main.' . $mode) }}</button>
            <a href="{{ $mode === 'edit' ? '/pages/view/' . $pageItem->name : '/pages/list' }}" class="btn btn-default">{{ __('main.cancel') }}</a>
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

        CKEDITOR.replace('content', ckEditorOptions);
    </script>
@endsection