<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Order;

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
        
        Flash::success('Se ha actualizado la información de envío');
        
        return redirect('/home');
    }
     public function adminUpdate(Request $request, $id){
        
     $order = Order::find($id);
         
         $field = $request->name;
         $order->$field = $request->value;
         $order->save();
         
         return $order->$field;
         
    }
}
