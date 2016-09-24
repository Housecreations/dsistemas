<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class File extends Model implements SluggableInterface
{
    
    use SluggableTrait;
    
    protected $sluggable = [
        
        'build_from' => 'name',
        'save_to' => 'slug'
        
    ];
    
      protected $table = "files";
    
    protected $fillable = ['name', 'description', 'category_id', 'file_url', 'size', 'version', 'os'];
    
    
     public function category(){
        
        return $this->belongsTo('App\Category');
    }
    
    public function scopeSearch($query, $name){
    
    return $query->where('name', 'LIKE', "%$name%");
    
}
    
}
