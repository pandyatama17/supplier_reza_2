<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\EventOrder;
use App\User;

class EventController extends Controller
{
    public function storeEvent()
    {
      // dd(Input::all());
      $i = (object) Input::all();
      $eo = new EventOrder;

      // generate code
      $eo->code = strToUpper(generateRandomString());
      // regenerate code if exists
      if (EventOrder::where('code')->get() === $eo->code)
      {
        $eo->code = strToUpper(generateRandomString());
      }
      $eo->user_id = Auth::user()->id;
      $eo->event_id = $i->event_id;
      $eo->day_count = $i->day_count;
      $eo->pic_name = $i->pic_name;
      $eo->pic_phone = $i->pic_phone;
      $eo->event_date = $i->event_date;
      $eo->event_address = $i->event_address;
      $eo->description = $i->description;
      $eo->subtotal = $i->subtotal;

      try
      {
          $eo->save();
          return redirect("event/order/".$eo->code);
      }
      catch (\Exception $e)
      {
        return $e;
      }


    }
    public function showEvent($code)
    {
      $eo = EventOrder::where('code',$code)->first();
      if (null === $eo)
      {
        $pagin = (object)
        [
          'title'=>'Order Details',
          'pagin'=>'event',
          'steps'=> ['home','event','order','details']

        ];
        return view('event-not-found')
        ->with('pagin', $pagin);
      }
      else
      {
        $user = User::find($eo->user_id);
        $event = Event::find($eo->event_id);

        $pagin = (object)
        [
          'title'=>'Order Details',
          'pagin'=>'event',
          'steps'=> ['home','event','order','details']
        ];

        return view('event-order-details')
        ->with('eo', $eo)
        ->with('event', $event)
        ->with('user', $user)
        ->with('pagin', $pagin);
      }

    }
}
