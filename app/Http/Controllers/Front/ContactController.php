<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\Front\ContactRequest;

class ContactController extends Controller
{

    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    
    public function index()
    {

        $view = View::make('front.pages.contacts.index');

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

    public function store(ContactRequest $request)
    {            

        $contact = $this->contact->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'surnames' => request('surnames'),
                'phone' => request('phone'),
                'email' => request('email'),
                'message' => request('message'),
                'visible' => 1,
                'active' => 1,
        ]);

        $sections = View::make('front.pages.contacts.index')->renderSections();        

        return response()->json([
            'content' => $sections['content'],
        ]);
    }
}
