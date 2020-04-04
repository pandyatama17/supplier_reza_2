<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Item;
use App\Categories;
use App\Rental;
use App\RentalDetails;
use App\Functions;

class PurchasementController extends Controller
{
    public function checkout()
    {
      $categories = Categories::all();
      $pagin = [
        'title'=>'Checkout',
        'steps' =>
            [[
              'step'=>'Home',
              'link'=>' / '
            ],
            [
              'step'=>'Cart',
              'link'=>' /cart '
            ],
            [
            'step'=>'Checkout',
            'link'=>'/checkout'
            ]]
      ];

      return view('checkout')
      ->with('categories', $categories)
      ->with('pagin', $pagin);
    }
    public function store()
    {
      function generateRandomString($length = 12)
      {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
      }
      // dd(Session::get('cart'));
      $i = (object) Input::all();

      $p = new Rental;
      $p->code = generateRandomString();
      $p->subtotal = $i->subtotal;
      $p->name = $i->name;
      $p->address = $i->address;
      $p->zipcode = $i->zipcode;
      $p->phone = $i->phone;
      $p->subtotal = $i->subtotal;
      $p->fees = 0;
      $p->total = $i->subtotal;

      // dd(Session::get('cart'));
      try
      {
        $p->save();

        $count = 0;
        foreach (Session::get('cart') as $cart)
        {
          $pd = new RentalDetails;
          $pd->parent_id = $p->id;
          $pd->item_id = $cart['id'];
          $pd->qty = $cart['quantity'];
          $pd->save();
        }
        Session::forget('cart');
        return redirect('rental/'.$p->id);
        $arr = array('err'=>false,'msg'=>'Order #'.$p->code.' Created!','redirect'=>$p->id);
  			echo json_encode($arr);
      }
      catch (\Exception $e)
      {
        $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($p));
  			echo json_encode($arr);
      }
    }
    public function show($id)
    {
      $p = Rental::find($id);
      $categories = Categories::all();
      $details = RentalDetails::where('parent_id', $id)->get();
      return view('rental')->with('rental', $p)->with('categories', $categories)->with('details', $details);
    }
}
