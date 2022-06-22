<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Price;
// use App\Http\Requests\Admin\SaleRequest;
use Debugbar;


class SaleController extends Controller
{

    protected $sale;

    public function __construct(Sale $sale, Price $price)
    {
        $this->sale = $sale;
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
        $view = View::make('admin.pages.sales.index')
        ->with('sale', $sale)
        ->with('sales', $this->sale->where('active', 1)->get());   
        
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