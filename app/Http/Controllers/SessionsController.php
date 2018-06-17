<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // Tenta autenticar o usuário

        if(! auth()->attempt(request(['email','password'])))
        {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }
        // $userSigned = auth()->attempt([
        //     'email'=>request('email'),
        //     'password'=>bcrypt('password')
        // ]);
        
        // if(!$userSigned){
        //     return back();
        // }

        return redirect()->home();

    }

    public function destroy(){
        auth()->logout();

        return redirect()->home();
    }
}