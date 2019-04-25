<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ServiceableRequests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $requests = ServiceableRequests::all();
        return view('admin.index', compact(["requests"]));
    }
}
