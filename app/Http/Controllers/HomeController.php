<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TicketsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $t = new TicketsController();
        
        return $t->create();     // AGREGAR QUE REDIRECCIONAMIENTO SEGUN ROL
    }
}
