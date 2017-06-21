<div id="newsCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <div class="item active">
        <img src="/images/1.jpg" alt="{{ __('main.app_name') }}">
        <div class="carousel-caption">
            <h4><a href="#">Lorem ipsum dolor sit amet consetetur sadipscing</a></h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        </div>
    </div><!-- End Item -->

     <div class="item">
        <img src="/images/2.jpg" alt="{{ __('main.app_name') }}">
        <div class="carousel-caption">
            <h4><a href="#">consetetur sadipscing elitr, sed diam nonumy eirmod</a></h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        </div>
    </div><!-- End Item -->

    <div class="item">
        <img src="/images/3.jpg" alt="{{ __('main.app_name') }}">
            <div class="carousel-caption">
             <h4><a href="#">tempor invidunt ut labore et dolore</a></h4>
             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        </div>
    </div><!-- End Item -->

    <div class="item">
        <img src="/images/4.jpg" alt="{{ __('main.app_name') }}">
            <div class="carousel-caption">
             <h4><a href="#">magna aliquyam erat, sed diam voluptua</a></h4>
             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        </div>
    </div><!-- End Item -->

    <div class="item">
        <img src="/images/5.jpg" alt="{{ __('main.app_name') }}">
            <div class="carousel-caption">
             <h4><a href="#">tempor invidunt ut labore et dolore magna aliquyam erat</a></h4>
             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
        </div>
    </div><!-- End Item -->

  </div><!-- End Carousel Inner -->


<ul class="list-group no-padding no-margin">
  <li data-target="#newsCarousel" data-slide-to="0" class="list-group-item active"><h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4></li>
  <li data-target="#newsCarousel" data-slide-to="1" class="list-group-item"><h4>consetetur sadipscing elitr, sed diam nonumy eirmod</h4></li>
  <li data-target="#newsCarousel" data-slide-to="2" class="list-group-item"><h4>tempor invidunt ut labore et dolore</h4></li>
  <li data-target="#newsCarousel" data-slide-to="3" class="list-group-item"><h4>magna aliquyam erat, sed diam voluptua</h4></li>
  <li data-target="#newsCarousel" data-slide-to="4" class="list-group-item"><h4>tempor invidunt ut labore et dolore magna aliquyam erat</h4></li>
</ul>

  <!-- Controls -->
  <div class="carousel-controls">
      <a class="left carousel-control" href="#newsCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#newsCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
  </div>

</div><!-- End Carousel -->

@section('styles')
    @parent
    <link href="{{ asset('css/modules/news-carousel.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/modules/news-carousel.js') }}"></script>
@endsection