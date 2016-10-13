<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Order;
use Mail;
use App\Mailer;
use Carbon\Carbon;

class OrdersController extends Controller
{
      public function __construct(){
        
        Carbon::setLocale('es');
    }
    
    
    public function index(){
        
        $orders = Order::latest()->orderBy('id', 'DESC')->paginate(5);
      
      
           return view('orders.month', ['orders' => $orders]);
    }
    
    public function showAll(Request $request){
        
        $orders = Order::search($request->name)->where('status', '!=', 'No pagada')->orderBy('id', 'DESC')->paginate(5);
      
        return view('orders.index', ['orders' => $orders]);
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
         
         
    }
}
