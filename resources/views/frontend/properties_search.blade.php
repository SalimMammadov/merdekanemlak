@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekan emlak.Mərdəkanda kirayə evlər,mərdəkanda evlərin alqı satqısı,mərdəkanda həyət evləri bina evləri vilların alqı satqısı və kirayəsi
@endsection
@section('content')
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


      <script type="text/javascript">

          var result = "<?php echo $result->count() ?>";

            if(result > 0)
            {
          Swal.fire(
          result+' Elan tapıldı !',
          false,
          'success'
        );
      }
      if(result == 0)
      {
        Swal.fire(
        'Elan tapılmadı...',
        false,
        'error'
      );
      }



      </script> -->

<?php use App\Region;
use App\EmlakType;
use App\RentType;

$emlaktypes=EmlakType::all();
 $regions=Region::all();
 ?>

 {!! Html::style('/css/select2.min.css') !!}
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


    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>Axtarış</p>
                        </div>
                        <!-- Search Form -->



                        <form action="/properties_search" method="POST" role="search">

                            {{ csrf_field() }}
                            <div class="row">

                              <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                   <select multiple="multiple" name="city[]" class="form-control select2-multi" id="cities">

                                     @if(isset($request['city']))
                                        @foreach($request['city'] as $cit)
                                      <option selected value="{{$cit}}" disabled  > <?php $searchcity=Region::where('id',$cit)->first(); echo $searchcity->name;  ?> </option>
                                    @endforeach
                                     @endif


                                   @foreach($regions as $region)

                                   <option value="{{$region->id}}">{{$region->name}}</option>

                                    @endforeach
                                 </select>
                                 </div>
                              </div>




                              <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select name="order" class="form-control" id="cities">
                                        <option  selected value="<?php if(isset($request['order'])) echo $request['order'] ?>">
                                          <?php if(isset($request['order'])) {$renttype=RentType::where('id',$request['order'])->first();echo $renttype->name;} else echo "Kirayə/Satılan" ?>
                                        </option>
                                        <option  value="1">Satılır</option>
                                        <option value="2">Kirayə verilir</option>
                                    </select>
                                </div>
                              </div>



                                <div class="col-12 col-md-4 col-lg-3">
                                  <div class="form-group">
                                      <select name="room" class="form-control" id="cities">
                                          <option  selected value="<?php if(isset($request['room'])) echo $request['room'] ?>">

                                              <?php if(isset($request['room'])) echo $request['room'].' otaqlı'; else echo "Otaq sayı" ?>

                                            </option>
                                          <option  value="1">1 otaqlı</option>
                                          <option value="2">2 otaqlı</option>
                                          <option value="3">3 otaqlı</option>
                                          <option value="4">4 otaqlı</option>
                                          <option value="5">5 otaqlı</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select name="type" class="form-control" id="catagories">
                                            <option selected value="<?php if(isset($request['type'])) echo $request['type']?>">

                                              <?php if(isset($request['type'])) {$type=EmlakType::where('id',$request['type'])->first();echo $type->name;} else echo "Növü" ?>

                                            </option>
                                          @foreach($emlaktypes as $emlaktype)
                                            <option value="{{$emlaktype->id}}">{{$emlaktype->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <hr>

                                <div class="col-12 search-form-second-steps">
                                    <div class="row">



                                        <div class="col-12 col-md-4 col-lg-4">
                                            <div class="form-group">
                                            <input class="form-control" type="number" name="minprice" value="<?php if(isset($request['minprice'])) echo $request['minprice']?>" placeholder="Minumum qiymət">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4">
                                          <div class="form-group">
                                          <input class="form-control" type="number" name="maxprice" value="<?php if(isset($request['maxprice'])) echo $request['maxprice']?>" placeholder="Maximum qiymət">
                                          </div>
                                        </div>


                                        <div class="col-12 col-md-4 col-lg-4">
                                            <div class="form-group">
                                              <div class="form-group">
                                              <input class="form-control" type="number" name="floor" value="<?php if(isset($request['floor'])) echo $request['floor']?>" placeholder="Mərtəbə sayı">
                                              </div>
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                              <div class="form-group">
                                              <input class="form-control" type="number" name="min_ground_size" value="<?php if(isset($request['min_ground_size'])) echo $request['min_ground_size']?>" placeholder="Minimum torpaq sahəsi (sot)">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                              <div class="form-group">
                                              <input class="form-control" type="number" name="max_ground_size" value="<?php if(isset($request['max_ground_size'])) echo $request['max_ground_size']?>" placeholder="Maximum torpaq sahəsi (sot)">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                              <div class="form-group">
                                              <input class="form-control" type="number" name="area_size" value="<?php if(isset($request['area_size'])) echo $request['area_size']?>" placeholder="Evin sahəsi">
                                              </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-between align-items-end">
                                    <!-- More Filter -->
                                    <div class="more-filter">
                                        <a href="#" id="moreFilter">+ Daha çox özəllik</a>
                                    </div>
                                    <!-- Submit -->
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">Axtar</button>
                                    </div>
                                </div>
                            </div>



                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### Listing Content Wrapper Area Start ##### -->

    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
          <div class="row">

            <div class="col-md-8 offset-2">
              @if($result->count() > 0)
              <div class="alert alert-success">
                <center>
                  <strong>Axtardığınız tipdə elan(lar) tapıldı !</strong>
                </center>
              </div>
              @else
              <div class="alert alert-danger">
                <center>
                  <strong>Axtardığınız tipdə elan tapılmadı...</strong>
                </center>
              </div>
              @endif
            </div>




          </div>

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

                        <?php if(isset($vipitem->region) && isset($vipitem->renttype) && isset($vipitem->emlaktype)) $vipslug = str_slug($vipitem->region->name.'-'.$vipitem->emlaktype->name.'-'.$vipitem->renttype->name); else $vipslug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

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

            <div class="row">

                @if($items->currentPage() == 1)
              <div class="col-12 mb-3">
                  <div class="breadcumb-content">
                    <center>  <h3 class="breadcumb-title">{{$result->count()}} Elan tapıldı</h3> <center>
                  </div>

              </div>
                <div class="col-md-6 mb-5">

                  @component('frontend.sirala')
                  @endcomponent
                </div>


                <div class="col-md-6 mb-3">
                  <div style="font-size:19px;" class="south-pagination d-flex justify-content-end">
                      <nav aria-label="Page navigation">
                          <ul class="pagination">
                            {{$items->appends($data)->links()}}
                          </ul>
                      </nav>
                  </div>
                </div>
              @else
              <div class="col-12 mb-3">
                  <div class="breadcumb-content">
                    <center>  <h3 class="breadcumb-title">Axtarılan elanlar</h3> <center>
                  </div>

              </div>
              @endif



              @foreach($items as $item)


              <div class="col-6 col-md-6 col-xl-3" style="padding-left:5px;padding-right:5px;">

                <?php if(isset($item->region) && isset($item->renttype) && isset($item->emlaktype)) $slug = str_slug($item->region->name.'-'.$item->emlaktype->name.'-'.$item->renttype->name); else $slug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

                <a href="{{route('properties.single',[$item->id,$slug])}}" target="_blank">

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

            </div>

            <div class="row">
                <div class="col-12">
                    <div style="font-size:19px;" class="south-pagination d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                              {{$items->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->

    {!! Html::script('/js/select2.min.js') !!}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      <script type="text/javascript">
        $(".select2-multi").select2({
          placeholder:"Qəsəbələr"
        });

      </script>


@endsection
