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
       
        return view('admin.clients.index')->with('clients', $clients);
         
    }
    
      public function create()
    {
       
        return view('admin.clients.create');
        
    }
    
      public function edit($id)
    {
        $client = Client::find($id);
          
        return view('admin.clients.edit')->with('client', $client);
        
    }
    
    
     public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        
        Flash::error('El cliente ' . $client->name. ' ha sido eliminado');
        
       
        
        return redirect()->route('admin.clients.index');
         
    }
    
     public function show()
    {
        
        $clients = Client::all();
        
        return view('admin.clients.show')->with('clients', $clients);
         
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
       
         return redirect()->route('admin.clients.index');
        
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
                
                //eliminar la imagen
                unlink(public_path()."\images\clients\\".$client->logo_url);
             
                $client->logo_url = $name;
            }
        
            $client->save();
        
            Flash::success('El cliente se editó con éxito');
        
       
            return redirect()->route('admin.clients.index');
      
    }
    
}
