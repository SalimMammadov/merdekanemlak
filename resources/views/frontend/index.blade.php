@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ  Merdekanda bag evleri,Merdekanda evlerin alqi satqisi, merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekanda evlerin alqi satqisi.Mərdəkan Əmlak şirkəti 2009-cu ildən Mərdəkan, Şüvəlan və Şağan qəsəbələrinin əmlak bazarında fəaliyyətə başlayıb.Məqsədimiz müştərilərimizin əmlak istəklərinə və kriteriyalarına uyğun müxtəlif əmlaklar təqdim edərək həmin daşınmaz əmlakların alqı-satqısını kollektivimizlə peşəkar səviyyədə təşkil etməkdir.
@endsection
@section('content')


<?php use App\Region;
use App\EmlakType;
$emlaktypes=EmlakType::all();
 $regions=Region::all();
 ?>

<style media="screen">
  .hero-slides-content h2 {
    text-transform: none;
  }

  <style type="text/css">
  .mobileHide { display: inline; }

  /* Smartphone Portrait and Landscape */
  @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 480px){
     .mobileHide { display: none;}
  }
</style>

  .call-to-action-area .cta-content h2 {
    text-transform: none;

  }
</style>

 @component('frontend.style')
 @endcomponent


 <style>
     .banner {
         position: absolute;
         width: 120px;
         height: 300px;
         background: url(ads.gif);
         top: 20px;
     }

     #banner_l { left: 5px; }

     #banner_r { right: 5px; }

     .zindex { z-index: -999; }
 </style>







<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        @foreach($sliders as $slider)
        <?php
          $url= str_replace('\\', '/', $slider->image_url); ?>

        <div class="single-hero-slide bg-img" style="background-image: url(/storage/{{$url}});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 style="font-family:'Sarabun',sans-serif" data-animation="fadeInUp" data-delay="100ms">{{$slider->title}} </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Single Hero Slide -->

        <!-- Single Hero Slide -->

    </div>
</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Advance Search Area Start ##### -->

@component('frontend.filter')
@endcomponent
<!-- ##### Advance Search Area End ##### -->

<!-- ##### Featured Properties Area Start ##### -->





<section class="featured-properties-area section-padding-100-50">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2 style="font-family: 'Sarabun', sans-serif;">VİP elanlar  </h2>

                </div>

                @if(empty($vipitems))
                    <div class="alert alert-secondary"><strong>Vip elan yoxdur...</strong></div>
                @endif

            </div>
        </div>


        <div class="row">

            <!-- Single Featured Property -->
            @foreach($vipitems as $vipitem)


            @if(!isset($vipitems))
            <div class="col-12">
                <div class="alert alert-light">
                    <strong>Vip elan yoxdur...</strong>
                </div>
            </div>
            @endif


            <div class="col-6 col-md-6 col-xl-3" style="padding-left:5px;padding-right:5px;">

              <?php if(isset($vipitem->region) && isset($vipitem->renttype) && isset($vipitem->emlaktype)) $vipslug = str_slug($vipitem->region->name.'da-'.$vipitem->emlaktype->name.'-'.$vipitem->renttype->name); else $vipslug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

              <a href="{{route('properties.single',[$vipitem->id,$vipslug])}}" target="_blank">

                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">

                      @if(isset($vipitem->main_image))
                           <?php $img=str_replace(".","-cropped.", $vipitem->main_image) ?>
                             <img title="@if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif" id="elanimg" height="500" width="500" src="/storage/{{$img}}" alt="@if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif">
                             @else
                             <img title="@if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif" id="elanimg" height="500" width="500" src="/storage/default.jpg" alt="@if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif">
                             @endif



                          <div class="tag">
                            @if(isset($vipitem->renttype))
                            <span>{{$vipitem->renttype->name}} <i  class="fa fa-diamond fa-2x "></i></span>
                            @endif
                        </div>

                        <div class="list-price">
                            <p>{{$vipitem->price}} AZN</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div  style="padding:15px;font-family:'Sarabun',sans-serif" >
                      @if(isset($vipitem->region))
                        <h5  style="font-family: 'Sarabun', sans-serif;"><img src="img/icons/location.png" alt=""><span class="ml-2">{{$vipitem->region->name}}
                          <br>

                        </span></h5>
                        @endif


                        <!--<p>
                         {{Str::limit($vipitem->description,117,'...')}}
                        </p> -->
                        <div  class="property-meta-data  align-items-end justify-content-between">

                            <div  style="font-size:14px !important">
                              <ul style="display:flex">
                          @if(isset($vipitem->floor_count))
                            <!-- <div class="new-tag">
                              <span style="color:#7d7d7d"><b> Mertebe sayı : <span style="color:#947054">{{$vipitem->floor_count}}</b></span></span>
                            </div> -->

                            @endif

                            @if(isset($vipitem->room_count))

                            <!-- <div class="bathroom">
                                <span style="color:#7d7d7d"><b> Otaq sayı : <span style="color:#947054">{{$vipitem->room_count}}</b></span></span>
                            </div> -->
                            <li> <span style="color:#947054">{{$vipitem->room_count}} otaqlı <i class="fa fa-angle-right"></i>  </b></span></li>
                            @endif

                            @if(isset($vipitem->ground_size))
                            <!-- <div class="garage">

                                <span style="color:#7d7d7d"><b>Torpaq : <span style="color:#947054">{{$vipitem->ground_size}} sot</b></span></span>
                            </div> -->
                            <li class="ml-1"> <span style="color:#947054">{{$vipitem->ground_size}} sot </b></span> </li>
                            @endif

                            @if(isset($vipitem->area_size))
                            <!-- <div class="space">
                                <span style="color:#7d7d7d"><b>Ev : <span style="color:#947054">{{$vipitem->area_size}} m<sup>2</sup></b></span></span>
                            </div> -->
                            @endif
                          </ul>
                          </div>
                        </div>
                        @if(isset($vipitem->emlaktype))
                        <p style="font-size:15px;color:#947054;margin-bottom:0px" >{{$vipitem->emlaktype->name}}</p>
                        @endif
                        <span style="color:#7d7d7d;font-size:12px">
                            <?php $zaman=$vipitem->created_at;$zaman->setLocale('az'); echo $zaman->diffForHumans().'  ';  ?>
                         {{$vipitem->created_at->format('d.m.Y')}}
                     </span>
                    </div>
                </div>
              </a>



            </div>
            @endforeach

        </div>
    </div>
</section>





<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div style="margin-bottom:50px !important" class="section-heading wow fadeInUp">
                    <h2 style="font-family: 'Sarabun', sans-serif;">Son elanlar</h2>
                    <p style="color:#7d7d7d;font-size:13px">Bütün elanlara baxmaq üçün - <a style="text-decoration:none;font-weight:bold" href="{{route('properties.index')}}">Keçid </a> </p>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Featured Property -->
            @foreach($items as $item)


            <div class="col-6 col-md-6 col-xl-3" style="padding-left:5px;padding-right:5px;">


              <?php if(isset($item->region) && isset($item->renttype) && isset($item->emlaktype)) $slug = str_slug($item->region->name.'da-'.$item->emlaktype->name.'-'.$item->renttype->name); else $slug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

              <a href="{{route('properties.single',['id'=> $item->id , 'slug'=> $slug])}}" target="_blank">

                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">

                      @if(isset($item->main_image))
                           <?php $img=str_replace(".","-cropped.", $item->main_image) ?>
                             <img title="@if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif" id="elanimg" height="500" width="500" src="/storage/{{$img}}" alt="@if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif">
                             @else
                             <img title="@if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif" id="elanimg" height="500" width="500" src="/storage/default.jpg" alt="@if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif">
                             @endif




                          <div class="tag">
                            @if(isset($item->renttype))
                            <span>{{$item->renttype->name}} </span>
                            @endif
                        </div>

                        <div class="list-price">
                            <p>{{$item->price}} AZN</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div  style="padding:15px;font-family:'Sarabun',sans-serif" >
                      @if(isset($item->region))
                        <h5  style="font-family: 'Sarabun', sans-serif;"><img src="img/icons/location.png" alt=""><span class="ml-2">{{$item->region->name}}
                          <br>

                        </span></h5>
                        @endif


                        <!--<p>
                         {{Str::limit($item->description,117,'...')}}
                        </p> -->
                        <div  class="property-meta-data  align-items-end justify-content-between">

                            <div  style="font-size:14px !important">
                              <ul style="display:flex">
                          @if(isset($item->floor_count))
                            <!-- <div class="new-tag">
                              <span style="color:#7d7d7d"><b> Mertebe sayı : <span style="color:#947054">{{$item->floor_count}}</b></span></span>
                            </div> -->

                            @endif

                            @if(isset($item->room_count))

                            <!-- <div class="bathroom">
                                <span style="color:#7d7d7d"><b> Otaq sayı : <span style="color:#947054">{{$item->room_count}}</b></span></span>
                            </div> -->
                            <li> <span style="color:#947054">{{$item->room_count}} otaqlı <i class="fa fa-angle-right"></i>  </b></span></li>
                            @endif

                            @if(isset($item->ground_size))
                            <!-- <div class="garage">

                                <span style="color:#7d7d7d"><b>Torpaq : <span style="color:#947054">{{$item->ground_size}} sot</b></span></span>
                            </div> -->
                            <li class="ml-1"> <span style="color:#947054">{{$item->ground_size}} sot </b></span> </li>
                            @endif

                            @if(isset($item->area_size))
                            <!-- <div class="space">
                                <span style="color:#7d7d7d"><b>Ev : <span style="color:#947054">{{$item->area_size}} m<sup>2</sup></b></span></span>
                            </div> -->
                            @endif
                          </ul>
                          </div>
                        </div>
                        @if(isset($item->emlaktype))
                        <p style="font-size:15px;color:#947054;margin-bottom:0px" >{{$item->emlaktype->name}}</p>
                        @endif
                        <span style="color:#7d7d7d;font-size:12px">
                            <?php $zaman=$item->created_at;$zaman->setLocale('az'); echo $zaman->diffForHumans().'  ';  ?>
                         {{$item->created_at->format('d.m.Y')}}
                     </span>
                    </div>
                </div>
              </a>



            </div>
            @endforeach

            <!-- <style>
      .banner {
          position: absolute;
          width: 120px;
          height: 1000px;
          background: url(ads.gif);
          top: 220px;
      }

      #banner_l { left: 5px; }

      #banner_r { right: 5px; }

      .zindex { z-index: 999999; }
  </style>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <div id="banner_l" class="banner">
      <img src="https://images.unsplash.com/photo-1526512340740-9217d0159da9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="">
  </div>
  <div id="banner_r" class="banner">
      <img src="https://images.unsplash.com/photo-1526512340740-9217d0159da9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="">
  </div>
  <script>
      jQuery(document).ready(function($) {
          var $banner = $('.banner'), $window = $(window);
          var $topDefault = parseFloat( $banner.css('top'), 10 );
          $window.on('scroll', function() {
              var $top = $(this).scrollTop();
              $banner.stop().animate( { top: $top + $topDefault }, 1000, 'easeOutCirc' );
          });

          var $wiBanner = $banner.outerWidth() * 2;
          function zindex(maxWidth){
              if( $window.width() <= maxWidth + $wiBanner ) {
                  $banner.addClass('zindex');
              } else {
                  $banner.removeClass('zindex');
              }
          }
      });
  </script> -->


        </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 style="font-family:'Sarabun',sans-serif" class="wow fadeInUp" data-wow-delay="300ms">Elan yerləşdirmək istəyirsən ?</h2>
                    <a href="/add" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Yerləşdir</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->

<!-- ##### Testimonials Area Start ##### -->
<!-- <section class="south-testimonials-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                    <h2 style="font-family: 'Sarabun', sans-serif;">Müştəri rəyləri</h2>
                    <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                    <!-- Single Testimonial Slide -->
                    <!-- <div class="single-testimonial-slide text-center">
                        <h5>Perfect Home for me</h5>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                        <div class="testimonial-author-info">
                            <img src="img/bg-img/feature6.jpg" alt="">
                            <p>Daiane Smith, <span>Customer</span></p>
                        </div>
                    </div>

                    <!-- Single Testimonial Slide -->
                    <!-- <div class="single-testimonial-slide text-center">
                        <h5>Perfect Home for me</h5>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                        <div class="testimonial-author-info">
                            <img src="img/bg-img/feature6.jpg" alt="">
                            <p>Daiane Smith, <span>Customer</span></p>
                        </div>
                    </div>

                    <!-- Single Testimonial Slide -->
                    <!-- <div class="single-testimonial-slide text-center">
                        <h5>Perfect Home for me</h5>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                        <div class="testimonial-author-info">
                            <img src="img/bg-img/feature6.jpg" alt="">
                            <p>Daiane Smith, <span>Customer</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ##### Testimonials Area End ##### -->

<!-- ##### Editor Area Start ##### -->



<!--
<section class="south-editor-area d-flex align-items-center">
    <div class="editor-content-area">
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
            <img src="img/icons/prize.png" alt="">
            <h2>jeremy Scott</h2>
            <p>Realtor</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src="img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
            <h6><img src="img/icons/envelope.png" alt=""> office@template.com</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="img/core-img/signature.png" alt="">
        </div>
    </div>

    <div class="editor-thumbnail">
        <img src="img/bg-img/editor.jpg" alt="">
    </div>
</section> -->




@endsection
