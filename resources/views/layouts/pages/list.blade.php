@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        @if (Auth::check() && Auth::user()->isAdmin())
            <span class="float-right">
                <a href="/pages/add" class="btn btn-primary btn-xs">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    {{ __('main.add') }}
                </a>
            </span>
        @endif
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li class="active">{{ __('pages.pages_list') }}</li>
    </ol>

    @if (count($pagesData))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 60%;">{{ __('pages.title') }}</th>
                    <th style="width: 25%;">{{ __('pages.url') }}</th>
                    <th style="width: 15%; min-width: 100px;">{{ __('pages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagesData as $pageItem)
                    <tr>
                        <td>{{ $pageItem->title }}</td>
                        <td>{{ $pageItem->name }}</td>
                        <td class="text-right">
                            <a href="/pages/view/{{ $pageItem->name }}" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </a>
                            <a href="/pages/edit/{{ $pageItem->name }}" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            <form method="post" action="/pages/delete" class="display-inline-block">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="name" value="{{ $pageItem->name }}">
                                <button type="submit" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $pagesData->links() }}
        </div>
    @else
        <h3 class="text-center">{{ __('pages.no_pages_found') }}</h3>
    @endif
</div>
@endsection