<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Category extends Model implements SluggableInterface
{
    
    use SluggableTrait;
    
    protected $sluggable = [
        
        'build_from' => 'name',
        'save_to' => 'slug'
        
    ];
    
    
     protected $table = "categories";
    
    protected $fillable = ['name', 'gender'];
    
    public function articles(){
        
        return $this->hasMany('App\Article');
    }
    
     public function files(){
        
        return $this->hasMany('App\File');
    }
    
    public function scopeSearch($query, $name){
    
    return $query->where('name', 'LIKE', "%$name%");
    
}
    
    public static function categories($gender){
  
        
       
        return Category::where('gender','=', $gender)->get();
      
    }
    
}
