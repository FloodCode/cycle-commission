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
                <div class="panel-heading">{{ __('main.college_history') }}</div>
                <div class="panel-body">
                    <p>Технічний коледж відкрито за погодженням з Кабінетом Міністрів України згідно з наказом Міністерства освіти за №436 від 07.12.1993 р. на базі Тернопільського технікуму радіоелектронного приладобудування та Тернопільського професійно-технічного училища №9.</p>
                    <p>Технічний коледж Тернопільського державного технічного університету створений наказом Міністерства освіти України №218 від 20 червня 1997., відповідно до Указу Президента України від 12 вересня 1996 року №832/95 "Про основні напрямки реформування вищої освіти України" та на виконання Постанови Кабінету Міністрів України від 29 травня 1997 року №526 "Про вдосконалення мережі вищих та професійно-технічних навчальних закладів" на базі Технічного коледжу Тернопільського державного технічного університету з делегуванням йому зі сторони Університету прав фінансово-господарської діяльності в межах, передбачених Статутом Університету і Положенням про Технічний коледж Тернопільського державного технічного університету.</p>
                    <p>Технічний коледж Тернопільського державного технічного університету (надалі Коледж) є структурним підрозділом Тернопільського державного технічного університету імені Івана Пулюя, (надалі Університет), що здійснює підготовку фахівців з технічного, економічного, гуманітарного напрямків за спорідненими до Університетських спеціальностями, професійно-освітніми програмами, проводить культурно-просвітницьку діяльність серед населення, має високий рівень кадрового та матеріально-технічного забезпечення такої діяльності.</p>
                    <p>Коледж засновано на державній формі власності і на даний час підпорядковано Міністерству освіти України.</p>
                    <p>Освітня діяльність з підготовки фахівців відповідно до ліцензій проводиться на рівні кваліфікаційних вимог до бакалавра, молодшого спеціаліста та кваліфікованого робітника.</p>
                    <p>Формування контингенту студентів коледжу проводиться у відповідності до планів прийому, які щорічно встановлються Міністерством освіти України.</p>
                    <p>З 1994 р. коледж розпочав прийом студентів на контрактній основі. З 1997 по 1999 рік кількість заяв на одне планове місце на денну форму навчання змінювалась відповідно: 1,81; 2,16; 2,49, що вказує на тенденцію збільшення.</p>
                    <p>Навчання з усіх спеціальностей ведеться з 1996 року згідно з типовими освітньо-професійними програмами підготовки молодших спеціалістів, на основі яких підготовлені робочі навчальні плани, які затверджені проректором з навчальної роботи ТДТУ ім. І. Пулюя, погоджені з інститутом змісту і методів навчання та Головним управлінням вищої освіти Міносвіти України.</p>
                    <p>До навчальних планів внесені зміни згідно з Інструктивним листом Міністерства освіти України за №1/9-64 від 19.05.93 р. "Про викладання соціально-гуманітарних дисциплін", №1-5/748 від 20.07.1993 р. "Про внесення змін та доповнень до Інструктивного листа Міністерства освіти", №872 від 29.07.97 р. "Про перелік діючих програм дисциплін загальноосвітнього циклу", №1/11-687 від 19.04.96 р. "Про організацію занять з фізичного виховання", №842 від 22.07.97 р. "Про термін і послідовність вивчення гуманітарних і соціально-економічних дисциплін".</p>
                    <p>Навчальні робочі плани відповідають вимогам освітньо-професійних програм, змісту підготовки спеціалістів та потребам регіону. До них щорічно вносяться зміни та доповнення з урахуванням вимог виробництва, змін технології.</p>
                    <p>Більшість програм дисциплін розроблено викладачами коледжу. Програми розглянуті на засіданнях циклових комісій.</p>
                    <p>Організаційно-методичне забезпечення навчально-виховного процесу базується на законах "Про освіту", "Про мови" та регламентується директивно-нормативними документами Міністерства освіти і науки України: (накази №161 від 02.06.93 р. "Про затвердження Положення про організацію навчального процесу у вищих навчальних закладах", №93 від 08.04.93 р. "Про затвердження Положення про проведення практики студентів вищих навчальних закладів України" та інші).</p>
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
