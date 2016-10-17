<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Shipment;
use App\Config;
use App\ShoppingCart;
use Laracasts\Flash\Flash;

class ConfigsController extends Controller
{
  public function index(){
      
    
      
    return view('admin.config.index', ['shipments' => Shipment::orderBy('id', 'DESC')->get(), 'config' => Config::all()->first(), 'noUserCartsCount' => ShoppingCart::noUserCartsCount()]);  
      
  }
    
    public function changeEmails(Request $request){
        if($request->ajax()){
        $config = Config::find(1);
        $config->sender_email = $request->sender_email;
        $config->receiver_email = $request->receiver_email;
        $config->save();
        
        return response()->json(['texto' => 'Correos actualizados']);
        
        }
        Flash::success('Se han actualizado los correos');
        return redirect()->route('admin.index');
        
    }
    
     public function changeStatus(Request $request)
    {   //ocultar o mostrar el artículo
         if($request->ajax()){
                
             $config = Config::all()->first();
            
             if($config->active == 'yes'){
                
                 $config->active = 'no';
                 $config->save();
             
                 return response()->json(['clase'=>'button-on button-off', 'texto' => 'Tienda inactiva' ]);
                                  
                    
             }else{
                 
                  $config->active = 'yes';
                 $config->save();
             
                 return response()->json(['clase' => 'button-on', 'texto' => 'Tienda activa']);
                        
            }
         }
    }
    
    
}
