@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ - @if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif
@endsection
@section('description')
<?php
echo str_slug($item->region->name.'da-'.$item->emlaktype->name.'-'.$item->renttype->name);
?>
 {{$item->description}}
@endsection
@section('content')
<style media="screen">


@media only screen and (max-width: 760px) {
  #emlakimg{
    height:350px !important;
    max-width: 100% !important;
  }
   #corsel{
    max-width:95% !important;
  }

}


@media only screen and (min-width: 760px) {
  #emlakimg{
    height:500px !important;
    max-width: 100% !important;
  }
   #corsel{
    max-width:65% !important;
  }
}

.resources-item .resources-category-image {

  height:auto;

}

.listings-content .list-price p {

  color:#947054;
}
.listings-content{
  font-family:'Sarabun',sans-serif;
}

</style>
<?php use Illuminate\Support\Facades\URL; ?>
@section('link')
<link href="/photos-popup.css"  rel="stylesheet">
<link href="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/magnific-popup.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.magnific-popup/1.0.0/jquery.magnific-popup.js"></script>
<script src="photo-popup.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dfb86aeac002f23"></script>
@endsection
<section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Daha ətraflı</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->

    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### Listings Content Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">


                <div class="popup-gallery">
                  <div class="row">


                            @if(isset($item->main_image))
                    <div style="overflow:hidden" class="col-12 col-md-6">
                      <div class="resources-item">
                        <div class="resources-category-image">
                           <?php $main_image=str_replace(".","-medium.", $item->main_image) ?>
                          <a href="/storage/{{$item->main_image}}" title="Mərdəkan Əmlak"><img  class="img-responsive" alt="Merdekan Emlak merdekanda kiraye evler merdekanda evlerin satisi" src="/storage/{{$main_image}}"></a>
                        </div>

                      </div>
                    </div>
                    @endif


                      @if(isset($item->image_url))
                    <div style="background:#dfe6e9;margin-top:30px;overflow:scroll;height:360px;" class="col-12 col-md-6 p-2">
                      <div class="row">

                    <?php
                         foreach(json_decode($item->image_url, true) as $image)
                         {
                         ?>

                         <?php $img=str_replace(".","-cropped.", $image) ?>
                    <div class="col-4 col-md-3">

                      <div class="resources-item">
                        <div class="resources-category-image">
                          <a href="/storage/{{$image}}" title="Mərdəkan Əmlak"><img  class="img-responsive" alt="Merdekan Emlak merdekanda kiraye evler merdekanda evlerin satisi" src="/storage/{{$img}}"></a>

                        </div>

                      </div>
                    </div>

                  <?php } ?>

                </div>
                </div>
       @endif
                  </div>
                </div>


            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8" style="padding-left:13px;">
                    <div class="listings-content" >
                        <!-- Price -->
                        <div class="list-price">
                            <p>{{$item->price}} AZN | @if(isset($item->renttype)) {{$item->renttype->name}} @endif   </p>
                        </div>
                        <p style="font-size:15px;" class="location"><img src="/img/icons/location.png" alt="">@if(isset($item->address)){{$item->address}} @endif</p>
                      <p style="font-size:16px;">
                        {{$item->description}}
                      </p>


                        <!-- Meta -->
                        <div  class="col-md-12" style="font-family:'Sarabun',sans-serif;border:2px solid #947054;padding:10px;">

                            <div class="row">
                          <div class="col-xl-6 col-xs-6 col-sm-6" style="padding-left:13px">



                            <div class="col-md-12 m-1">
                              <span style="font-weight:bold;color:#7d7d7d">Elanın nömrəsi :</span> <span style="color:#947054">{{$item->id}}</span>
                            </div>
                            @if(isset($item->emlaktype->name))
                            <div class="col-md-12 m-1">
                              <span style="font-weight:bold;color:#7d7d7d">Kateqoriyası :</span> <span style="color:#947054">{{$item->emlaktype->name}}</span>
                            </div>
                            @endif
                            @if(isset($item->room_count))
                            <div class="col-md-12 m-1">
                              <span style="font-weight:bold;color:#7d7d7d">Otaq sayı :</span> <span style="color:#947054">{{$item->room_count}}</span>
                            </div>
                            @endif
                            @if(isset($item->ground_size))
                            <div class="col-md-12 m-1">
                              <span style="font-weight:bold;color:#7d7d7d">Torpaq sahəsi : </span><span style="color:#947054">{{$item->ground_size}} sot</span>
                            </div>
                            @endif
                            @if(isset($item->area_size))
                            <div class="col-md-12 m-1">
                              <span style="font-weight:bold;color:#7d7d7d">Obyektin sahəsi :</span> <span style="color:#947054">{{$item->area_size}} m<sup>2</sup></span>
                            </div>
                            @endif

                        </div>

                        <div class="col-xl-6 col-xs-6 col-sm-6" style="padding-left:13px">


                          <div class="col-md-12 m-1">
                            <span style="font-weight:bold;color:#7d7d7d">Region :</span> <span style="color:#947054">{{$item->region->name}}</span>
                          </div>


                          @if(isset($item->floor_count))

                          <div class="col-md-12 m-1">
                          <span style="font-weight:bold;color:#7d7d7d">Mərtəbə sayı : </span> <span style="color:#947054">{{$item->floor_count}}</span>
                        </div>
                        @endif


                        </div>




                      </div>


                        </div>
                        <div class="col-md-12 mt-4 ">
                          <span style="color:#947054" >Elanı paylaş : </span>

                    <div class="addthis_inline_share_toolbox mt-2"></div>
                        </div>
                        <!-- Core Features -->
                        <!-- <ul class="listings-core-features d-flex align-items-center">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Gated Community</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Automatic Sprinklers</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Ocean Views</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Private Patio</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Beach Access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Rooftop Terrace</li>
                        </ul> -->
                        <!-- Listings Btn Groups -->

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4" style="padding-left:13px">
                    <div class="contact-realtor-wrapper">
                        <div class="realtor-info">
                            <div class="realtor---info">
                                <h2></h2>
                                <p style="font-family:'Sarabun',sans-serif">Əlaqədar şəxs</p>
                                <h6><img src="/img/icons/phone-call.png" alt=""> {{setting('site.telephone')}}</h6>
                                <h6><img src="/img/icons/envelope.png" alt=""> {{setting('site.email')}}</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Listing Maps -->

        </div>
    </section>

<script type="text/javascript">
$(document).ready(function() {
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Yüklənir #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%"> Şəkil #%curr%</a> yüklənə bilmədi.',
      titleSrc: function(item) {
        return item.el.attr('title') + '';
      }
    }
  });
});

</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
@endsection
