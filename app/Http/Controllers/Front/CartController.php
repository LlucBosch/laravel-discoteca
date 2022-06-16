<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Http\Requests\Front\CartRequest;
use Debugbar;


class CartController extends Controller
{

    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }


    // para usar el validador tenemos que poner el objetoRequest que queramos usar 
    // dentro del método store
    public function store(CartRequest $request)
    {            
        

        $cart = $this->cart->create([
                'id' => request('id')],[
                'price_id' => request('price_id'),
                'fingerprint_id' => request('fingerprint_id'),
                'active' => 1
        ]);
            
        // $view = View::make('admin.pages.carts.index')
        // // este with pasa dos variables a la vista html
        // ->with('carts', $this->cart->where('active', 1)->get())
        // ->with('cart', $this->cart)
        // ->renderSections();        

        // return response()->json([
        //     'table' => $view['table'],
        //     'form' => $view['form'],
        //     'id' => $cart->id,
        // ]);
    }

}