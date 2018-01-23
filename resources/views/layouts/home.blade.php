<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.home.head')
</head>

<body>

<!-- Modal -->
@include('includes.home.header')

<div class="banner">
    @include('includes.home.banner')
</div>


<div class="container wow fadeIn">
  <div class="hm-property-carousel">
    <h2><span>Recommended properties in Oman</span></h2>
    <div id="carousel-property" class="owl-carousel owl-theme">
      
            @yield('content')
     
        
    </div>
  </div>
  <div class="article-cover">
    <img src="{{ asset('style/images/img-article.jpg') }}" alt="Image">
  </div>
</div>
<footer class="footer-sec">
   @include('includes.home.footer')
    
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ asset('style/js/jquery.min.js') }}"></script> 
<script src="{{ asset('style/js/bootstrap.min.js') }}"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="{{ asset('style/js/ie10-viewport-bug-workaround.js') }}"></script> 
<script src="{{ asset('style/js/owl.carousel.js') }}" type="text/javascript"></script> 
<script src="{{ asset('style/js/bootstrap-select.js') }}"></script> 
<script src="{{ asset('style/js/wow.js') }}"></script> 
<script src="{{ asset('style/js/main.js') }}"></script> 
<script>
      new WOW().init();
    </script>
</body>
</html>
