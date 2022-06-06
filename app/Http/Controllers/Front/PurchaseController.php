<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// use App\Models\Purchase;
// use App\Http\Requests\Front\PurchaseRequest;

class PurchaseController extends Controller
{

    protected $purchase;
    
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

}