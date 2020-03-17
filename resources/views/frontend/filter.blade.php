<?php use App\Region;
use App\EmlakType;
$emlaktypes=EmlakType::all();
 $regions=Region::all();
 ?>

 {!! Html::style('/css/select2.min.css') !!}

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

                               @foreach($regions as $region)

                               <option value="{{$region->id}}">{{$region->name}}</option>

                                @endforeach
                             </select>
                             </div>
                          </div>




                          <div class="col-12 col-md-4 col-lg-3">
                            <div class="form-group">
                                <select name="order" class="form-control" id="cities">
                                    <option  selected value="">Kirayə/Satılan</option>
                                    <option  value="1">Satılır</option>
                                    <option value="2">Kirayə verilir</option>

                                </select>
                            </div>
                          </div>







                            <div class="col-12 col-md-4 col-lg-3">
                              <div class="form-group">
                                  <select name="room" class="form-control" id="cities">
                                      <option  selected value="">Otaq sayı</option>
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
                                        <option selected value="">Növü</option>
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
                                        <input class="form-control" type="number" name="minprice" value="" placeholder="Minumum qiymət">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-4">
                                      <div class="form-group">
                                      <input class="form-control" type="number" name="maxprice" value="" placeholder="Maximum qiymət">
                                      </div>
                                    </div>


                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                          <div class="form-group">
                                          <input class="form-control" type="number" name="floor" value="" placeholder="Mərtəbə sayı">
                                          </div>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                          <div class="form-group">
                                          <input class="form-control" type="number" name="min_ground_size" value="" placeholder="Minimum torpaq sahəsi (sot)">
                                          </div>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                          <div class="form-group">
                                          <input class="form-control" type="number" name="max_ground_size" value="" placeholder="Maximum torpaq sahəsi (sot)">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                          <div class="form-group">
                                          <input class="form-control" type="number" name="area_size" value="" placeholder="Evin sahəsi">
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

{!! Html::script('/js/select2.min.js') !!}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript">
    $(".select2-multi").select2({
      placeholder:"Qəsəbələr"
    })
  </script>
