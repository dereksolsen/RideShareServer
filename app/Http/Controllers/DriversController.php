<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\History;

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
        $history = History::where("driver_id", $driver['id'])->get()->all();
        return view('admin.drivers.view', compact(["driver","history"]));
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
    
    public function update($email){
        switch(request('action')){
            case "edit":
                $driver = Driver::where('email', $email)->first();
                $driver->name = request('name');
                $driver->email = request('email');
                $driver->phone_number = request('phone_number');
                if(request('password') !== null){
                    if(request('password') == request('confirm_password')){
                        $driver->bcrypt(request('password'));
                    }
                }
                $driver->save();
                return redirect('/drivers/' . $driver['email']);
                break;
        }
    }
    
    public function destroy($email){
        $driver = Driver::where('email', $email)->get()->first();
        $driver->delete();
        return redirect('/drivers');
    }
}
