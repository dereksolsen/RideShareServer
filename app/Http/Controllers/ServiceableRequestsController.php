<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ServiceableRequests;
use App\Client;
use App\History;

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
    public function store(Request $request){
        ServiceableRequests::create($request->all());
        
        return redirect('/requests/');

    }
    public function history(){
        $requests = History::all();
        return view('admin.requests.history.index', compact(["requests"]));
    }
    
    public function destroy($id){
        $request = ServiceableRequests::where('id', $id)->get()->first();
        $request->delete();
        return redirect('/requests');
    }
    public function edit($id){
        $clients = Client::all();
        $request = ServiceableRequests::where("id", $id)->first();
        return view('admin.requests.edit', compact(["request","clients"]));
    }
    
    public function update($id){
                $request = ServiceableRequests::where('id', $id)->first();
                $request->client_id = request('client_id');
                $request->pick_up_address = request('pick_up_address');
                $request->destination_address = request('destination_address');
                $request->estimated_length = request('estimated_length');
                $request->time = request('time');
                $request->date = request('date');
                $request->save();
                return redirect('/requests/');
    }
}
