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
                    'fingerprint' => $request->cookie('fp'),
                    'active' => 1
            ]);
        }

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
            ->groupByRaw('price_id')
            ->where('sale_id', null)
            ->where('active' , 1)
            ->where('fingerprint', $request->cookie('fp'))
            ->get();

        $totals = $this->cart
            ->where('carts.fingerprint', $request->cookie('fp'))
            ->where('carts.active', 1)
            ->where('carts.sale_id', null)
            ->join('prices', 'prices.id', '=', 'carts.price_id')
            ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
            ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplicator) as total') )
            ->first();
        
        $sections = View::make('front.pages.purchase.index')
            ->with('carts', $carts)
            ->with('fingerprint', $request->cookie('fp'))
            ->with('base_total', $totals->base_total)
            ->with('tax_total', ($totals->total - $totals->base_total))
            ->with('total', $totals->total)
            ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]); 
   
    }

    public function plus($price_id, Request $request)
    {

        $cart = $this->cart->create([
            'price_id' => $price_id,
            'fingerprint' => $request->cookie('fp'),
            'active' => 1
        ]);


        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
            ->groupByRaw('price_id')
            ->where('sale_id', null)
            ->where('active' , 1)
            ->where('fingerprint', $request->cookie('fp'))
            ->get();

        $totals = $this->cart
            ->where('carts.fingerprint', $request->cookie('fp'))
            ->where('carts.active', 1)
            ->where('carts.sale_id', null)
            ->join('prices', 'prices.id', '=', 'carts.price_id')
            ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
            ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplicator) as total') )
            ->first();

        $sections = View::make('front.pages.purchase.index')
            ->with('carts', $carts)
            ->with('fingerprint', $request->cookie('fp'))
            ->with('base_total', $totals->base_total)
            ->with('tax_total', ($totals->total - $totals->base_total))
            ->with('total', $totals->total)
            ->renderSections();


        return response()->json([
            'content' => $sections['content'],
        ]); 

    }

    public function minus($price_id, Request $request)
    {

        $cart = $this->cart->where('fingerprint', $request->cookie('fp'))->where('price_id', $price_id)->where('active', 1)->first();
        $cart->active = 0;
        $cart->save();

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
            ->groupByRaw('price_id')
            ->where('sale_id', null)
            ->where('active' , 1)
            ->where('fingerprint', $request->cookie('fp'))
            ->get();

        $totals = $this->cart
            ->where('carts.fingerprint', $request->cookie('fp'))
            ->where('carts.active', 1)
            ->where('carts.sale_id', null)
            ->join('prices', 'prices.id', '=', 'carts.price_id')
            ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
            ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplicator) as total') )
            ->first();

        $sections = View::make('front.pages.purchase.index')
            ->with('carts', $carts)
            ->with('fingerprint', $request->cookie('fp'))
            ->with('base_total', $totals->base_total)
            ->with('tax_total', ($totals->total - $totals->base_total))
            ->with('total', $totals->total)
            ->renderSections();


        return response()->json([
            'content' => $sections['content'],
        ]); 

    }




}