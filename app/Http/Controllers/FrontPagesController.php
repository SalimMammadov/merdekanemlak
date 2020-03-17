<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\ItemList;
use App\Blog;
use App\Message;
use Validator;
use Carbon\Carbon;
use DateTimeZone;
use DateTime;
use Auth;
use App\Agent;
use App\Search;
use Image;
use App\Help;
class FrontPagesController extends Controller
{

    public function index()
    {
      $items=ItemList::where('approve',true)->orderBy('id','desc')->take(12)->get();
      $vipitems=ItemList::where('approve',true)->where('vip',true)->orderBy('id','desc')->take(8)->get();

      $sliders=Slider::orderBy('order','asc')->get();
      return view('frontend.index')->withSliders($sliders)->withItems($items)->withVipitems($vipitems);
    }


    public function search(Request $request)
    {



      $data=$request->all();
      if(isset($request->city)){

      foreach($request->city as $city){

        $search = new Search();
        $search->city = $city;
        $search->room=$request->room;
        $search->minprice=$request->minprice;
        $search->maxprice=$request->maxprice;
        $search->floor=$request->floor;
        $search->max_ground_size=$request->max_ground_size;
        $search->min_ground_size= $request->min_ground_size;
        $search->area_size=$request->area_size;
        $search->type=$request->type;
        $search->save();

      // $search =Search::create([
      //   'city'=> $city,
      //   'room' =>$request->room,
      //   'minprice' => $request->minprice,
      //   'maxprice' => $request->maxprice,
      //   'floor' => $request->floor,
      //   'max_ground_size' =>$request->max_ground_size,
      //   'min_ground_size' =>$request->min_ground_size,
      //   'area_size' => $request->area_size,
      //   'type=' =>$request->type
      // ]);
    }
  }

      $items=ItemList::where('id','>',0);


        if(!$request->order == null)
        {
          $items->where('rent_type',$request->order);
        }

        if(!$request->type == null)
        {
            $items->where('emlak_type','=',$request->type);
        }

        if(!$request->room == null)
        {
          $items->where('room_count','=',$request->room);
        }

        if(!$request->minprice == null)
        {
            $max=ItemList::max('price');
            $items->whereBetween('price', [$request->minprice, $max]);

        }

         if(!$request->maxprice == null)
        {
            $min=ItemList::min('price');
            $items->whereBetween('price', [$min, $request->maxprice]);

        }


        if(!$request->floor == null)
        {
          $items->where('floor_count','=',$request->floor);
        }


        if(!$request->min_ground_size == null)
        {
            $max_ground=ItemList::max('ground_size');
            $items->whereBetween('ground_size', [$request->min_ground_size, $max_ground]);

        }

        if(!$request->max_ground_size == null)
       {
           $min_ground=ItemList::min('ground_size');
           $items->whereBetween('ground_size', [$min_ground, $request->max_ground_size]);

       }

        if(!$request->area_size == null)
        {

          $items->where('area_size','=',$request->area_size);

        }

        if(!$request->city == null)
        {

          $items->whereIn('region_id', $request->city);

        }
            $result=$items->get();
       $items=$items->paginate(16);
       $vipitems=ItemList::where('approve',true)->where('vip',true)->orderBy('id','desc')->take(4)->get();
        return  view('frontend.properties_search')->withItems($items)->withData($data)->withVipitems($vipitems)->withResult($result)->withRequest($request->all());
    }




    public function blog()
    {
      $vipitems=ItemList::where('approve',true)->where('vip',true)->get();
      $blogs=Blog::where('status',1)->paginate(3);
      return view('frontend.blog')->withBlogs($blogs)->withVipitems($vipitems);
    }

    public function blog_single($id)
    {
        $vipitems=ItemList::where('approve',true)->where('vip',true)->get();
      $blog=Blog::find($id);
            return view('frontend.blog_single')->withBlog($blog)->withVipitems($vipitems);
    }



    public function properties(Request $request)
    {
      $items=ItemList::where('approve',true)->orderBy('id','desc')->paginate(4);
        $vipitems=ItemList::where('approve',true)->where('vip',true)->orderBy('id','desc')->take(8)->get();
        if ($request->ajax()) {
$view = view('frontend.data',compact('items'))->render();
return response()->json(['html'=>$view]);


    }
    return view('frontend.properties')->withItems($items)->withVipitems($vipitems);
  }


    public function properties_order(Request $request)
    {
        return $request->order;
    }


      public function properties_single($id)
      {

        $item=ItemList::find($id);

        return view('frontend.properties_single')->withItem($item);
      }


    public function contact()
    {
      return view('frontend.contact');
    }


    public function contact_submit(Request $request)
    {

      $this->validate($request,[
        'email'=>'required|email|max:255',
        'name'=>'required|max:255',
        'message'=>'required',
        'telephone'=>'required',
      ]);

      Message::create($request->all());
      return redirect()->back()->withSuccess('Mesajınız göndərildi ! Sağolun');

    }

    public function about()
    {
      $agents=Agent::all();
      return view('frontend.about')->withAgents($agents);
    }


    public function add()
    {
      return view('frontend.add');
    }


    public function add_submit(Request $request)
    {

          $this->validate($request,[
            'image_url.*' =>'required|max:10240|mimes:jpg,jpeg,png',
            'main_image' =>'required|max:10240|mimes:jpg,jpeg,png',
            'description'=>'required|min:42',
            'emlak_type' =>'required',
            'rent_type' =>'required',
            'region_id'=>'required',
            'customer_name'=>'required',
            'customer_surname' => 'required',
            'customer_tel' =>'required'
          ]);

      $itemlist=new ItemList();
      $UTC=new DateTimeZone("UTC");
      $newTZ=new DateTimeZone('Asia/Baku');
      $date=new DateTime(Carbon::now(),$UTC);
      $date->setTimeZone($newTZ);
      $path='/public/item-lists/'.$date->format('FY');
      if($request->hasfile('image_url'))
         {
            foreach($request->file('image_url') as $image)
            {


                  $thumbpath='item-lists/'.$date->format('FY');

                  $filenamewithextension = $image->getClientOriginalName();

               //get filename without extension
               $filename = md5($request->address);

               //get file extension
               $extension = $image->getClientOriginalExtension();

               //filename to store
               $filenametostore = $filename.time().'.'.$extension;

               //small thumbnail name
               $smallthumbnail = $filename.time().'-small.'.$extension;

               //medium thumbnail name
               $mediumthumbnail = $filename.time().'-medium.'.$extension;

               //large thumbnail name
               $cropped = $filename.time().'-cropped.'.$extension;


               //Upload File
              $image->storeAs('/public/'.$thumbpath, $filenametostore);
              $image->storeAs('/public/'.$thumbpath, $smallthumbnail);
              $image->storeAs('/public/'.$thumbpath, $mediumthumbnail);
              $image->storeAs('/public/'.$thumbpath, $cropped);
               //create small thumbnail
               $images_data[] = 'item-lists/'.$date->format('FY').'/'.$filenametostore;

               $smallthumbnailpath = public_path('storage/'.$thumbpath.'/'.$smallthumbnail);
               $this->createThumbnail($smallthumbnailpath, 250, 140);

               $mediumthumbnailpath = public_path('storage/'.$thumbpath.'/'.$mediumthumbnail);
                $this->createThumbnail($mediumthumbnailpath, 500, 300);
                //create large thumbnail

                $largethumbnailpath = public_path('storage/'.$thumbpath.'/'.$cropped);
                $this->createThumbnail($largethumbnailpath, 300, 250);



            }

          }
         if($request->hasfile('main_image'))
            {

              $thumbpath='item-lists/'.$date->format('FY');

              $filenamewithextension = $request->file('main_image')->getClientOriginalName();

           //get filename without extension
           $filename = sha1($request->address);

           //get file extension
           $extension = $request->file('main_image')->getClientOriginalExtension();

           //filename to store
           $filenametostore = $filename.time().'.'.$extension;

           //small thumbnail name
           $smallthumbnail = $filename.time().'-small.'.$extension;

           //medium thumbnail name
           $mediumthumbnail = $filename.time().'-medium.'.$extension;

           //large thumbnail name
           $cropped = $filename.time().'-cropped.'.$extension;


           //Upload File
           $request->file('main_image')->storeAs('/public/'.$thumbpath, $filenametostore);
           $request->file('main_image')->storeAs('/public/'.$thumbpath, $smallthumbnail);
           $request->file('main_image')->storeAs('/public/'.$thumbpath, $mediumthumbnail);
           $request->file('main_image')->storeAs('/public/'.$thumbpath, $cropped);
           //create small thumbnail
           $smallthumbnailpath = public_path('storage/'.$thumbpath.'/'.$smallthumbnail);
           $this->createThumbnail($smallthumbnailpath, 250, 140);

           $mediumthumbnailpath = public_path('storage/'.$thumbpath.'/'.$mediumthumbnail);
            $this->createThumbnail($mediumthumbnailpath, 500, 300);

            //create large thumbnail
            $largethumbnailpath = public_path('storage/'.$thumbpath.'/'.$cropped);
            $this->createThumbnail($largethumbnailpath, 300, 250);

            $itemlist->main_image='item-lists/'.$date->format('FY').'/'.$filenametostore;

            }

     //  $token = "";
     //  $codeAlphabet.= "0123456789";
     //  $max = strlen($codeAlphabet);
     //
     // for ($i=0; $i < 8; $i++) {
     //     $token .= $codeAlphabet[random_int(0, $max-1)];
     // }

         $itemlist->rent_type=$request->rent_type;
         $itemlist->emlak_type=$request->emlak_type;
         $itemlist->region_id=$request->region_id;
         $itemlist->room_count=$request->room_count;
         $itemlist->area_size=$request->area_size;
         $itemlist->floor_count=$request->floor_count;
         $itemlist->price=$request->price;
         $itemlist->address=$request->address;
         $itemlist->description=$request->description;
         $itemlist->ground_size=$request->ground_size;
         $itemlist->image_url=json_encode($images_data);
         $itemlist->approve=false;
         $itemlist->customer_name=$request->customer_name;
         $itemlist->customer_tel=$request->customer_tel;
         $itemlist->customer_surname=$request->customer_surname;
         $itemlist->customer_email=$request->customer_email;
         // $itemlist->itemNO = $token;
         $itemlist->save();
         return redirect()->back()->withSuccess('Elan qeydə alındı.Təsdiq olunduqdan sonra dərc olunacaq');
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height)->save($path);
    }



      public function services()
      {
        $services=Help::all();
        return view('frontend.services')->withServices($services);
      }


}
