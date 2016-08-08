<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SalesSite;
use App\Category;
use App\SalesState;
use Laracasts\Flash\Flash;

class SalesSitesController extends Controller
{
     public function index($id){
        
        $sites = SalesSite::where('sales_state_id', '=', $id)->paginate(5);
        $state = SalesState::find($id);
        $categories = Category::all();
        
        return view('admin.salescountries.salesstates.salessites.index')->with('sites', $sites)->with('categories', $categories)->with('state', $state);
        
        
    }
    
    public function create($id){
        
        $categories = Category::all();
        $state = SalesState::find($id);
         return view('admin.salescountries.salesstates.salessites.create')->with('state', $state)->with('categories', $categories);
    }
    
     public function store(Request $request)
    {
          $site = new SalesSite($request->all());
            
       $site->save();
         Flash::success("Tienda registrada");
         $categories = Category::all();
         return redirect()->route('admin.salescountries.salesstates.salessites.index', $site->sales_state_id)->with('categories', $categories);
  
    }
    
}
