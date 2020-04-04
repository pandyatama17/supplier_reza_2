<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Event;
use App\User;
use App\Clothing;
use App\ScreeningType;

class HomeController extends Controller
{
    public function home()
    {
      $gallery = Gallery::take(5)->get();
      $pagin = (object)
      [
        'title'=>'Home',
        'pagin'=>'home',
        'steps'=> ['home'.'home']
      ];
      return view('index')
      ->with('gallery', $gallery)
      ->with('pagin', $pagin);

    }
    public function gallery()
    {
      $gallery = Gallery::all();
      $cats = Gallery::distinct()->get(['category']);
      $pagin = (object)
      [
        'title'=>'Gallery',
        'pagin'=>'gallery',
        'steps'=> ['home', 'gallery']
      ];

      return view('gallery')
      ->with('gallery', $gallery)
      ->with('categories', $cats)
      ->with('pagin', $pagin);
    }
    public function singleGallery($id)
    {
      $gallery = Gallery::find($id);
      $cats = Gallery::distinct()->get(['category']);
      $pagin = (object)
      [
        'title'=>'Gallery',
        'pagin'=>'gallery',
        'steps'=> ['home', 'gallery',$gallery->title]
      ];

      return view('gallery_single')
      ->with('gallery', $gallery)
      ->with('categories', $cats)
      ->with('pagin', $pagin);
    }
    public function events()
    {
      $events = Event::all();
      $pagin = (object)
      [
        'title'=>'Events',
        'pagin'=>'events',
        'steps'=> ['home', 'events']
      ];

      return view('events')
      ->with('events', $events)
      ->with('pagin', $pagin);
    }
    public function event($id)
    {
      $event = Event::find($id);
      $pagin = (object)
      [
        'title'=>'Events',
        'pagin'=>'events',
        'steps'=> ['home', 'events', $event->name]
      ];

      return view('event')
      ->with('e', $event)
      ->with('pagin', $pagin);
    }
    public function clothing()
    {
      $clothings = Clothing::all();
      $st = ScreeningType::all();
      $pagin = (object)
      [
        'title'=>'Events',
        'pagin'=>'clothing',
        'steps'=> ['home', 'clothing']
      ];

      return view('clothing')
      ->with('clothings', $clothings)
      ->with('st', $st)
      ->with('pagin', $pagin);
    }
    public function cart()
    {
      $pagin = (object)
      [
        'title'=>'Events',
        'pagin'=>'cart',
        'steps'=> ['home', 'cart']
      ];

      return view('cart')
      ->with('pagin', $pagin);
    }
}
