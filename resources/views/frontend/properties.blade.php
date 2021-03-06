@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekan emlak.Mərdəkanda kirayə evlər,mərdəkanda evlərin alqı satqısı,mərdəkanda həyət evləri bina evləri vilların alqı satqısı və kirayəsi
@endsection
@section('content')

<?php use App\Region;
use App\EmlakType;
$emlaktypes=EmlakType::all();
 $regions=Region::all();
use App\ItemList;
$all=ItemList::all();
$count=$all->count();
 ?>


 @component('frontend.style')
 @endcomponent
<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Elanlar</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->
    @component('frontend.filter')
    @endcomponent
    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">


            <section class="featured-properties-area section-padding-100-50">

                <div class="container">
                    <div class="row">
                         <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2 style="font-family: 'Sarabun', sans-serif;">VİP elanlar</h2>
                    <p></p>
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
                                    <h5  style="font-family: 'Sarabun', sans-serif;"><img src="/img/icons/location.png" ><span class="ml-2">{{$vipitem->region->name}}
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
            <div class="section-heading wow fadeInUp">
                <h2 style="font-family: 'Sarabun', sans-serif;">Elanların Hamısı</h2>
                <p></p>
            </div>
            <div class="row">


              <div class="col-md-6 mb-5">

                @component('frontend.sirala')
                @endcomponent
              </div>



            </div>

            <div id="post-data">

            <div class="row">



              @foreach($items as $item)


              <div class="col-6 col-md-6 col-xl-3" style="padding-left:5px;padding-right:5px;">

                <?php if(isset($item->region) && isset($item->renttype) && isset($item->emlaktype)) $slug = str_slug($item->region->name.'da-'.$item->emlaktype->name.'-'.$item->renttype->name); else $slug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

                <a href="{{route('properties.single',[$item->id,$slug])}}" target="_blank">

                  <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                      <!-- Property Thumbnail -->
                      <div class="property-thumb">
                        @if(isset($item->main_image))
                             <?php $img=str_replace(".","-cropped.", $item->main_image) ?>
                               <img title="@if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif" id="elanimg" height="500" width="500" src="/storage/{{$img}}"
                               alt="@if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif">
                               @else
                               <img title="@if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif" id="elanimg" height="500" width="500" src="/storage/default.jpg"
                               alt="@if(isset($item->address)){{$item->address}} @endif   @if(isset($item->emlaktype->name)) {{$item->emlaktype->name}} @endif @if(isset($item->renttype)) {{$item->renttype->name}} @endif">
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
                          <h5  style="font-family: 'Sarabun', sans-serif;"><img src="/img/icons/location.png" ><span class="ml-2">{{$item->region->name}}
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
            </div>
          </div>

            <div class="ajax-load text-center" style="display:none;font-weight:bold">
              <p>Yüklənir...</p>
                <img style="background-color:white" src="/loader.gif" alt="">
          </div>

        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"> </script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- $(document).height() > $(window).height()  && page < stop -->

         <script type="text/javascript">
     var page = 1;
     var all = '<?php echo $count ?>';
     var stop = all / 4 ;
     $(window).scroll(function() {
     if( $(window).scrollTop() > $(document).height() - $(window).height() - 1000 && page < stop ) {

       page++;
       loadMoreData(page);
       console.log(page);

     }
     if(page > stop){
       $('.ajax-load').show();
       $('.ajax-load').html("Elanlar bitti");

     }
     });
     function loadMoreData(page){
     $.ajax(
     {
       url: '?page=' + page,
     type: "get",
     beforeSend: function()
     {
     $('.ajax-load').show();
     }
     })
     .done(function(data)
     {
     if(data.html == " "){
     $('.ajax-load').html("Elanlar bitti");
     return;
     }
     $('.ajax-load').hide();
     $('#post-data').append(data.html);
     })
     .fail(function(jqXHR, ajaxOptions, thrownError)
     {
       alert('Problem...');
     });
     }
     </script>



@endsection
