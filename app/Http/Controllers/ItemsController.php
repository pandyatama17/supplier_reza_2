<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Item;
use App\Categories;


class ItemsController extends Controller
{
    public function index()
    {
      $items = Item::all();
      $categories = Categories::all();
      $pagin = [
        'title'=>'All Products',
        'steps' =>
            [[
              'step'=>'Home',
              'link'=>' / '
            ],
            [
            'step'=>'Products','link'=>'/products'
            ]]
      ];

      return view('index')
      ->with('items', $items)
      ->with('categories', $categories)
      ->with('pagin', $pagin);
    }

    public function products()
    {
      $items = Item::all();
      $categories = Categories::all();
      $pagin = [
        'title'=>'All Products',
        'steps' =>
            [[
              'step'=>'Home',
              'link'=>' / '
            ],
            [
            'step'=>'Products','link'=>'/products'
            ]]
      ];

      return view('products')
      ->with('items', $items)
      ->with('categories', $categories)
      ->with('pagin', $pagin);
    }

    public function category($data)
    {
      $items = Item::where('type', $data)->get();
      $categories = Categories::all();
      $pagin = [
        'title'=>$data,
        'steps' =>
            [[
              'step'=>'Home',
              'link'=>' / '
            ],
            [
            'step'=>'Products','link'=>'/products'
            ],
            [
            'step'=>$data,'link'=>'/category/ '.$data
            ]]
      ];

      return view('products')
      ->with('items', $items)
      ->with('categories', $categories)
      ->with('pagin', $pagin);
    }

    public function product($id)
    {
      $item = Item::find($id);
      $categories = Categories::all();
      $pagin = [
        'title'=>$id,
        'steps' =>
            [[
              'step'=>'Home',
              'link'=>' / '
            ],
            [
            'step'=>'Products','link'=>'/products'
            ],
            [
            'step'=>$id,'link'=>'/category/ '.$id
            ]]
      ];

      return view('product')
      ->with('item', $item)
      ->with('categories', $categories)
      ->with('pagin', $pagin);
    }
    public function showCart()
    {
      $items = Item::all();
      $categories = Categories::all();
      $pagin = [
        'title'=>"My Cart",
        'steps' =>
            [[
              'step'=>'Home',
              'link'=>' / '
            ],
            [
            'step'=>'Shopping Cart','link'=>'/cart'
            ]]
      ];

      return view('cart')
      ->with('items', $items)
      ->with('categories', $categories)
      ->with('pagin', $pagin);
    }
    public function addToCart($id)
    {
        $item = Item::find($id);
        if(!$item)
        {
            abort(404);
        }
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart)
        {
          $cart =
          [
            $id =>
            [
              'id'=>$item->id,
              "name" => $item->name,
              "quantity" => 1,
              "price" => $item->price,
            ]
          ];

          session()->put('cart', $cart);
          return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] =
        [
          'id'=>$item->id,
          "name" => $item->name,
          "quantity" => 1,
          "price" => $item->price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
    public function removeFromCart($data)
    {
      $cart = session()->get('cart');
        if(isset($cart[$data]))
        {
            unset($cart[$data]);
            session()->put('cart', $cart);

        }
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
    public function addToCartForm()
    {
      $item = Item::find(Input::get('id'));
      $qty = Input::get('qty');

      $cart = session()->get('cart');
      // if cart is empty then this the first product
      if(!$cart)
      {
        $cart =
        [
          Input::get('id') =>
          [
            'id'=>$item->id,
            "name" => $item->name,
            "quantity" => $qty,
            "price" => $item->price,
          ]
        ];
        try
        {
          session()->put('cart', $cart);
          $arr = array('err'=>false,'msg'=>$qty.' item(s) of '.$item->name.' added to cart!','redirect'=>$item->id);
  				echo json_encode($arr);
        }
        catch (\Exception $e)
        {
          $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($d));
  				echo json_encode($arr);
        }
      }

      // if cart not empty then check if this product exist then increment quantity
      if(isset($cart[Input::get('id')]))
      {
          $cart[Input::get('id')]['quantity'] = $qty;

          try
          {
            session()->put('cart', $cart);
            $arr = array('err'=>false,'msg'=>$qty.' item(s) of '.$item->name.' added to cart!','redirect'=>$item->id);
    				echo json_encode($arr);
          }
          catch (\Exception $e)
          {
            $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($d));
    				echo json_encode($arr);
          }
      }
      elseif (!isset($cart[Input::get('id')]))
      {
        $cart[Input::get('id')] =
        [
          'id'=>$item->id,
          "name" => $item->name,
          "quantity" => $qty,
          "price" => $item->price,
        ];
        try
        {
          session()->put('cart', $cart);
          $arr = array('err'=>false,'msg'=>$qty.' item(s) of '.$item->name.' added to cart!','redirect'=>$item->id);
  				echo json_encode($arr);
        }
        catch (\Exception $e)
        {
          $arr = array('err'=>true,'msg'=>'Invalid Proccess.'.json_encode($d));
  				echo json_encode($arr);
        }
      }
      // if item not exist in cart then add to cart with quantity = 1

    }
}
