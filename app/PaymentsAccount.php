<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentsAccount extends Model
{
    
    
    protected $table = "payments_accounts";
    
    protected $fillable = ['bank_name', 'bank_account_number', 'bank_account_type', 'owner_name', 'owner_id', 'owner_email'];
    
 
       
         
           
}
