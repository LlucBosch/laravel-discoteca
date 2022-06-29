<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Debugbar;


class SaleController extends Controller
{

    protected $sale;

    public function __construct(Sale $sale,Cart $cart)
    {
        $this->sale = $sale;
        $this->cart = $cart;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.sales.index')
                ->with('sale', $this->sale)
                ->with('sales', $this->sale->where('active', 1)->get());
                
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }

        return $view;
    }

    // public function create()
    // {

    //    $view = View::make('admin.pages.sales.index')
    //     ->with('sale', $this->sale)
    //     ->renderSections();
    //     Debugbar::info($view['form']);

    //     return response()->json([
    //         'form' => $view['form']
    //     ]);
    // }


    // public function show(Sale $sale){
        
    // }

    public function edit(Sale $sale)
    {

        $carts = $this->cart->select(DB::raw('count(price_id) as quantity'),'price_id')
            ->groupByRaw('price_id')
            ->where('sale_id', $sale->id)
            ->where('active' , 1)
            ->where('fingerprint', 1)
            ->get();

        

        $view = View::make('admin.pages.sales.index')
        ->with('sale', $sale)
        ->with('sales', $this->sale->where('active', 1)->get())
        ->with('carts', $carts);   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
        
        return $view;
    }

    public function destroy(Sale $sale)
    {
        $sale->active = 0;
        $sale->save();

        $view = View::make('admin.pages.sales.index')
            ->with('sale', $this->sale)
            ->with('sales', $this->sale->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}