<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jemaat;
use App\Family;

class DashboardController extends Controller
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
        $countJemaat = Jemaat::count();
        $countFamily = Family::count();
        return view('admin.dashboard',["countJemaat"=>$countJemaat, "countFamily"=>$countFamily]);
    }

}
