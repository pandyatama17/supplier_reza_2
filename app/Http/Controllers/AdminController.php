<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use App\Gallery;
use App\Event;
use App\EventOrder;
use App\Clothing;
use App\ClothingOrder;
use App\ClothingOrderDetail;
use Image;

class AdminController extends Controller
{
    public function showClothingOrders()
    {
      $data = ClothingOrder::all();
      return view('admin.clothing-orders')
        ->with('clothing_orders', $data)
        ->with('pagin', [
          'title'=>'ClothingOrders',
          'subtitle'=>'All Rental Data',
          'steps' => ['ClothingOrders','All ClothingOrders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showPendingClothingOrders()
    {
      $data = ClothingOrder::where('confirm_start',0)->where('confirm_finish',0)->get();
      return view('admin.clothing-orders')
        ->with('clothing_orders', $data)
        ->with('pagin', [
          'title'=>'Pending Clothing Orders',
          'subtitle'=>'Pending Orders',
          'steps' => ['ClothingOrders','Pending Clothing Orders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showConfirmedClothingOrders()
    {
      $data = ClothingOrder::where('confirm_start',1)->where('confirm_finish',0)->get();
      return view('admin.clothing-orders')
        ->with('clothing_orders', $data)
        ->with('pagin', [
          'title'=>'Finished Clothing Orders',
          'subtitle'=>'Finished Orders',
          'steps' => ['ClothingOrders','Finished Clothing Orders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showFinishedClothingOrders()
    {
      $data = ClothingOrder::where('confirm_start',0)->where('confirm_finish',1)->get();
      return view('admin.clothing-orders')
        ->with('clothing_orders', $data)
        ->with('pagin', [
          'title'=>'Confirmed Clothing Orders',
          'subtitle'=>'Confirmed Orders',
          'steps' => ['ClothingOrders','CConfirmed Clothing Orders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showClothings()
    {
      $data = Clothing::all();
      return view('admin.clothings')
        ->with('clothings', $data)
        ->with('pagin', [
          'title'=>'All Clothings',
          'subtitle'=>'All Clothings Data',
          'steps' => ['Clothing Orders','All Clothings'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function addClothing()
    {
      $data = Categories::all();
      return view('admin.clothing_form')
        ->with('categories', $data)
        ->with('pagin', [
          'title'=>'Add Clothing',
          'subtitle'=>'Add New Clothing',
          'steps' => ['Clothing','Add Clothing'],
          'icon'=>'fa fa-Clothing-cart'
        ]);
    }
    public function editClothing($id)
    {
      $clothing = Clothing::find($id);
      $data = Categories::all();
      return view('admin.clothing_form')
        ->with('categories', $data)
        ->with('clothing', $clothing)
        ->with('pagin', [
          'title'=>'Edit Clothing',
          'subtitle'=>'Edit Existing Clothing',
          'steps' => ['Clothing','Edit Clothing'],
          'icon'=>'fa fa-Clothing-cart'
        ]);
    }
    public function storeClothing()
    {
      $r = (object) Input::all();
      $i = new Clothing;

      $i->name = $r->name;
      $i->type = $r->type;
      $i->price = $r->price;
      $i->description = $r->description;

      $i->save();

      return redirect('/admin/clothings');
    }
    public function updateClothing()
    {
      $r = (object) Input::all();
      $i = Clothing::find($r->id);

      $i->name = $r->name;
      $i->type = $r->type;
      $i->price = $r->price;
      $i->description = $r->description;

      $i->save();

      return redirect('/admin/clothings');
    }
    public function deleteClothing($id)
    {
      $i = Clothing::find($id);
      $i->delete();
      return redirect('/admin/clothings');
    }
    public function confirmClothingOrder($id)
    {
      $l = ClothingOrder::find($id);

      $l->confirm_start = 1;

      $l->save();

      return redirect('/admin/clothing_orders');
    }
    public function finishClothingOrder($id)
    {
      $l = ClothingOrder::find($id);

      $l->confirm_start = 1;
      $l->confirm_finish = 1;

      $l->save();

      return redirect('/admin/clothing_orders');
    }
    public function showEventOrders()
    {
      $data = EventOrder::all();
      return view('admin.event-orders')
        ->with('event_orders', $data)
        ->with('pagin', [
          'title'=>'EventOrders',
          'subtitle'=>'All Event Orders',
          'steps' => ['EventOrders','All EventOrders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showPendingEventOrders()
    {
      $data = EventOrder::where('confirm_start',0)->where('confirm_finish',0)->get();
      return view('admin.event-orders')
        ->with('event_orders', $data)
        ->with('pagin', [
          'title'=>'Pending Event Orders',
          'subtitle'=>'Pending Orders',
          'steps' => ['EventOrders','Pending Event Orders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showConfirmedEventOrders()
    {
      $data = EventOrder::where('confirm_start',1)->where('confirm_finish',0)->get();
      return view('admin.event-orders')
        ->with('event_orders', $data)
        ->with('pagin', [
          'title'=>'Finished Event Orders',
          'subtitle'=>'Finished Orders',
          'steps' => ['EventOrders','Finished Event Orders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function showFinishedEventOrders()
    {
      $data = EventOrder::where('confirm_start',0)->where('confirm_finish',1)->get();
      return view('admin.event-orders')
        ->with('event_orders', $data)
        ->with('pagin', [
          'title'=>'Confirmed Event Orders',
          'subtitle'=>'Confirmed Orders',
          'steps' => ['EventOrders','Confirmed Event Orders'],
          'icon'=>'fa fa-shopping-cart'
        ]);
    }
    public function confirmEventOrder($id)
    {
      $l = EventOrder::find($id);

      $l->confirm_start = 1;

      $l->save();

      return redirect('/admin/bookings');
    }
    public function finishEventOrder($id)
    {
      $l = EventOrder::find($id);

      $l->confirm_start = 1;
      $l->confirm_finish = 1;

      $l->save();

      return redirect('/admin/bookings');
    }
    public function addGallery()
    {
      $cats = Gallery::distinct()->get(['category']);
      return view('admin.gallery-add')
        ->with('categories', $cats)
        ->with('pagin', [
          'title'=>'Add Gallery Item',
          'subtitle'=>'Add New Gallery Item',
          'steps' => ['Gallery','Add Gallery Item'],
          'icon'=>'fa fa-image'
        ]);
    }
    public function storeGallery()
    {
      $r = (object) Input::all();
      $g = new Gallery;

      $g->title = $r->title;
      $g->description = $r->description;
      $g->date = $r->date;
      $g->category = $r->category;
      $g->photographer = $r->photographer;
      $g->tags = $r->tags;
      $g->save();

      $image = Input::file('file');
      $thumbnailImage = Image::make($image);
      $originalPath = public_path().'/img/gallery/';
      $imgname = $g->id.'.jpg';
      $thumbnailImage->save($originalPath.$imgname);


      return redirect('/gallery/'.$g->id);
    }
}
