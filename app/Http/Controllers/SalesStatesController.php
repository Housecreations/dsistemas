<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SalesState;
use App\Category;
use App\SalesCountry;
use Laracasts\Flash\Flash;

class SalesStatesController extends Controller
{
    public function index($id){
        
        $states = SalesState::where('sales_country_id', '=', $id)->paginate(5);
        
        $categories = Category::all();
        
        return view('admin.salescountries.salesstates.index')->with('states', $states)->with('categories', $categories);
        
        
    }
    
    public function create($id){
        
        $categories = Category::all();
        $country = SalesCountry::find($id);
         return view('admin.salescountries.salesstates.create')->with('country', $country)->with('categories', $categories);
    }
    
    public function store(Request $request)
    {
          $state = new SalesState($request->all());
            
       $state->save();
         Flash::success("Estado registrado");
         $categories = Category::all();
         return redirect()->route('admin.salescountries.salesstates.index', $state->sales_country_id)->with('categories', $categories);
  
    }
    
    
    public function edit($id)
    {
      $state = SalesState::find($id);
       $categories = Category::all();
        return view('admin.salescountries.salesstates.edit')->with('state', $state)->with('categories', $categories);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
     
       $state = SalesState::find($id);
        $state->fill($request->all());
      
        
        $state->save();
        
        Flash::success('El estado se editó con éxito');
         $categories = Category::all();  
        return redirect()->route('admin.salescountries.salesstates.index', $state->sales_country_id)->with('categories', $categories);
    }
    
    
    
    public function destroy($id){
        $state = SalesState::find($id);
        
        $country_id = $state->sales_country_id;
        
        $state->delete();
        
        Flash::warning("Estado eliminado");
         $categories = Category::all();
         return redirect()->route('admin.salescountries.salesstates.index', $country_id)->with('categories', $categories);
        
    }
    
}
