<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['shopping_cart_id', 'shipment_info', 'edited', 'status', 'guide_number', 'total'];
    
    
   
    
    public function orderDetails(){
        
        return $this->hasMany('App\OrderDetails');
        
    } 
}
