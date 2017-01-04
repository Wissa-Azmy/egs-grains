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

    public function addPort(Request $request){

        $portId = $request->portId;

        if($portId){
            $port = Port::find($portId);
            $port->update($request->all());
        }
        else{
            $port = new Port();

            $port->name = $request->name;

            $port->save();
        }

        $ports = Port::all();

        return response()->json(['ports' => $ports], 200);
    }
    
    public function loadSubports(Request $request){
        $input = $request->portId;
        $port = Port::find($input);

        $subports = $port->subports->unique();
        return response()->json(['subports' => $subports], 200);
    }
    
    public function deletePort(Request $request){
        $portId = $request->portId;
        $port = Port::find($portId);
        
        $port->delete();
        
        $ports = Port::all();
        
        return response()->json(['ports' => $ports], 200);
    }
    
    //
}
