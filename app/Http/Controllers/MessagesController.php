<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\Category;
use Laracasts\Flash\Flash;
use Mail;
use GuzzleHttp\Client;

class MessagesController extends Controller
{
   
    
     public function index(Request $request)
    {
   
        
         $messages = Message::orderBy('id', 'DESC')->get();
         
        return view('admin.messages.index')->with('messages', $messages);
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
         
         
        
        
        
        $token = $request->input("g-recaptcha-response");
        
        if($token){
            
            $client = new Client();
           
          
            
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                'secret' => '6LdOQAcUAAAAADFQ350NWoZrJ7ihuDnX9LGHv9gQ',
                'response' => $token
                ]
            ]);
           
            
            $result = json_decode($response->getBody()->getContents());
             
            if($result->success){
                
                 $message = new Message($request->all());
        $message->message = $request->body;
         $message->save();
        
         $data = $request->all();
        
    
        
 
       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
       Mail::queue('emails.message', $data, function($messagee) use ($request)
       {
           //remitente
           $messagee->from($request->email, $request->name);
 
           //asunto
           $messagee->subject($request->subject);
 
           //receptor
           $messagee->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));
 
       });
        
        
         Flash::success("Mensaje enviado");
        
         return back();
                
                
            }else{
               Flash::success("No se pudo verificar el captcha");
            return back(); 
            }
            
        }else
        {
            Flash::success("No se pudo verificar el captcha");
            return back();
        }
        
        
       
  
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
