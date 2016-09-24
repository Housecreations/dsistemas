<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Order;
use Mail;
use App\Mailer;

class OrdersController extends Controller
{
    public function index(){
        
        $orders = Order::latest()->get();
      
        return view('orders.index', ['orders' => $orders]);
    }
    
    public function show($id){
        
        $order = Auth::user()->shoppingCart->orders()->where('customid', '=', $id)->first();
        if($order)
        return view('orders.update', ['order' => $order]);
        else{
            Flash::success('No se ha encontrado la orden');
            return redirect('/home');
        }
    }
    
    public function update(Request $request){
        
       
        $order = Auth::user()->shoppingCart->orders()->where('customid', '=', $request->orders)->first();
        $order->shipment_agency = $request->shipment_agency;
        $order->shipment_agency_id = $request->shipment_agency_id;
        $order->recipient_name = $request->recipient_name;
        $order->recipient_id = $request->recipient_id;
        $order->recipient_email = $request->recipient_email;
        $order->edited = 'yes';
        $order->save();
          
        //Email al usuario
        Mailer::sendMail("House Creations", "info@housecreations.com", "Orden en proceso de verificación", "Los datos del envío fueron actualizados. Su orden se encuentra en proceso de verificación", "emails.message", $order->shoppingCart->user->email, $order->shoppingCart->user->email);
        
        $base_url = url("/");
        //Email al administrador  
        Mailer::sendMail("House Creations", "info@housecreations.com", "Compra realizada", "Se ha realizado una compra, puede revisar la orden en el siguiente link: $base_url/admin/orders", "emails.message", env("CONTACT_MAIL"), env("CONTACT_NAME"));
             
        Flash::success('Se ha actualizado la información de envío');
        
        return redirect('/home');
    }
    
     public function adminUpdate(Request $request, $id){
        
     $order = Order::find($id);
         
         $field = $request->name;
         $order->$field = $request->value;
         $order->save();
         
         if($order->guide_number && $order->status == "Enviado"){
        
        //email al usuario     
          Mailer::sendMail("House Creations", "info@housecreations.com", "Orden enviada", "
          La orden #$order->payment_id ha sido enviada a través de $order->shipment_agency con código $order->shipment_agency_id bajo el número de guía $order->guide_number. 
          ", "emails.sendOrderEmail", $order->shoppingCart->user->email, $order->shoppingCart->user->name);
             
            
             }
         else{
            
         }
         
    }
}
