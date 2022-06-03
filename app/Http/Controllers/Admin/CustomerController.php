<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\Admin\CustomerRequest;
use Debugbar;


class CustomerController extends Controller
{

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.customers.index')
                ->with('customer', $this->customer)
                ->with('customers', $this->customer->where('active', 1)->get());
                
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }

        return $view;
    }

    public function create()
    {

       $view = View::make('admin.pages.customers.index')
        ->with('customer', $this->customer)
        ->renderSections();
        Debugbar::info($view['form']);

        return response()->json([
            'form' => $view['form']
        ]);
    }


    // para usar el validador tenemos que poner el objetoRequest que queramos usar 
    // dentro del método store
    public function store(CustomerRequest $request)
    {            
        

        $customer = $this->customer->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'surnames' => request('surnames'),
                'phone' => request('phone'),
                'email' => request('email'),
                'city' => request('city'),
                'postalcode' => request('postalcode'),
                'direction' => request('direction'),
                'visible' => 1,
                'active' => 1,
        ]);
            
        $view = View::make('admin.pages.customers.index')
        // este with pasa dos variables a la vista html
        ->with('customers', $this->customer->where('active', 1)->get())
        ->with('customer', $customer)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $customer->id,
        ]);
    }

    public function edit(Customer $customer)
    {
        $view = View::make('admin.pages.customers.index')
        ->with('customer', $customer)
        ->with('customers', $this->customer->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
        
        return $view;
    }

    public function show(Customer $customer){

    }

    public function destroy(Customer $customer)
    {
        $customer->active = 0;
        $customer->save();

        $view = View::make('admin.pages.customers.index')
            ->with('customer', $this->customer)
            ->with('customers', $this->customer->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}