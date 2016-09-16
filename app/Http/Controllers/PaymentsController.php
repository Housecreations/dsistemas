<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JPBlancoDB\MercadoPago\MercadoPago;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function index(){
      
    $shopping_cart = ShoppingCart::find(Auth::user()->shopping_cart_id);

        $baseURL = url('/');
        
         $preference_data = array(
        "items" => array(
            array(
                "title" => "Arroz",
                "currency_id" => "VEF",
                "category_id" => "Category",
                "quantity" => 1,
                "unit_price" => 10.2
            )
           
        ),
        "back_urls" => array (
           
                "success" => "$baseURL/payments/success",
		        "failure" => "$baseURL/payments/fail",
		        "pending" => "$baseURL/payments/pending"
	
        ),
             "notification_url" => "$baseURL/payments/notifications",
             "external_reference" => "4"


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
        
        
        
    }
     public function success(Request $request){
        
        dd($request);
        
        
        
    }
    
}
