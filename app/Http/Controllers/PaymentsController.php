<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JPBlancoDB\MercadoPago\MercadoPago;
use App\ShoppingCart;
use App\Order;
use App\Message;
use App\OrderDetails;
use App\InShoppingCart;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Mail;
use App\Mailer;
	
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
        
        
       
        
        $items = [];
        
        foreach ($shoppingCart->articles as $article){
            
         /*   $articlesCount = InShoppingCart::where("shopping_cart_id","=", $shoppingCart->id)->where("article_id", "=", $article->id)->groupBy("article_id")->count();
       */
            $articlesCount = $shoppingCart->articles()->where("article_id", "=", $article->id)->groupBy("article_id")->count();
          
            if($article->stock >= $articlesCount){
                
                $item = array_add([
                        "title" => $article->name,
                        "currency_id" => "VEF",
                        "category_id" => $article->category->name,
                        "quantity" => 1],
                    'unit_price', $article->price);

                array_push($items, $item);
            
            }else{
                
                
                Flash::success('No hay suficiente disponibilidad del artículo '. $article->name);
                return back();
                
            }
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
        
       
        Order::where('customid', $request->external_reference)->delete();
      
        
         Flash::success('No se pudo procesar el pago, por favor intente nuevamente');
        
        return redirect('/carrito');
        
        
        
    }
     public function success(Request $request){
        
        
        $paymentInfo = MercadoPago::get_payment($request->collection_id);
      

         //Si el order_id de la respuesta de MP es igual al de la url
        if($paymentInfo['response']['collection']['order_id'] == $request->external_reference){ 
         
         
         $order = Order::where('customid', $request->external_reference)->first();
       
         if($order){
             
                if($order->received == "no"){
                    
                    $order->status = 'Por procesar';
                    $order->received = "yes";
                    $order->payment_id = $request->collection_id;
                    $order->save();
                    
                    $shopping_cart = Auth::user()->shoppingCart;
                    
                    
                   
                    foreach($shopping_cart->articles as $article){
                        
                        $article->stock = $article->stock - 1;
                        $article->save();
                   
                        
                    }
                    
                    $shopping_cart->articles()->detach();
                    
             
                    Mailer::sendMail("House Creations", "info@housecreations.com", "Orden en proceso", "Hemos recibido su pago #$order->payment_id, recuerde actualizar la información del envío", "emails.message", $order->shoppingCart->user->email, $order->shoppingCart->user->name);
                
                
                }
                return redirect('/home');
                
         }else{
             
                Flash::success('Error, la orden no corresponde a ninguna registrada en nuestra base de datos');
                return redirect('/home');
         
         }
     }else{
            
            Flash::success('Error en la orden');
             return redirect('/home');
        
        }
        
    }
    
}
