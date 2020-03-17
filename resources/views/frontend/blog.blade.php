@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekan emlak.Mərdəkanda kirayə evlər,mərdəkanda evlərin alqı satqısı,mərdəkanda həyət evləri bina evləri vilların alqı satqısı və kirayəsi
@endsection

@section('link')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dfb86aeac002f23"></script>
@endsection

@section('content')
<style media="screen">

.breadcumb-area .breadcumb-title {
    text-transform: none;
}
</style>
<section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
       <div class="container h-100">
           <div class="row h-100 align-items-center">
               <div class="col-12">
                   <div class="breadcumb-content">
                       <h3 class="breadcumb-title">Xəbərlər</h3>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ##### Breadcumb Area End ##### -->

   <!-- ##### Blog Area Start ##### -->
   <section class="south-blog-area section-padding-100">
       <div class="container">
           <div class="row">
               <div class="col-12 col-lg-8 mt-2" style="padding-left:13px">

                 @foreach($blogs as $blog)
                   <div class="single-blog-area mb-50">
                       <!-- Post Thumbnail -->
                       <div class="blog-post-thumbnail">
                         @if(isset($blog->main_image))
                           <img src="/storage/{{$blog->main_image}}" alt="">
                           @else
                           <img src="/storage/default.jpg" alt="">
                           @endif
                       </div>
                       <!-- Post Content -->
                       <div class="post-content">
                           <!-- Date -->
                           <?php $slug=str_slug($blog->title) ?>
                           <!-- Headline -->
                           <a href="{{route('blog.single',['id'=>$blog->id])}}" class="headline">{{$blog->title}}</a>
                           <!-- Post Meta -->
                           <div class="post-date">
                               <a href="">
                                 <?php $zaman=$blog->created_at;$zaman->setLocale('az');
                                  echo $zaman->diffForHumans();
                                  ?>
                                |
                                {{$blog->created_at->format('d.m.Y')}}
                               </a>
                           </div>

                           <p>
                             <?php $string = $blog->content;
       if (strlen($string) > 200) {

           // truncate string
           $stringCut = substr($string, 0, 200);
           $endPoint = strrpos($stringCut, ' ');

           //if the string doesn't contain any space then it will cut without word basis.
           $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
           $string .= ' ... ';
       }
       echo $string; ?>
                           </p>

                           <!-- Read More btn -->
                           <a href="{{route('blog.single',$blog->id)}}" target="_blank" class="btn south-btn">Ətraflı</a>
                       </div>
                       <div class="col-md-12">
                         <span style="color:#947054;font-weight:bold" >Xəbəri paylaş : </span>

                   <div class="addthis_inline_share_toolbox mt-2"></div>
                       </div>
                       @endforeach




                   </div>
               </div>

               <div class="col-12 col-lg-4" style="padding-left:13px">
                   <div class="blog-sidebar-area">

                       <!-- Search Widget -->


                       <!-- Catagories Widget -->
                       <div class="featured-properties-slides owl-carousel">
                         @foreach($vipitems as $vipitem)

                           <!-- Single Slide -->
                           <div class="single-featured-property">
                               <!-- Property Thumbnail -->
                               <div class="property-thumb">
                                 <?php $img=str_replace(".","-cropped.", $vipitem->main_image) ?>
                                 <?php if(isset($vipitem->region) && isset($vipitem->renttype) && isset($vipitem->emlaktype)) $vipslug = str_slug($vipitem->region->name.'-'.$vipitem->emlaktype->name.'-'.$vipitem->renttype->name); else $vipslug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

                                 <a href="{{route('properties.single',[$vipitem->id,$vipslug])}}" target="_blank">

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
                                       <p>{{$vipitem->price}} AZN</p>
                                   </div>
                               </div>
                               <!-- Property Content -->
                               <div class="property-content">

                                   <p style="font-family: 'Sarabun', sans-serif;font-size:16px;" class="location"><img src="img/icons/location.png" alt="">{{$vipitem->region->name}}</p>

                                   <div class="property-meta-data d-flex align-items-end justify-content-between">

                                       @if(isset($vipitem->room_count))

                                       <div class="bathroom">
                                           <span style="color:#7d7d7d"><b><span style="color:#947054">{{$vipitem->room_count}} otaq</b></span></span>
                                       </div>
                                       @endif

                                       @if(isset($vipitem->ground_size))
                                       <div class="garage">

                                           <span style="color:#7d7d7d"><b>@if(empty($vipitem->room_count)) Torpaq : @endif<span style="color:#947054">{{$vipitem->ground_size}} sot</b></span></span>
                                       </div>
                                       @endif


                                   </div>
                               </div>
                           </div>
                           <!-- Single Slide -->
                           @endforeach



                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-12" style="padding-left:13px">
                   <!-- Pagination -->
                   <div class="south-pagination mt-100 d-flex">
                       <nav aria-label="Page navigation">
                           <ul class="pagination">
                              {{$blogs->links()}}
                           </ul>
                       </nav>
                   </div>
               </div>
           </div>
       </div>
     </div>
   </section>
   <!-- ##### Blog Area End ##### -->





@endsection
