<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;
// use App\Http\Requests\Front\CheckoutRequest;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{

    protected $cart;
    protected $customer;
    protected $sale;
    
    public function __construct(Cart $cart, Customer $customer, Sale $sale)
    {
        $this->cart = $cart;
        $this->customer = $customer;
        $this->sale = $sale;
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

        // $date = date('ymd');
        // $num = $date.str_pad($ticket->num, 6, "0");

       
            
   
        $ticket_number = $this->sale->latest()->first()->ticket_number;

        if(str_contains($ticket_number, date('ymd'))) {
            $ticket_number += 1;
        } else { 
            $ticket_number = date('ymd') . '0001';
        }

        $sale = $this->sale->create([
            'customer_id' => $customer->id,
            'date_emission' => date('y-m-d'),
            'time_emission' => date("H:i:s"),
            'ticket_number' => $ticket_number,
            'total_base_price' => request('total_base_price'),
            'total_tax_price' => request('total_tax_price'),
            'total_price' => request('total_price'),
            'payment_method_id' => request('payment_method_id'),
            'active' => 1
        ]);

        $cart = $this->cart
        ->where('fingerprint', request('fingerprint'))
        ->where('sale_id', null)
        ->where('active', 1)
        ->update(['sale_id' => $sale->id]);
        

        $sections = View::make('front.pages.saled.index')
            ->renderSections();

        return response()->json([
            'content' => $sections['content'],
        ]); 
    }

}