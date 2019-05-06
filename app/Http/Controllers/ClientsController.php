<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\History;

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
    public function view($email){
        $client = Client::where("email", $email)->first();
        $history = History::where("client_id", $client['id'])->get()->all();
        return view('admin.clients.view', compact(["client","history"]));
    }
    public function edit($email){
        $client = Client::where("email", $email)->first();
        return view('admin.clients.edit', compact(["client"]));
    }
    public function store(){
        $request = request();
        if($request->input('password') != $request->input('confirm_password')){
            //TODO: ERROR PASSWORD MISMATCH
            return redirect('/clients');
        }
        $request['name'] = $request->input('first_name').' '.$request->input('last_name');
        $request['password'] = bcrypt($request->input('password'));
        if(Client::where('email',$request->input('email'))->first()){
            //TODO: EMAIL TAKEN
            return redirect('/clients');
        }else{
            Client::create($request->all());
            return redirect('/clients');
        }
    }
    public function update($email){
        switch(request('action')){
            case "authorize":
                $driver = Client::where('email',$email)->first();
                $driver->authenticated = true;
                $driver->save();
                return redirect('/clients');
                break;
            case "edit":
                $client = Client::where('email', $email)->first();
                $client->name = request('name');
                $client->email = request('email');
                $client->phone_number = request('phone_number');
                if(request('password') !== null){
                    if(request('password') == request('confirm_password')){
                        $client->bcrypt(request('password'));
                    }
                }
                $client->save();
                return redirect('/clients/' . $client['email']);
                break;
        }
    }
    
    public function destroy($email){
        $client = Client::where('email', $email)->get()->first();
        $client->delete();
        return redirect('/clients');
    }
}
