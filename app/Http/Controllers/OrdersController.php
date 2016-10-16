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
use App\Config;

class OrdersController extends Controller
{
      public function __construct(){
        
        Carbon::setLocale('es');
    }
    
    
    public function index(){
        
        $orders = Order::latest()->orderBy('id', 'DESC')->paginate(5);
        $currency = Config::find(1);
      
           return view('orders.month', ['orders' => $orders, 'currency' => $currency->currency]);
    }
    
    public function showAll(Request $request){
        
        $orders = Order::search($request->name)->where('status', '!=', 'No pagada')->orderBy('id', 'DESC')->paginate(5);
         $currency = Config::find(1);
        return view('orders.index', ['orders' => $orders, 'currency' => $currency->currency]);
    }
    
    
  
    
     public function adminUpdate(Request $request, $id){
        
     $order = Order::find($id);
         
         $field = $request->name;
         $order->$field = $request->value;
         $order->save();
         
         if($order->guide_number && $order->status == "Enviado"){
        
        //email al usuario     
          Mailer::sendEmail($order);
             
            
             }
         
         
    }
}
