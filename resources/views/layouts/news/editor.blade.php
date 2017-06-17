@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb no-margin">
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li><a href="/news">{{ __('main.menu_news') }}</a></li>
        <li class="active">{{ __('news.' . $mode . '_news') }}</li>
    </ol>

    <h2 class="margin-vertical-l">{{ __('news.' . $mode . '_news') }}</h2>

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
            <label for="title">{{ __('news.article_name') }}:</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="{{ __('news.article_name') }}"
                value="{{ isset($newsItem) ? $newsItem->title : '' }}"
                required>
        </div>
        <div class="form-group">
            <label for="short_message">{{ __('news.short_article_description') }}:</label>
            <textarea name="short_message" class="hidden" required>{{ isset($newsItem) ? $newsItem->short_message : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="message">{{ __('news.full_article_text') }}:</label>
            <textarea name="message" class="hidden" required>{{ isset($newsItem) ? $newsItem->message : '' }}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">{{ __('news.' . $mode . '_news') }}</button>
            <a href="{{ $mode === 'edit' ? '/news/view/' . $newsItem->id : '/news' }}" class="btn btn-default">{{ __('main.cancel') }}</a>
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

        CKEDITOR.replace('short_message', ckEditorOptions);
        CKEDITOR.replace('message', ckEditorOptions);
    </script>
@endsection