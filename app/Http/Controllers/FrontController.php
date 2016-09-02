<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Front;
use App\Message;
use App\Category;
use Laracasts\Flash\Flash;
use App\CarouselImage;

use App\Article;
use App\Http\Requests\ImageRequest;

class FrontController extends Controller
{
    
    
    public function outletshow()    
    {
         $categories = Category::all();
        
        
          $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
        
        
         $articles = Article::where('ondiscount','=', 'yes')->orderBy('id','DESC')->get();
        
           return view('admin.outlet.show')->with('categories', $categories)->with('articles', $articles)->with('unread', $unread); 
        
    }
    
    
    
    
     public function add($id)     
    {
         $article = Article::find($id);
         $article->ondiscount = 'yes';
         $article->save();
         
         $categories = Category::all();
        
        
          $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
        
        
         $articles = Article::where('ondiscount','=', 'no')->orderBy('id','DESC')->get();
        
           return view('admin.outlet.index')->with('categories', $categories)->with('articles', $articles)->with('unread', $unread); 
        
    }
    
    
     public function sus($id)     
    {
         $article = Article::find($id);
         $article->ondiscount = 'no';
         $article->save();
         
         $categories = Category::all();
        
        
          $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
        
        
         $articles = Article::where('ondiscount','=', 'yes')->orderBy('id','DESC')->get();
        
           return view('admin.outlet.show')->with('categories', $categories)->with('articles', $articles)->with('unread', $unread); 
        
    }
    
    
    
    public function outletindex()    
    {
         $categories = Category::all();
        
        
          $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
        
        
         $articles = Article::where('ondiscount','=', 'no')->orderBy('id','DESC')->get();
        
           return view('admin.outlet.index')->with('categories', $categories)->with('articles', $articles)->with('unread', $unread); 
        
    }
    
   
    
    
    
    
    
    public function edit()
    {
     
        
         $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
        
        
       
       $categories = Category::all();
        
    
            
            $images = CarouselImage::all();
            
         return view('admin.front.editcarousel')->with('images', $images)->with('categories', $categories)->with('unread', $unread);   
            
        
        
    }
    
     public function update(ImageRequest $request, $id)
    {
         
       
            
            
             if($request->file('image')){
            
                    $file = $request->file('image');
        $name = 'DSistemas_' .$id. "." . $file->getClientOriginalExtension();
        $path = public_path() . '/images/slider/';
        $file->move($path, $name);
                  $image = CarouselImage::find($id);
   
    $image->image_url = $name;
                 $image->url_to = $request->url_to;
    $image->save();
        
             
             $images = CarouselImage::all();
                 
                  $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
        
                 
         $categories = Category::all();  
        return view('admin.front.editcarousel')->with('images', $images)->with('categories', $categories)->with('unread', $unread); 
             
             
             
             }else{
                 
               $image = CarouselImage::find($id);
 
               
    $image->image_url = $request->imagen;
                 $image->url_to = $request->url_to;
    $image->save();  
                 
                 
             
                 $images = CarouselImage::all();
                 
                  $unread = Message::where('read','=', 'no')->get();
        $unread = sizeof($unread);
        
        if($unread > 99){
            
            $unread = '+99';
        }
                 
                 
        
        
                 
         $categories = Category::all();  
        return view('admin.front.editcarousel')->with('images', $images)->with('categories', $categories)->with('unread', $unread);  
             }
        
                 
      
            
            
            
            
        
      
         }
    
     public function mas()
    {
    
        
        $image = new CarouselImage();
         $image->image_url = 'default.jpg';
         $image->save();
        
        
       
       $categories = Category::all();
        
    
            
            $images = CarouselImage::all();
            
         return view('admin.front.editcarousel')->with('images', $images)->with('categories', $categories);   
            
        
        
    }
    public function menos()
    {
    
        
        $images = CarouselImage::all();
        $image = $images->last();
        $image->delete();
        
        
      
        
       
       $categories = Category::all();
        
    
            
            $images = CarouselImage::all();
            
         return view('admin.front.editcarousel')->with('images', $images)->with('categories', $categories);   
            
        
        
    }
}
