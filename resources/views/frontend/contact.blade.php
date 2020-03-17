@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekan emlak.Mərdəkanda kirayə evlər,mərdəkanda evlərin alqı satqısı,mərdəkanda həyət evləri bina evləri vilların alqı satqısı və kirayəsi
@endsection
@section('content')

<style media="screen">
.breadcumb-area .breadcumb-title {
    text-transform: none;
}

</style>
<!-- ##### Breadcumb Area Start ##### -->
   <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
       <div class="container h-100">
           <div class="row h-100 align-items-center">
               <div class="col-12">
                   <div class="breadcumb-content">
                       <h3 class="breadcumb-title">Əlaqə</h3>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ##### Breadcumb Area End ##### -->

   <section class="south-contact-area section-padding-100">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div style="font-family:'Sarabun',sans-serif" class="contact-heading">
                       <h6>Əlaqə məlumatlarımız</h6>
                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-12 col-lg-4">
                   <div class="content-sidebar">
                       <!-- Office Hours -->

                       <!-- Address -->
                       <div class="address mt-30">
                           <h6><img src="img/icons/phone-call.png" alt="">{{setting('site.telephone')}}</h6>
                           <h6><img src="img/icons/envelope.png" alt=""> {{setting('site.email')}}</h6>
                           <div class="row">
                           <h6><a style="color:#947054" href="https://m.facebook.com/asanalqisatqi/"><i class="fa fa-facebook fa-2x"></i></a></h6>
                           <h6><a style="color:#947054" href="https://instagram.com/merdekan.emlak?igshid=1ur2cvh6ucq5c"><i class="fa fa-instagram fa-2x"></i></a></h6>
                         </div>
                       </div>
                   </div>
               </div>

               <!-- Contact Form Area -->
               <div class="col-12 col-lg-8">
                 @if(Session::has('success'))
                 <div class="col-md-12">
                   <div class="alert alert-success">
                    <strong>{{Session::get('success')}}</strong>

                   </div>

                 </div>
                 @endif
                   <div class="contact-form">
                    {!! Form::open(['route'=>'contact.submit','method'=>'post']) !!}
                           <div class="form-group">
                               <input required type="text" class="form-control" name="name" id="contact-name" placeholder="Adınız">
                           </div>
                           <div class="form-group">
                               <input required type="number" class="form-control" name="telephone" id="contact-number" placeholder="Telefon nömrəniz">
                           </div>
                           <div class="form-group">
                               <input required type="email" class="form-control" name="email" id="contact-email" placeholder="E-mail">
                           </div>
                           <div class="form-group">
                               <textarea required class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Mesajınız"></textarea>
                           </div>
                           <button type="submit" class="btn south-btn">Göndər</button>
                      {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- Google Maps -->


@endsection
