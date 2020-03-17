<div class="row">
@foreach($items as $item)


<div class="col-6 col-md-6 col-xl-3" style="padding-left:5px;padding-right:5px;">

  <?php if(isset($item->region) && isset($item->renttype) && isset($item->emlaktype)) $slug = str_slug($item->region->name.'-'.$item->emlaktype->name.'-'.$item->renttype->name); else $slug = 'merdekanda-evler-kiraye-alqisatqi-bagevi-villa'; ?>

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
