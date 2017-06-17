@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ __('main.403_error_title') }}</h1>
    <hr>
    <p>{{ __('main.403_error_message') }}</p>
    <a href="/">{{ __('main.go_to_home_page') }}</a>
</div>
@endsection