<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Http\Requests\Front\ProductCategoryRequest;

class ProductCategoryController extends Controller
{

    protected $product_category;

    public function __construct(ProductCategory $product_category)
    {
        $this->product_category = $product_category;
    }

    public function show(ProductCategory $category)
    {
        $view = View::make('front.pages.tickets.index')
            ->with('category', $category)
            ->with('products', $category->products->where("visible", 1));

        if(request()->ajax()) {
        
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
            
    }


}