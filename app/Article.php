<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Laracasts\Flash\Flash;


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
    
    public static function saveArticle($request){
        
        
        if($request->file('image')){
            
            $file = $request->file('image');
            $name = 'Dsistemas_' .time(). "." . $file->getClientOriginalExtension();
            $path = 'images/articles/';
            $file->move($path, $name);
        
        }
        
        $article = new Article($request->all());
        $article->price = $article->price - ( $article->price * ($article->discount / 100) ); 
        $article->save();
      
        $image = new Image();
        $image->article()->associate($article);
        $image->image_URL = $name;
        $image->save();
        
        return Flash::success("Artículo registrado");
        
        
    }
    
    

}
