<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JPBlancoDB\MercadoPago\MercadoPago;
use App\ShoppingCart;
use App\Order;
use App\Message;
use App\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Mail;
	
use Illuminate\Support\Collection as Collection;

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
        
        $articlesNoRepeat = $shoppingCart->articles->distinct();
        dd($articlesNoRepeat);
        
        $items = [];
        
        foreach ($shoppingCart->articles as $article){
            
            if($article->stock > 0){
                
                $item = array_add([
                        "title" => $article->name,
                        "currency_id" => "VEF",
                        "category_id" => $article->category->name,
                        "quantity" => 1],
                    'unit_price', $article->price);

                array_push($items, $item);
            
            }else{
                Order::cleanOrders();
                Flash::success('El artículo '. $article->name . ' está agotado');
                return back();
                
            }
        }
   
        Order::cleanOrders();
        
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
                $order->status = 'Por procesar';
                $order->save();
             
             
                $array = [
                    "name" => "House Creations",
                    "email" => "info@housecreations.com",
                    "subject" => "Orden en proceso",
                    "body" => "Hemos recibido su pago #$order->payment_id, recuerde actualizar la información del envío"
                    ];
             
                	
                $requests = new Request();
               
                $requests->name = "House Creations";
                $requests->email = "info@housecreations.com";
                $requests->subject = "Orden en proceso";
                $requests->body = "Hemos recibido su pago #$order->payment_id, recuerde actualizar la información del envío";
                
                $data = $array;
              
                //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
                Mail::send('emails.message', $data, function($messagee) use ($requests)
                {
                    
                    //remitente
                    $messagee->from($requests->email, $requests->name);

                    //asunto
                    $messagee->subject($requests->subject);
 
                    //receptor
                    $messagee->to(Auth::user()->email, Auth::user()->name);
 
            });
             
             
             
             
             return redirect('/home');
             
         }else{
             dd('Error, la orden no corresponde a ninguna registrada en nuestra base de datos');
         }
        
    }
    
}
