<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['shopping_cart_id', 'customid', 'shipment_agency', 'shipment_agency_id', 'recipient_name', 'recipient_id', 'recipient_email', 'edited', 'status', 'guide_number', 'total'];
    
    
    public function approve(){
        
        $this->updateCustomIDAndStatus('approve');
        
    }
    public function fail(){
        
        $this->updateCustomIDAndStatus('fail');
        
    }
   
    public function generateCustomID(){
        
        return md5("$this->id $this->updated_at");
    }
    
    public function updateCustomIDAndStatus($result){
        if($result == 'approve')
        $this->status = 'En proceso';
        else
        $this->status = 'Por pagar';
        
        $this->customid = $this->generateCustomID();
        $this->save();
    }
    
    public function orderDetails(){
        
        return $this->hasMany('App\OrderDetails');
        
    } 
}
