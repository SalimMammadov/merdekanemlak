@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
{{$blog->content}}
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Ətraflı Xəbər</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">

                    <div class="single-blog-area">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                            <img src="/storage/{{$blog->main_image}}" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Date -->
                            <div class="post-date">
                                <a href="#">   <?php $zaman=$blog->created_at;$zaman->setLocale('az');
                                    echo $zaman->diffForHumans();
                                    ?>
                                  |
                                  {{$blog->created_at->format('d.m.Y')}}
</a>
                            </div>
                            <!-- Headline -->
                            <a href="#" class="headline">{{$blog->title}}</a>
                            <!-- Post Meta -->

                            <p>
                              {{$blog->content}}
                            </p>
                        </div>
                    </div>



                    <!-- Leave A Comment -->

                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Search Widget -->
                        <div class="search-widget-area mb-70">
                            <form action="#" method="get">
                                <input type="search" name="search" id="search" placeholder="Axtar">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <!-- Catagories Widget -->


                        <!-- Catagories Widget -->


                        <!-- Catagories Widget -->
                        <div class="featured-properties-slides owl-carousel">
                          @foreach($vipitems as $vipitem)

                            <!-- Single Slide -->
                            <div class="single-featured-property">
                                <!-- Property Thumbnail -->
                                <div class="property-thumb">
                                  <?php $img=str_replace(".","-cropped.", $vipitem->main_image) ?>
                                  <a href="{{route('properties.single',$vipitem->id)}}" target="_blank">

                                    <img id="elanimg" height="500" width="500" src="/storage/{{$img}}" alt="">
                                  </a>
                                    <div class="tag">
                                        <span>
                                          @if(isset($vipitem->rent_type))
                                          {{$vipitem->renttype->name}}
                                          @endif
                                        </span>
                                    </div>
                                    <div class="list-price">
                                        <p>{{$vipitem->price}}</p>
                                    </div>
                                </div>
                                <!-- Property Content -->
                                <div class="property-content">

                                    <p class="location"><img src="/img/icons/location.png" alt="">{{$vipitem->region->name}}</p>

                                    <div class="property-meta-data d-flex align-items-end justify-content-between">

                                        @if(isset($vipitem->room_count))

                                        <div class="bathroom">
                                            <span style="color:#7d7d7d"><b> Otaq sayı : <span style="color:#947054">{{$vipitem->room_count}}</b></span></span>
                                        </div>
                                        @endif

                                        @if(isset($vipitem->ground_size))
                                        <div class="garage">

                                            <span style="color:#7d7d7d"><b>Torpaq : <span style="color:#947054">{{$vipitem->ground_size}} sot</b></span></span>
                                        </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide -->
                            @endforeach

                            @foreach($vipitems as $vipitem)

                            <div class="single-featured-property">
                                <!-- Property Thumbnail -->
                                <div class="property-thumb">
                                  <?php $img=str_replace(".","-cropped.", $vipitem->main_image) ?>
                                  <a href="{{route('properties.single',$vipitem->id)}}" target="_blank">

                                    <img id="elanimg" height="500" width="500" src="/storage/{{$img}}" alt="">
                                  </a>
                                    <div class="tag">
                                        <span>   @if(isset($vipitem->rent_type))
                                           {{$vipitem->renttype->name}}
                                           @endif</span>
                                    </div>
                                    <div class="list-price">
                                      <p>{{$vipitem->price}}</p>

                                    </div>
                                </div>
                                <!-- Property Content -->

                        </div>
                        @endforeach

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
@endsection
