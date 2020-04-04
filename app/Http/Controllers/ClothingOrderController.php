<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use App\Event;
use App\EventOrder;
use App\User;
use App\Clothing;
use App\ClothingOrder;
use App\ClothingOrderDetail;
use Image;

class ClothingOrderController extends Controller
{
  public function removeFromCart($index)
  {
    $cart = session()->get('cart');
      if(isset($cart[$index]))
      {
          unset($cart[$index]);
          session()->put('cart', $cart);

      }
      return redirect()->back()->with('success', 'Product removed from cart successfully!');
  }
  public function addToCartForm()
  {
    $i = (object) Input::all();
    // return $i->item_id;
    $image = Input::file('file');
    $thumbnailImage = Image::make($image);
    $thumbnailPath = public_path().'/thumbnail/';
    $originalPath = public_path().'/img/clothing_orders/cart_caches/';
    $imgname = time().'.jpg';
    $thumbnailImage->save($originalPath.$imgname);
    $item = Clothing::find($i->item_id);

    $cart = session()->get('cart');
    // if cart is empty then this the first product
    if(null == $cart)
    {
      $cart_id = 1;
      $cart =
      [
        $cart_id =>
        [
          // "id" => $cart_id,
          "item_id" => $i->item_id,
          "per_unit_qty" => $i->per_unit_qty,
          "per_dozen_qty" => $i->per_dozen_qty,
          "per_score_qty" => $i->per_score_qty,
          "screening_type" => $i->screening_type,
          "size" => $i->size,
          "imgname" => $imgname,
        ]
      ];
      try
      {
        session()->put('cart', $cart);
        return redirect('/cart');
        // $arr = array('err'=>false,$item->name.' added to cart!','redirect'=>$item->id);
        // echo json_encode($arr);
      }
      catch (\Exception $e)
      {
        $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($e));
        echo json_encode($arr);
      }
    }
    else {
      // $cart_id = end($cart)['id'];
      $id = count($cart) + 1;
      $cart[$id] =
      [
          // "id" => $cart_id + 1,
          "item_id" => $i->item_id,
          "per_unit_qty" => $i->per_unit_qty,
          "per_dozen_qty" => $i->per_dozen_qty,
          "per_score_qty" => $i->per_score_qty,
          "screening_type" => $i->screening_type,
          "size" => $i->size,
          "imgname" => $imgname,
      ];
      try
      {
        session()->put('cart', $cart);
        return redirect('/cart');
        // $arr = array('err'=>false,$item->name.' added to cart!','redirect'=>$item->id);
        // echo json_encode($arr);
      }
      catch (\Exception $e)
      {
        $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($e));
        echo json_encode($arr);
      }
    }
  }
    public function storeOrder()
    {
      $i = (object) Input::all();
      $originalPath = public_path().'/img/clothing_orders/cart_caches/';
      $savePath = public_path().'/img/clothing_orders/';

      $o = new ClothingOrder;
      // generate code
      $o->code = strToUpper(generateRandomString());
      // regenerate code if exists
      if (ClothingOrder::where('code')->get() === $o->code)
      {
        $o->code = strToUpper(generateRandomString());
      }
      $o->user_id = Auth::user()->id;
      $o->phone = $i->phone;
      $o->address = $i->address;
      $o->subtotal = $i->subtotal;
      $o->fees = 0;
      $o->total = $i->subtotal;
// dd($i);
      try
      {
        $o->save();

        $cartSession = Session::get('cart');
        foreach ($cartSession as $cart)
        {
          $od = new ClothingOrderDetail;
          $od->parent_id = $o->id;
          $od->item_id = $cart['item_id'];
          $od->per_unit_qty = $cart['per_unit_qty'];
          $od->per_dozen_qty = $cart['per_dozen_qty'];
          $od->per_score_qty = $cart['per_score_qty'];
          $od->total_qty = $cart['per_unit_qty'] + ($cart['per_dozen_qty'] * 12) + ($cart['per_score_qty'] * 24);
          $od->subtotal = $i->subtotal;
          $od->size = $cart['size'];
          $od->screening_type = $cart['screening_type'];

          $od->save();
          rename($originalPath.$cart['imgname'], $savePath.$od->id.'.jpg');
        }
        Session::forget('cart');
        $file = new Filesystem;
        $file->cleanDirectory(public_path().'/img/clothing_orders/cart_caches');
        return redirect('/clothing/order/'.$o->code);
        // $arr = array('err'=>false,'msg'=>'Order #'.$o->id.' Created!','redirect'=>$o->id);
  			// echo json_encode($arr);
      }
      catch (\Exception $e)
      {
        return $e->getMessage();
        $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($e));
  			echo json_encode($arr);
      }
    }
    public function showOrder($code)
    {
      $co = ClothingOrder::where('code',$code)->first();
      if (null === $co)
      {
        $pagin = (object)
        [
          'title'=>'Order Details',
          'pagin'=>'clothing',
          'steps'=> ['home','clothing','order','details']

        ];
        return view('event-not-found')
        ->with('pagin', $pagin);
      }
      else
      {
        $user = User::find($co->user_id);
        $clothing_order_details = ClothingOrderDetail::where('parent_id',$co->id)->get();

        $pagin = (object)
        [
          'title'=>'Order Details',
          'pagin'=>'clothing',
          'steps'=> ['home','clothing','order','details']
        ];

        return view('clothing-order-details')
        ->with('co', $co)
        ->with('clothing_order_details', $clothing_order_details)
        ->with('user', $user)
        ->with('pagin', $pagin);
      }
    }
    public function clean()
    {
      $file = new Filesystem;
      $file->cleanDirectory(public_path().'/img/clothing_orders/cart_caches');
    }
}
