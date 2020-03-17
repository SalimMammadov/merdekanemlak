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
 ?>
<style media="screen">

  .section-heading h2 {
    text-transform: none;
  }
  .breadcumb-area .breadcumb-title {
      text-transform: none;
  }
  .call-to-action-area .cta-content h2 {
    text-transform: none;
  }
</style>
<!-- ##### Breadcumb Area Start ##### -->
   <section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
       <div class="container h-100">
           <div class="row h-100 align-items-center">
               <div class="col-12">
                   <div class="breadcumb-content">
                       <h3 class="breadcumb-title">Haqqımızda</h3>
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

   <!-- ##### About Content Wrapper Start ##### -->
   <section class="about-content-wrapper section-padding-100">
       <div class="container">
           <div class="row">
               <div class="col-md-8 offset-2">
                   <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                       <h2>Sizin işinizi rahatlaşdırdıq</h2>
                   </div>
                   <div class="about-content">
                       <img class="wow fadeInUp" data-wow-delay="350ms" src="img/bg-img/about.jpg" alt="">
                       <p style="font-family:'Sarabun',sans-serif !important" class="wow fadeInUp" data-wow-delay="450ms">
                         {!! setting('site.about') !!}
                       </p>
                   </div>
               </div>




           </div>
       </div>
   </section>
   <!-- ##### About Content Wrapper End ##### -->

   <!-- ##### Call To Action Area Start ##### -->
   <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
       <div class="container h-100">
           <div class="row align-items-center h-100">
               <div class="col-12">
                   <div class="cta-content text-center">
                       <h2 class="wow fadeInUp" data-wow-delay="300ms">Elan yerləşdirmək istəyirsən ?</h2>
                       <a href="/add" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Yerləşdir</a>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ##### Call To Action Area End ##### -->

   <!-- ##### Meet The Team Area Start ##### -->
   <section class="meet-the-team-area section-padding-100-0">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="section-heading">
                      <h2>Komandamız</h2>
                      <p style="font-family:'Sarabun',sans-serif">Problem yaranarsa əlaqə saxla</p>
                  </div>
              </div>
          </div>

          <div class="row justify-content-center">
              <!-- Single Team Member -->

              <!-- Single Team Member -->

              <!-- Single Team Member -->
                @foreach($agents as $agent)
              <div class="col-12 col-sm-6 col-lg-4">
                  <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="750ms">
                      <!-- Team Member Thumb -->

                      <!-- Team Member Info -->
                      <div class="team-member-info">
                          <div class="section-heading">
                              <img id="agentimage" src="/storage/<?php echo $agent->image_url; ?>" alt="">
                              <h2 style="font-family:'Sarabun',sans-serif">{{$agent->name}} {{$agent->surname}}</h2>
                              <p>{{$agent->vezife}}</p>
                          </div>
                          <div class="address">
                              <h6><img src="/img/icons/phone-call.png" alt=""> {{$agent->telephone}}</h6>
                              <h6><img src="/img/icons/envelope.png" alt=""> {{$agent->email}}</h6>
                          </div>
                      </div>
                  </div>
              </div>

              @endforeach
          </div>
      </div>
  </section>
   <!-- ##### Meet The Team Area End ##### -->








@endsection
