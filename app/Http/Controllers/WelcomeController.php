<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\CarouselImage;
use App\Article;

class WelcomeController extends Controller
{
    public function index(){
        
    
        $article = Article::all();
        $articles = $article->take(4);
   
    $carousel = CarouselImage::all();
    
    return view('welcome')->with('carousel', $carousel)->with('articles', $articles);  
        
    }
    
    public function listing(){
        
        $articles = Article::all();
        
        return response()->json(
        
            $articles->toArray()
        );
        
        
    }
}
