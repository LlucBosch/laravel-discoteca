<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// use App\Models\Home;
// use App\Http\Requests\Front\HomeRequest;

class HomeController extends Controller
{

    protected $home;
    
    public function index()
    {

        $view = View::make('front.pages.home.index');

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}