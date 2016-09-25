<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
   public function index(){
       
       if(Auth::user()->type == 'member'){
           
            //limpiar ordenes incompletas en caso de haberlas
            Order::cleanOrders(Auth::user()->shoppingCart);
            
            $Orders = Auth::user()->shoppingCart->orders()->get();
           
           return view('admin.users.home', ['Orders' => $Orders]);
           
       }else{
           
           return redirect('admin.index');
           
       }
       
       
   }
}
