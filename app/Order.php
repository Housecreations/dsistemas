<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['shopping_cart_id', 'customid', 'shipment_agency', 'shipment_agency_id', 'recipient_name', 'recipient_id', 'recipient_email', 'payment_id', 'edited', 'status', 'guide_number', 'total'];
    
    public static function cleanOrders($shoppingCart){
        $shoppingCart->orders()->where('status', '=', 'En proceso')->delete();
       /* Order::where('status', '=', 'En proceso')->delete();*/
    }
    
    public static function totalMonth(){
        return Order::monthly()->sum('total');
    }
    
    public static function orderCount(){
        return Order::monthly()->where('status', '=', 'Por procesar')->count();
    }
    
    public static function totalMonthCount(){
        return Order::monthly()->count();
    }
    
    public function scopeLatest($query){
        
        return $query->orderID()->monthly();
            
    }
    
    public function scopeOrderID($query){
        
      
        return $query->orderBy('id', 'desc');
    }
    
    public function scopeMonthly($query){
         
        return $query->whereMonth('created_at', '=', date('m'));
    }
    
    
    public function shoppingCart(){
        
        return $this->belongsTo('App\ShoppingCart');
        
    }
    
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
