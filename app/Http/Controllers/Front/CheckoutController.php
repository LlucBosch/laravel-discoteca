<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
// use App\Http\Requests\Front\CheckoutRequest;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{

    protected $checkout;
    protected $cart;
    protected $customer;
    
    public function __construct(Cart $cart, Customer $customer)
    {
        $this->cart = $cart;
        $this->customer = $customer;
    }

    public function index($fingerprint)
    {

        $totals = $this->cart
            ->where('carts.fingerprint', $fingerprint)
            ->where('carts.active', 1)
            ->where('carts.sale_id', null)
            ->join('prices', 'prices.id', '=', 'carts.price_id')
            ->join('taxes', 'taxes.id', '=', 'prices.tax_id')
            ->select(DB::raw('sum(prices.base_price) as base_total'), DB::raw('sum(prices.base_price * taxes.multiplicator) as total') )
            ->first();

        $view = View::make('front.pages.checkout.index')
            ->with('fingerprint', $fingerprint)
            ->with('base_total', $totals->base_total)
            ->with('tax_total', ($totals->total - $totals->base_total))
            ->with('total', $totals->total);

            
        $sections = $view->renderSections(); 

        return response()->json([
            'content' => $sections['content'],
        ]); 

        return $view;
    }

    public function store(Request $request)
    {            
        
        $customer = $this->customer->create([
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'adress' => request('adress'),
            'postal_code' => request('postal_code'),
            'city' => request('city'),
            'active' => 1
        ]);

        

        $sections = View::make('front.pages.saled.index')
            ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]); 
    }

}