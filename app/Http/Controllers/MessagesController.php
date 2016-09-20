<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\Category;
use Laracasts\Flash\Flash;
class MessagesController extends Controller
{
   
    
     public function index(Request $request)
    {
     $categories = Category::all();
        
         $messages = Message::all();
         
        return view('admin.messages.index')->with('categories', $categories)->with('messages', $messages);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
   
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
          $message = new Message($request->all());
       
         $message->save();
         Flash::success("Mensaje enviado");
         $categories = Category::all();
         return redirect()->route('contact');
  
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $message = Message::find($id);
        $message->read = 'yes';
        $message->save();
        $categories = Category::all();
        
        return view('admin.messages.show')->with('message', $message);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       
        $message = Message::find($id);
        $message->delete();
        
        Flash::error('El mensaje ha sido eliminado');
        
        
        $categories = Category::all();  
        return redirect()->route('admin.messages.index');
    }
    
    
    
    
}
