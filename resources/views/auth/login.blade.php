@extends('frontend.app')
@section('title')
 | Daxil ol
@endsection

@section('link')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')


<!-- ##### Breadcumb Area Start ##### -->
   <section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
       <div class="container h-100">
           <div class="row h-100 align-items-center">
               <div class="col-12">
                   <div class="breadcumb-content">
                       <h3 class="breadcumb-title"> Daxil ol</h3>
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
                   <div class="contact-heading">
                       <h6>Qaydalar</h6>
                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-12 col-lg-6">
                   <div style="text-justify:inter-word;text-align:justify" class="content-sidebar">
                       <!-- Office Hours -->
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                         incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis
                           nostrud exercitation ullamco laboris
                            nisi ut
                             aliquip
                              ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                              . Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                       </p>
                       <!-- Address -->

                   </div>
               </div>

               <!-- Contact Form Area -->
               <div class="col-12 col-lg-6">

                   <div class="contact-form">
                    {!! Form::open(['route'=>'customer.login.submit','method'=>'post']) !!}
                      @csrf
                           <div class="form-group">
                               <input type="email" class="form-control" name="email" id="contact-email" placeholder="E-mail">
                           </div>
                           <div class="form-group">
                               <input type="password" class="form-control" name="password" id="contact-email" placeholder="Şifrə">
                           </div>
                           <p>Hesabın yoxdur ? <a style="text-decoration:none;" href="/register">Qeydiyyat</a></p>
                           <button type="submit" class="btn south-btn">Daxil ol</button>
                      {!! Form::close() !!}
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- Google Maps -->


@endsection
