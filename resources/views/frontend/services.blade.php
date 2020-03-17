@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekan emlak.Mərdəkanda kirayə evlər,mərdəkanda evlərin alqı satqısı,mərdəkanda həyət evləri bina evləri vilların alqı satqısı və kirayəsi
@endsection
@section('content')

<style media="screen">
  .section-heading{
    margin-bottom: 0px !important;
  }
  .section-heading h2 {
    text-transform: none;
  }
  .breadcumb-area .breadcumb-title {
      text-transform: none;
  }
</style>

<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Xidmətlər</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <div class="section-heading wow fadeInUp mt-5">
                <h2 style="font-family: 'Sarabun', sans-serif;">Xidmətlərimiz</h2>
                <p class="mt-1"><img src="img/icons/phone-call.png" alt="">{{setting('site.telephone')}}</p>
            </div>
            <div class="row">
              @foreach($services as $service)

              <div class="col-12 col-md-12 col-xl-12 mb-2">

                <div class="container p-4" style="margin-bottom:100px;">
                    <p style="font-family:'Sarabun',sans-serif !important">{!! $service->description !!}</p>
                  </div>
              </div>
              @endforeach

            </div>


        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->






@endsection
