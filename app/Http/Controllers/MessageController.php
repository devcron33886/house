<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserMessageRequest;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        
        return view('contact');

    }

    public function store(StoreUserMessageRequest $request)
    {
        $message=Message::create($request->all());
        return redirect()->route('contact')->with('message','Your Message is well received thanks!');
    }
    
}
