<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JPBlancoDB\MercadoPago\MercadoPago;
use App\ShoppingCart;
use App\Order;
use App\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PaymentsController extends Controller
{
    public function index(){
      
        
   /*$filters = array (
        "id" => null,
        "site_id" => null,
        "external_reference" => 4
    );*/
        /*$searchResult = MercadoPago::search_payment($filters);
        dd($searchResult);*/
        
       
/*$paymentInfo = MercadoPago::get_payment("2344613035");
 

       $a = MercadoPago::get_payment($paymentInfo['response']['collection']['id']);
        dd($a);
        */
        
    $shoppingCart = Auth::user()->shoppingCart;
        
        $items = [];
        
        foreach ($shoppingCart->articles as $article){
        $item = array_add([
            "title" => $article->name,
             "currency_id" => "VEF",
             "category_id" => $article->category->name,
             "quantity" => 1,
            
        ], 'unit_price', $article->price);
        
        array_push($items, $item);
      }
   
        
        
        $baseURL = url('/');
        
        $order = Order::create([
           
            'shopping_cart_id' => $shoppingCart->id,
            'total' => $shoppingCart->total()
            
        ]);

       foreach ($shoppingCart->articles as $article){
        
       $orderDetails = OrderDetails::create([
           
            'order_id' => $order->id,
            'name' => $article->name,
            'price' => $article->price
            
        ]);
           }
        
       
        
        $order->approve();
        
        $external_reference = $order->customid;
        
        $preference_data = array(
        "items" => $items,
        "back_urls" => array (
           
                "success" => "$baseURL/payments/success",
		        "failure" => "$baseURL/payments/fail",
		        "pending" => "$baseURL/payments/pending"
	
        ),
             "notification_url" => "$baseURL/payments/notifications",
             "external_reference" => $external_reference


    );

 
    
        
        try {
            $preference = MercadoPago::create_preference($preference_data);
            return redirect()->to($preference['response']['init_point']);
        } catch (Exception $e){
            dd($e->getMessage());
        }
        
        
    }
    
    public function fail(Request $request){
        
        dd($request);
        Order::where('customid', $request->external_reference)->delete();
      
        
         Flash::success('No se pudo procesar el pago, por favor intente nuevamente');
        
        return redirect('/carrito');
        
        
        
    }
     public function success(Request $request){
        
       
        $order = Order::where('customid', $request->external_reference)->first();
       
         if($order){
                $shopping_cart = Auth::user()->shoppingCart;
                $shopping_cart->articles()->detach();
                $order->payment_id = $request->collection_id;
                $order->save();
             return redirect('/home');
             
         }else{
             dd('Error, la orden no corresponde a ninguna registrada en nuestra base de datos');
         }
        
    }
    
}
