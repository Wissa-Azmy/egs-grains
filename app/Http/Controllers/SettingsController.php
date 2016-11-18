<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Port;

class SettingsController extends Controller
{
    
    public function view(){
        
        $ports = Port::all();
        return view('settings.main', compact('ports'));
    }
    
    //
}
