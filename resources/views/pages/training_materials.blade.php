@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb no-margin">
        <li><a href="/">{{ __('main.menu_home') }}</a></li>
        <li class="active">{{ __('main.menu_student_materials') }}</li>
    </ol>

    <hr>

    <h2 class="text-center">{{ __('main.menu_student_materials') }}</h2>

    <div class="row margin-vertical-l">
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=14">
                <img src="/images/subjects/internet.png" class="subject-picture">
                <h4>{{ __('main.subj_internet') }}</h4>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=40">
                <img src="/images/subjects/algorithms.png" class="subject-picture">
                <h4>{{ __('main.subj_algorithms') }}</h4>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=399">
                <img src="/images/subjects/english.png" class="subject-picture">
                <h4>{{ __('main.subj_english') }}</h4>
            </a>
        </div>
    </div>

    <div class="row margin-vertical-l">
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=339">
                <img src="/images/subjects/web.png" class="subject-picture">
                <h4>{{ __('main.subj_web') }}</h4>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=179">
                <img src="/images/subjects/graphics.png" class="subject-picture">
                <h4>{{ __('main.subj_graphics') }}</h4>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=81">
                <img src="/images/subjects/algorithmization.png" class="subject-picture">
                <h4>{{ __('main.subj_algorithmization') }}</h4>
            </a>
        </div>
    </div>

    <div class="row margin-vertical-l">
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=225">
                <img src="/images/subjects/oop.png" class="subject-picture">
                <h4>{{ __('main.subj_oop') }}</h4>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=259">
                <img src="/images/subjects/db.png" class="subject-picture">
                <h4>{{ __('main.subj_db') }}</h4>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="http://atutor.tk.te.ua/bounce.php?course=107">
                <img src="/images/subjects/computer_science.png" class="subject-picture">
                <h4>{{ __('main.subj_computer_science') }}</h4>
            </a>
        </div>
    </div>
    </div>
</div>
@endsection