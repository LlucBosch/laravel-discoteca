<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Http\Requests\Admin\ProductCategoryRequest;
use Debugbar;

class ProductCategoryController extends Controller
{
    protected $product_category;

    public function __construct(ProductCategory $product_category)
    {
        $this->product_category = $product_category;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.product_categories.index')
                ->with('category', $this->product_category)
                ->with('categories', $this->product_category->where('active', 1)->get());
                
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

       $view = View::make('admin.pages.product_categories.index')
        ->with('category', $this->product_category)
        ->renderSections();
        Debugbar::info($view['form']);

        return response()->json([
            'form' => $view['form']
        ]);
    }


    // para usar el validador tenemos que poner el objetoRequest que queramos usar 
    // dentro del método store
    public function store(ProductCategoryRequest $request)
    {            

        $category = $this->product_category->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'title' => request('title'),
                'visible' => 1,
                'active' => 1,
        ]);
            
        $view = View::make('admin.pages.product_categories.index')
        // este with pasa dos variables a la vista html
        ->with('categories', $this->product_category->where('active', 1)->get())
        ->with('category', $this->product_category)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $category->id,
        ]);
    }

    public function edit(ProductCategory $category)
    {
        $view = View::make('admin.pages.product_categories.index')
        ->with('category', $category)
        ->with('categories', $this->product_category->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
        
        return $view;
    }

    public function show(ProductCategory $category){

    }

    public function destroy(ProductCategory $category)
    {
        $category->active = 0;
        $category->save();

        $view = View::make('admin.pages.product_categories.index')
            ->with('category', $this->product_category)
            ->with('categories', $this->product_category->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}