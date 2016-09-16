<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
   public function index(){
       
       if(Auth::user()->type == 'member'){
           
           
           
           return view('admin.users.home');
           
       }else{
           
           return redirect('admin.index');
           
       }
       
       
   }
}
