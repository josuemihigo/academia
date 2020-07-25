<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function apropos(){
        return view('clientacceuil');

    }
    public function faq(){
        return view('faq');

    }
    public function blog(){
        return view('blog');

    }
    public function contact(){
        return view('contact');
    }
    public function login(){
        return view('auth/login');
    }



}
