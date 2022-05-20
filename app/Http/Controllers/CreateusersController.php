<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
class CreateusersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin_dashboard');
    }
    public function handleAdmin()
    {
    	return view('admin_dashboard');
    	//return view('handleAdmin');
    }
    
    

}
