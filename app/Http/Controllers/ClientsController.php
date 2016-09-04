<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use App\Category;
use App\Http\Requests\ClientRequest;
use Laracasts\Flash\Flash;
use App\Image;


class ClientsController extends Controller
{
     public function index(Request $request)
    {
         $clients = Client::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
        $categories = Category::all();
        return view('admin.clients.index')->with('clients', $clients)->with('categories', $categories);
    }
      public function create()
    {
       

        $categories = Category::all();
       
     return view('admin.clients.create')->with('categories', $categories);
        
    }
    
      public function edit($id)
    {
       $client = Client::find($id);
          

        $categories = Category::all();
       
     return view('admin.clients.edit')->with('categories', $categories)->with('client', $client);
        
    }
    
    
     public function destroy($id)
    {
          $client = Client::find($id);
        $client->delete();
        
        Flash::error('El cliente ' . $client->name. ' ha sido eliminado');
        $clients = Client::all();  
        return redirect()->route('admin.clients.index')->with('clients', $clients);
         
    }
    
     public function show()
    {
         
    
        $clients = Client::all();
         $categories = Category::all();
        return view('admin.clients.show')->with('clients', $clients)->with('categories', $categories);
         
    }
    
    
    
    
    
  
    
     public function store(ClientRequest $request)
    {
        
        
        if($request->file('image')){
            
                    $file = $request->file('image');
        $name = 'Dsistemas_' .time(). "." . $file->getClientOriginalExtension();
        $path = 'images/clients/';
        $file->move($path, $name);
        }
 $client = new Client($request->all());
     
      $client->logo_url = $name;
       
        
     $client->save();
      
    
         Flash::success("Cliente registrado");
        $categories = Category::all();
         return redirect()->route('admin.clients.index')->with('categories', $categories);
        
    }
    
    
    public function update(Request $request, $id)
    {
      
           $client = Client::find($id);
        $client->fill($request->all());
        
        
         if($request->file('image')){
            
                    $file = $request->file('image');
        $name = 'Dsistemas_' .time(). "." . $file->getClientOriginalExtension();
        $path = 'images/clients/';
        $file->move($path, $name);
             
            unlink(public_path()."\images\clients\\".$client->logo_url);
             
             $client->logo_url = $name;
        }
        
       
        
        $client->save();
        
        Flash::success('El cliente se editó con éxito');
        
         $categories = Category::all();
            return redirect()->route('admin.clients.index')->with('categories',$categories);
      
    }
    
}
