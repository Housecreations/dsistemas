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
        
    $carousel = CarouselImage::all();
    
    return view('welcome')->with('carousel', $carousel);  
        
        
    }
    
    
}
