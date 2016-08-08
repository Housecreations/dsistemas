<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Article extends Model implements SluggableInterface
{
    use SluggableTrait;
    
    protected $sluggable = [
        
        'build_from' => 'name',
        'save_to' => 'slug'
        
    ];
    
    protected $table = "articles";
    
    protected $fillable = ['name', 'description', 'category_id', 'ondiscount', 'stock', 'discount', 'price'];
    
     public function category(){
        
        return $this->belongsTo('App\Category');
    }
    
   public function images(){
        
        return $this->hasMany('App\Image');
    }
    
    
    public function scopeSearch($query, $name){
    
    return $query->where('name', 'LIKE', "%$name%");
    
}

}
