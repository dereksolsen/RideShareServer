<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ServiceableRequests;
use App\Client;

class ServiceableRequestsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $requests = ServiceableRequests::all();
        return view('admin.requests.index', compact(["requests"]));
    }
    //
    public function create(){
        $clients = Client::all();
        return view('admin.requests.create', compact(["clients"]));
    }
}
