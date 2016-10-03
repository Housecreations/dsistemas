<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use App\Article;

class ShoppingCartsController extends Controller
{   
    
  /*  public function eliminarcarritos(){
        
        $shoppingCarts = ShoppingCart::all();
        foreach($shoppingCarts as $shoppingCart){
            
            if(!$shoppingCart->user)
                $shoppingCart->delete();
            
        
        }
        
    }*/
    
    public function vaciar(){
        if(Auth::user()){
            $shopping_cart = Auth::user()->shoppingCart;
            $shopping_cart->articles()->detach();
        
      
    }else{
             $shopping_cart_id = \Session::get('shopping_cart_id');
            $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
             $shopping_cart->articles()->detach();
        }
    
        return back();
    }
    
    public function index(){
        
        if(Auth::user()){
           
 
            $shopping_cart = Auth::user()->shoppingCart;
            $articles = $shopping_cart->articles()->get();
                     
            $total = $shopping_cart->total();
            return view('shopping_carts.index', ['articles' => $articles, 'total' => $total]);
            
           
       }else{
         $shopping_cart_id = \Session::get('shopping_cart_id');
        
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
            
            $articles = $shopping_cart->articles()->get();
            $total = $shopping_cart->total();
            

             return view('shopping_carts.index', ['articles' => $articles, 'total' => $total]);
        
        }
        
       /*   $shopping_cart_id = \Session::get('shopping_cart_id');
        
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
        
        $paypal = new PayPal($shopping_cart);
        
        
        $payment = $paypal->generate();
        
        return redirect($payment->getApprovalLink());*/
        
        
        
        /*
        
        $products = $shopping_cart->products()->get();
        
        $total = $shopping_cart->total();
        
        return view('shopping_carts.index', ['products' => $products, 'total' => $total]);
        */
    }
}
