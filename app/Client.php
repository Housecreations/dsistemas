<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";
    
    protected $fillable = ['name', 'logo_url', 'message'];
 
    public function scopeSearch($query, $name){
    
    return $query->where('name', 'LIKE', "%$name%");
    
}
    
}
