<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Flash\Flash;

class Image extends Model
{
     protected $table = "images";
    
    protected $fillable = ['article_id', 'image_url'];

 public function article(){
        
        return $this->belongsTo('App\Article');
    }
    
    public static function deleteImage($image_id){
        
        $image = Image::find($image_id);
        unlink(public_path()."\images\articles\\".$image->image_url);
        $image->delete();
        
        return Flash::success("Imagen eliminada");
    }
    
    public static function uploadImage($article, $request){
        
        if($request->file('image')){
            
                    $file = $request->file('image');
        $name = 'Dsistemas_' .time(). "." . $file->getClientOriginalExtension();
        $path = 'images/articles/';
        $file->move($path, $name);
               
                 $image = new Image();
                $image->article()->associate($article);
                $image->image_URL = $name;
                $image->save();
    
                return Flash::success("Nueva imagen agregada");
        }
        else{
             return Flash::success("Debe subir una imagen");
        }
    }

}
