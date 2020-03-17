<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Merdekanda bag evleri merdekanda villa merdekanda heyet evleri- @yield('description')">
    <meta name="keywords" content="Emlak elanlari ev alqi satqisi kiraye evler Недвижимость аренда квартир Баку купля продажа. Torpaq sahesi heyet baq evi 1 2 3 otaqli menzil pulsuz Daşınmaz Əmlak Elanları saytı,
    mənzillər, şəxsi evlər,merdekanda kiraye evler,merdekanda evler,merdekanda heyet evleri,merdekanda ev alqi satqisi, torpaq sahələri,villa və.s alqı-satqı və kirayəsi, Сайт бесплатных объявлений недвижимости, купля продажа и аренда, квартиры, дача,
    новостройки,  земельные участки,  в Баку Азербайджане, Ev elanlari, ev elanları, emlak, əmlak, satılır, kirayə, ev, torpaq sahəsi, novostroyka, kirayə verilir, daşınmaz emlak, birja, ev,
     elan, elanlar, merdekanda kiraye ev, evler, villa, mulk, ticaret,  sexsi ev, dasinmaz emlak, pulsuz, satilir, kiraye, verilir, əmlak, evlər, şəxsi, daşınmaz, satılır, kirayə,
    həyət, evi, satdığ, torpaq, sahəsi, ərazi, sahesi, arenda, mənzil, menzil, novastroyka, navastroyka, elanlari, elanları, arenda,  ev alqi satqi, ev bazari, ev satilir, ev satiram, elanlar sayti,
    pulsuz elanlar sayti, Azerbaycanda elan sayti, pulsuz ve qeydiyyatsiz elanlar sayti, baki, elan sayti, недвижимость, объявления, бесплатно, продажа, сайт объявлений, земельные участки в баку, дача, новостройка, аренда квартир,
    купля продажа квартиры, сдам комнату, сдам дачу, офис, офисы, объекты, баку, азербаиджан,
    виллы, kiraye ev, kirayə ev,  kirayə həyət evi,  kiraye heyet evi, kirayə villa, kiraye villa, kiraye bag evi, kirayə bağ evi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="/storage/logo1.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154901726-1"></script>
    <script type="text/javascript">
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-154901726-1');
    </script>
<?php


 $rtname = Route::currentRouteName();
 ?>
@yield('link')

</head>
<style media="screen">



.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  transition: 500ms all;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right !important;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}






  .nava:hover {
    color:#947054 !important;
  }

  .footerabout{
    margin-bottom:20px !important;
  }

  #tel{
    font-size:20px !important;
  }

  @media only screen and (max-width: 760px) {
    #logo{
    margin-top:10px !important;

    }
    #logotext{
      display:none;
    }

  }

  #elanyer {
    font-family:'Sarabun',sans-serif;
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: #3498db;
    color: white;
    cursor: pointer;
    padding: 10px;
    border-radius: 4px;
  }

</style>
<body>

    @if($rtname != 'properties.add')
  <a  href="{{route('properties.add')}}" id="elanyer"  >Elan yerləşdir</a>
    @endif
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a style="font-size:18.5px;color:#f2f4f8;font-family:'Sarabun',sans-serif"  href="{{route('properties.add')}}"> + Elan yerləşdir </a>
                </div>

                <div class="phone-number d-flex">
                    <div class="icon">
                        <img src="/img/icons/phone-call.png" alt="">
                    </div>
                    <div class="number">
                        <a id="tel" href="tel:{{setting('site.telephone')}}">{{setting('site.telephone')}}</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->


                    <a  class="nav-brand" href="/">  <img id="logo" style="height:125px;width:155px;" src="/storage/logo1.png" alt="">     <span id="logotext" >MƏRDƏKAN<span style="color:#3498db !important;" >ƏMLAK</spam></span> </a>


                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div style="font-family: 'Sarabun', sans-serif;" class="classynav">
                            <ul>



                                <li><a class="nava" href="{{url('/')}}">Ana Səhifə</a></li>

                                <li><a class="nava" href="{{route('properties.index')}}">Elanlar</a></li>
                                <li><a class="nava" href="{{url('/blog')}}">Xəbərlər</a></li>
                                <li><a class="nava" href="{{route('properties.about')}}">Haqqımızda</a></li>
                                <li><a class="nava" href="{{url('/services')}}">Hüquqi Yardım</a></li>
                                <li><a class="nava" href="{{url('/contact')}}">Əlaqə</a></li>

                            </ul>

                            <!-- Search Form -->


                            <!-- Search Button -->

                        </div>
                        <!-- Nav End -->
                    </div>

                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
@yield('content')

<!-- ##### Footer Area Start ##### -->
<footer id="footer" class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(/img/bg-img/cta.jpg);">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-4" style="padding-left:13px">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div  class="widget-title footerabout">
                            <h6>Haqqımızda</h6>
                        </div>


                        <p id="footerabout">{!! setting('site.about_footer') !!}</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-4" style="padding-left:13px">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title footerabout">
                            <h6>Əlaqə</h6>
                        </div>
                        <!-- Office Hours -->

                        <!-- Address -->
                        <div class="address">
                            <h6><img src="/img/icons/phone-call.png" alt=""> {{setting('site.telephone')}}</h6>
                            <h6><img src="/img/icons/envelope.png" alt=""> {{setting('site.email')}}</h6>
                            <div class="row">
                            <h6><a style="color:#947054" href="https://m.facebook.com/asanalqisatqi/"><i class="fa fa-facebook fa-2x"></i></a></h6>
                            <h6><a style="color:#947054" href="https://instagram.com/merdekan.emlak?igshid=1ur2cvh6ucq5c"><i class="fa fa-instagram fa-2x"></i></a></h6>
                          </div>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-4" style="padding-left:13px">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title footerabout">
                            <h6>Menyu</h6>
                        </div>
                        <!-- Nav -->
                        <ul class="useful-links-nav d-flex align-items-center">
                          <li><a class="nava" href="{{url('/')}}">Ana Səhifə</a></li>

                          <li><a class="nava" href="{{url('/properties/all')}}">Elanlar</a></li>
                          <!-- <li><a class="nava" href="{{url('/blog')}}">Xəbərlər</a></li> -->
                          <li><a class="nava" href="{{url('/about')}}">Haqqımızda</a></li>

                          <li><a class="nava" href="{{url('/contact')}}">Əlaqə</a></li>
                          <li><a class="nava" href="{{url('/services')}}">Hüquqi Yardım</a></li>

                          <li><a class="nava" href="{{route('properties.add')}}">Elan yerləşdir</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget -->


            </div>
        </div>
    </div>

    <!-- Copywrite Text -->
    <div class="copywrite-text d-flex align-items-center justify-content-center">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made by <a id="myBtn" style="cursor:pointer;color:white;font-family:'Sarabun',sans-serif">Səlim Məmmədov</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </div>



   <!-- Salim Mammadov -->

   <div id="myModal" class="modal">

     <!-- Modal content -->
     <div style="font-size:22px;text-align:center" class="modal-content">
       <span class="close">&times;</span>
       <p><i class="fa fa-email"></i> <b> Salim Mammadov - Contact </b></p>
       <p><i class="fa fa-email"></i> oder.pasha.01@gmail.com</p>
       <p><i class="fa fa-telephone"></i>+994 51 647 94 86</p>

     </div>

   </div>



</footer>
<!-- ##### Footer Area End ##### -->
<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="/js/plugins.js"></script>
<script src="/js/classy-nav.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<!-- Active js -->
<script src="/js/active.js"></script>


@yield('script')

<script>


var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dfdfb7527773e0d832a2d14/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<script>
//Get the button
var mybutton = document.getElementById("elanyer");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}


</script>
<!--End of Tawk.to Script-->
</body>
</html>
