@extends('layouts.app')

@section('content')
<div class="container" style="padding-bottom: 10px;">
    <marquee>
        Технічний коледж ТНТУ запрошує на навчання.
        Освітня діяльність з підготовки фахівців відповідно до ліцензій проводиться на рівні кваліфікаційних вимог до бакалавра, молодшого спеціаліста та кваліфікованого робітника.
    </marquee>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default main-last-news">
                <div class="panel-heading">{{ __('main.last_news') }}</div>
                <div class="panel-body">
                    @if (count($newsData))
                        @foreach ($newsData as $newsItem)
                            <div>
                                <h4>{{ $newsItem->title }}</h4>
                                <div class="row">
                                    <div class="col-xs-6" style="margin: 5px 0;">
                                        {{ $newsItem->created_at }}
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <a href="/news/view/{{ $newsItem->id }}" class="btn btn-sm btn-primary">{{ __('main.last_block_more') }}</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="last-block-gradient"></div>
                        @endforeach
                    @else
                        <p class="text-center">{{ __('news.no_news_found') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body no-padding">
                    <div id="photoCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="/images/slider/1.jpg">
                            </div>

                            <div class="item">
                                <img src="/images/slider/2.jpg">
                            </div>

                            <div class="item">
                                <img src="/images/slider/3.jpg">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#photoCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#photoCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('main.commission_history') }}</div>
                <div class="panel-body readable">
                    <p>Інформаційні технології займають одне з провідних місць в навчально-виховному процесі Технічного коледжу ТНТУ ім. І. Пулюя. Початком становлення цього напрямку було створення в 1987 році навчально-обчислювального центру на базі ЕОМ ЄС ИЗОТ. Керував робою цього центру Фірман І.Й. В 1998 році було ліцензовано спеціальність «Обслуговування комп’ютерних та інтелектуальних систем і мереж». З метою забезпечення якісної підготовки молодших спеціалістів даної спеціальності було відокремлено циклову комісію інформатики та обчислювальної техніки, яка до цього часу входила в циклову комісію&nbsp; математики та інформатики. Головою ЦК в період з 1998 до 2001 року була Марціяш Г.Я. Першими членами нової циклової комісії були Марціяш Г.Я., Дячук С.Д., Капаціла І.Б., Цимбалюк Л.В., Фірман І.Й., Юзьків А.В. З 2001 року циклову комісію очолив Фірман І.Й. В 2003 році циклову комісію інформатики та обчислювальної техніки реорганізовано в циклову комісію комп’ютерних дисциплін із призначенням Юзьківа Андрія Васильовича головою комісії.</p>
                    <p>1 вересня 2015 р. у зв’язку із одержанням ліцензії на підготовку молодших спеціалістів за спеціальністю «Обслуговування програмних систем та комплексів», циклову комісію комп’ютерних дисциплін реорганізовано в дві нові:</p>
                    <ul>
                        <li>Циклову комісію програмних систем та комплексів (голова ЦК Марціяш Г.Я.).</li>
                        <li>Циклову комісію комп’ютерних систем і мереж (голова ЦК Юзьків А.В.).</li>
                    </ul>
                    <p>Перший набір в групу підготовки фахівців за спеціальністю 5.05010101 «Обслуговування програмних систем та комплексів» було здійснено у 2013 р.</p>
                    <p>Згідно із наказом Міністерства освіти і науки України від 06 листопада 2015 року № 1151 змінено найменування спеціальності і галузі знань, за якими здійснюється підготовка молодших спеціалістів викладачами даної циклової комісії на наступні:<br> Шифр та найменування галузі знань - 12 Інформаційні технології.<br> Код та найменування спеціальності - 122 Комп’ютерні науки та інформаційні технології.</p>
                    <p>Технічний коледж Тернопільського державного технічного університету створений наказом Міністерства освіти України №218 від 20 червня 1997., відповідно до Указу Президента України від 12 вересня 1996 року №832/95 "Про основні напрямки реформування вищої освіти України" та на виконання Постанови Кабінету Міністрів України від 29 травня 1997 року №526 "Про вдосконалення мережі вищих та професійно-технічних навчальних закладів" на базі Технічного коледжу Тернопільського державного технічного університету з делегуванням йому зі сторони Університету прав фінансово-господарської діяльності в межах, передбачених Статутом Університету і Положенням про Технічний коледж Тернопільського державного технічного університету.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default home-usefull-links">
                <div class="panel-heading">{{ __('main.useful_links') }}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 text-center no-padding">
                            <a href="http://mon.gov.ua/">
                                <img src="/images/banners/mon.jpg" alt="The Ministry of Education and Science of Ukraine">
                            </a>
                        </div>
                        <div class="col-lg-6 text-center no-padding">
                            <a href="http://tntu.edu.ua/">
                                <img src="/images/banners/tntu.jpg" alt="Ternopil National Technical University">
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 text-center no-padding">
                            <a href="http://lib.tk.te.ua/">
                                <img src="/images/banners/library.jpg" alt="Library">
                            </a>
                        </div>
                        <div class="col-lg-6 text-center no-padding">
                            <a href="http://tk.te.ua/">
                                <img src="/images/banners/tk.jpg" alt="Technical College of Ternopil National Technical University">
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 text-center no-padding">
                            <a href="http://tk.te.ua/index.php/books-catalog">
                                <img src="/images/banners/book-catalog.jpg" alt="Book catalog">
                            </a>
                        </div>
                        <div class="col-lg-6 text-center no-padding">
                            <a href="http://atutor.tk.te.ua/">
                                <img src="/images/banners/e-server.jpg" alt="E-education server">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{ __('main.map') }}</div>
                <div class="panel-body no-padding">
                    <iframe style="width: 100%; height: 400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10349.401195487007!2d25.631386848546285!3d49.57228088964029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe42c067aa6eb73cb!2z0KLQtdGF0L3RltGH0L3QuNC5INC60L7Qu9C10LTQtiDQotCd0KLQoyDRltC8LiDQhi4g0J_Rg9C70Y7Rjw!5e0!3m2!1sru!2sua!4v1495798188417" frameborder="0"></iframe>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">{{ __('main.contacts') }}</div>
                <div class="panel-body">
                    <p><span class="glyphicon glyphicon-earphone" style="margin-right: 10px;" aria-hidden="true"></span>28-18-11</p>
                    <p><span class="glyphicon glyphicon-envelope" style="margin-right: 10px;" aria-hidden="true"></span>tktdtu@ukr.net</p>
                    <p><span class="glyphicon glyphicon-home"  style="margin-right: 10px;" aria-hidden="true"></span>м. Тернопіль, вул. Л.Курбаса, 13</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
