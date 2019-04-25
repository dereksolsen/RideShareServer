<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $clients = Client::all();
        return view('admin.clients.index', compact(["clients"]));
    }
    public function create(){
        return view('admin.clients.create');
    }
    public function store(){
        $request = request();
        if($request->input('password') != $request->input('confirm_password')){
            //TODO: ERROR PASSWORD MISMATCH
        }
        $request['name'] = $request->input('first_name').' '.$request->input('last_name');
        $request['password'] = bcrypt($request->input('password'));
        if(Client::where('email',$request->input('email'))->first()){
            //TODO: EMAIL TAKEN
        }else{
            Client::create($request->all());
            return redirect('/clients');
        }
    }
}
