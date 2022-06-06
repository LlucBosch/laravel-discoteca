<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// use App\Models\Checkout;
// use App\Http\Requests\Front\CheckoutRequest;

class CheckoutController extends Controller
{

    protected $checkout;
    
    public function index()
    {

        $view = View::make('front.pages.checkout.index');

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}