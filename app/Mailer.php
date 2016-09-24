<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;

class Mailer extends Model
{
    public static function sendMail($fromname, $frommail, $subject, $body, $mailtemplate, $mailto, $nameto){
        
          $array = [
                    "name" => $fromname,
                    "email" => $frommail,
                    "subject" => $subject,
                    "body" => $body
                   
                    ];
             
                	
                $requests = new Request();
               
                $requests->name = $fromname;
                $requests->email = $frommail;
                $requests->subject = $subject;
                $requests->body = $body;
                
                
                $data = $array;
              
                //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
                Mail::send($mailtemplate, $data, function($messagee) use ($requests, $mailto, $nameto)
                {
                    
                    //remitente
                    $messagee->from($requests->email, $requests->name);

                    //asunto
                    $messagee->subject($requests->subject);
 
                    //receptor
                    $messagee->to($mailto, $nameto);
 
            });
        
    }
}
