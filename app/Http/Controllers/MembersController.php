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
           
           $Orders = Auth::user()->shoppingCart->orders()->get();
           
          
           
           return view('admin.users.home', ['Orders' => $Orders]);
           
       }else{
           
           return redirect('admin.index');
           
       }
       
       
   }
}
