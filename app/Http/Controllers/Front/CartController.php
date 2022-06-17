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

        $view = View::make('front.pages.purchase.index')
        ->with('products',  $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
        ->where('fingerprint', 1)
        ->groupByRaw('price_id')->get());

        
        // foreach($products as $product) {
        //     Debugbar::info($product->quantity);
        //     Debugbar::info($product->price->base_price);
        //     Debugbar::info($product->price->product->title);

        // }

        $sections = $view->renderSections(); 
    
        return response()->json([
            'content' => $sections['content'],
        ]); 
   
    }

}