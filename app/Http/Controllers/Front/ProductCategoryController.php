<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Http\Requests\Front\ProductCategoryRequest;
use Debugbar;



class ProductCategoryController extends Controller
{

    protected $productCategory;

    public function __construct(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }


    public function products()
    {
        
        $products = Post::find(1)->products;

        foreach ($products as $product) {
            
            $product = Post::find(1)->products()->first();

        }
        
        return $products;
    }

    public function filter(ProductCategory $productCategory)
    {
        //aqui se filtra por categoria
        $view = View::make('front.pages.tickets.index')
            ->with('productCategory', $productCategory)
            ->with('products', $productCategory->products()->where("active", 1)->where("visible", 1)->get());

            if(request()->ajax()) {
            
                $sections = $view->renderSections(); 
        
                return response()->json([
                    'content' => $sections['content'],
                ]); 
            }

        return $view;


    }


}