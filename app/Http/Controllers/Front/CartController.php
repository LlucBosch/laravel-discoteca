<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Debugbar;


class CartController extends Controller
{

    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    
    public function index()
    {

        $view = View::make('front.pages.purchase.index');

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

    // para usar el validador tenemos que poner el objetoRequest que queramos usar 
    // dentro del método store
    public function store(Request $request)
    {            

        $quantity = $request->input('quantity');

        for ($i = 1; $i <= $quantity; $i++) {
            
                $cart = $this->cart->create([
                    'price_id' => request('price_id'),
                    'fingerprint' => '1',
                    'active' => 1
            ]);
        }


        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
            ->groupByRaw('price_id')
            ->where('fingerprint', 1)
            ->get();


        $sections = View::make('front.pages.purchase.index')
        ->with('carts', $carts)
        ->with('fingerprint', $cart->fingerprint)
        ->renderSections();

    
        return response()->json([
            'content' => $sections['content'],
        ]); 
   
    }

    public function plus(Request $request)
    {

        $cart = $this->cart->create([
            'price_id' => request('price_id'),
            'fingerprint' => '1',
            'active' => 1
    ]);



        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->groupByRaw('price_id')
        ->where('fingerprint', 1)
        ->get();


        $sections = View::make('front.pages.purchase.index')
        ->with('carts', $carts)
        ->with('fingerprint', $cart->fingerprint)
        ->renderSections();


        return response()->json([
            'content' => $sections['content'],
        ]); 

    }



}