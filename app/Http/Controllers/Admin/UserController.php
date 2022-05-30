<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use Debugbar;


class UserController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.users.index')
                ->with('user', $this->user)
                ->with('users', $this->user->where('active', 1)->get());
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

       $view = View::make('admin.pages.users.index')
        ->with('user', $this->user)
        ->renderSections();
        Debugbar::info($view['form']);

        return response()->json([
            'form' => $view['form']
        ]);
    }


    // para usar el validador tenemos que poner el objetoRequest que queramos usar 
    // dentro del método store
    public function store(UserRequest $request)
    {            
        

        $user = $this->user->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'email' => request('email'),
                'password' => request('password'),
                'active' => 1,
        ]);
            
        $view = View::make('admin.pages.users.index')
        // este with pasa dos variables a la vista html
        ->with('users', $this->user->where('active', 1)->get())
        ->with('user', $this->user)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $user->id,
        ]);
    }

    public function edit(User $user)
    {
        $view = View::make('admin.pages.users.index')
        ->with('user', $user)
        ->with('users', $this->user->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
        
        return $view;
    }

    public function show(User $user){

    }

    public function destroy(User $user)
    {
        $user->active = 0;
        $user->save();

        $view = View::make('admin.pages.users.index')
            ->with('user', $this->user)
            ->with('users', $this->user->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}