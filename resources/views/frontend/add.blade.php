@extends('frontend.app')
@section('title')
MERDEKANEMLAK.AZ Merdekanda evler , merdekan emlak , merdekanda evlerin alqi satqisi , merdekanda kiraye evler , merdekanda heyet evleri , merdekanda bina evleri
@endsection
@section('description')
Merdekan emlak.Mərdəkanda kirayə ev vermək,mərdəkanda satılıq evlər,ev elanları kirayə evlər evlərin alqı satqısı
@endsection
@section('content')

<?php use App\Region;
use App\EmlakType;
use App\RentType;
$renttypes=RentType::all();
$emlaktypes=EmlakType::all();
 $regions=Region::all();
 ?>
<!-- ##### Breadcumb Area Start ##### -->
   <section class="breadcumb-area bg-img" style="background-image: url(/img/bg-img/hero1.jpg);">
       <div class="container h-100">
           <div class="row h-100 align-items-center">
               <div class="col-12">
                   <div class="breadcumb-content">
                       <h3 class="breadcumb-title"> Elan paylaş</h3>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ##### Breadcumb Area End ##### -->

   <section style="padding-top:50px;padding-bottom:50px;"  class="south-contact-area ">
       <div class="container">
           <div class="row">
                <div style="font-family:'Sarabun',sans-serif;margin-bottom:50px;" class="col-md-8">

                  <center><h4 style="color:#947054 !important">Elan haqda məlumatları göndərin və təsdiqlənməsini gözləyin</h4></center>
                  @if(Session::has('success'))
                  <div class="col-md-12">
                    <div class="alert alert-success text-center mt-2">
                      <strong>{{Session::get('success')}}</strong>
                    </div>

                  </div>
                  @endif
                  @if($errors->any())
                  <div class="alert alert-danger">
                    <center>
                  @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </center>
                </div>

                  @endif
                </div>

                  <div class="col-md-12">



                {!! Form::open(['route'=>'add.submit','method'=>'post','files' => 'true','enctype'=>'multipart/form-data']) !!}



                  <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" >Satılır/Kirayə Verilir</label>
                      <select  name="rent_type" class="form-control">
                          <option value="">Seç</option>
                          @foreach($renttypes as $renttype)
                          <option value="{{$renttype->id}}">{{$renttype->name}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" >Əmlak növü :</label>
                      <select  name="emlak_type" class="form-control">
                          <option value="">Seç</option>
                          @foreach($emlaktypes as $emlaktype)
                            <option value="{{$emlaktype->id}}">{{$emlaktype->name}}</option>
                            @endforeach
                      </select>
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" >Region :</label>
                      <select  name="region_id" class="form-control">
                          <option value="">Seç</option>
                          @foreach($regions as $region)

                          <option value="{{$region->id}}">{{$region->name}}</option>

                           @endforeach
                      </select>
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" for="room_count">Otaq sayı :</label>
                      <input  min="0" id="room_count" class="form-control" type="number" name="room_count" value="">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" for="area_size">Obyektin sahəsi (Ehtiyac olarsa) :</label>
                      <input min="0" id="area_size" class="form-control" type="number" name="area_size" value="">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" for="floor_count">Mərtəbə sayı :</label>
                      <input min="0" id="floor_count" class="form-control" type="number" name="floor_count" value="">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" for="price">Qiymət :</label>
                      <input min="0" id="price" class="form-control" type="number" name="price" value="">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label style="color:#947054 !important" for="address">Ünvan :</label>
                      <input min="0" id="address" class="form-control" type="text" name="address" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label style="color:#947054 !important" for="ground_size">Torpaq sahəsi sot (Ehtiyac olarsa) :</label>
                      <input min="0" id="ground_size" class="form-control" type="number" name="ground_size" value="">
                  </div>

              </div>


                <div class="col-md-6">
                  <div class="col-md-12 m-2">
                    <label for="">Əsas şəkil : </label>
                    <input type="file" name="main_image" value="">
                  </div>
                  <div class="col-md-12 m-2">
                    <label>Digər şəkillər : </label>
                    <input type="file" multiple="multiple" name="image_url[]" value="">
                  </div>
                </div>

                <div class="col-md-8 ">
                  <div class="form-group">
                    <label style="color:#947054 !important">Elan haqda məlumat ( <span style="color:red">məlumat 42 simvoldan çox olmalıdır</span> ) :</label>
                    <textarea class="form-control" name="description" style="height:150px;"></textarea>
                  </div>
                </div>
              </div>



              <div class="col-md-12" style="font-family:'Sarabun',sans-serif;">
                  <center ><h4 style="color:#947054 !important;margin-top:30px;margin-bottom:20px">Özünüz haqda məlumatları doldurun</h4></center>
                  <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                        <label style="color:#947054 !important" for="price">Adınız</label>
                        <input required   class="form-control" type="text" name="customer_name" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label style="color:#947054 !important" for="price">Soyadınız</label>
                        <input  required class="form-control" type="text" name="customer_surname" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label style="color:#947054 !important" for="price">E-mail</label>
                        <input  class="form-control" type="text" name="customer_email" value="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label style="color:#947054 !important" for="price">Telefon nömrəsi</label>
                        <input   required  class="form-control" type="text" name="customer_tel" value="">
                    </div>
                  </div>

                  <div class="col-md-8 offset-2 mb-3">
                    <center>
                 <button type="submit" class="btn south-btn m-1 btn-center">Göndər</button>
               </center>
               </div>
             </div>
           </div>
                {!! Form::close() !!}
              </div>

           </div>
       </div>
   </section>

   <!-- Google Maps -->


@endsection
