<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;

class DriversController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $drivers = Driver::all();
        return view('admin.drivers.index', compact(["drivers"]));
    }
    public function create(){
        return view('admin.drivers.create');
    }
    public function view($email){
        $driver = Driver::where('email', $email)->first();
        return view('admin.drivers.view', compact(["driver"]));
    }
    public function edit($email){
        $driver = Driver::where('email', $email)->first();
        return view('admin.drivers.edit', compact(["driver"]));
    }
    public function store(){
        $request = request();
        if($request->input('password') != $request->input('confirm_password')){
            //TODO: ERROR PASSWORD MISMATCH
        }
        $request['name'] = $request->input('first_name').' '.$request->input('last_name');
        $request['password'] = bcrypt($request->input('password'));
        if(Driver::where('email',$request->input('email'))->first()){
            //TODO: EMAIL TAKEN
        }else{
            Driver::create($request->all());
            return redirect('/drivers');
        }
    }
    
    
    public function destroy($email){
        $driver = Driver::where('email', $email)->get()->first();
        $driver->delete();
        return redirect('/drivers');
    }
}
