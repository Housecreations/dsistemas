<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
use App\Image;

class ArticlesController extends Controller
{
   public function index(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(5);
        $categories = Category::all();
        return view('admin.articles.index')->with('articles', $articles)->with('categories', $categories);
    }
    
    
    public function all(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
        $categories = Category::all();
        return view('admin.articles.all')->with('articles', $articles)->with('categories', $categories);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       
 /*   $categories = Category::orderBy('gender', 'ASC')->lists('name', 'id', 'gender');*/
        $categories = Category::orderBy('gender', 'ASC')->get();
        
       
     return view('admin.articles.create')->with('categories', $categories);
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        
        
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
    
        

        
        
    
        
    
         Flash::success("Articulo registrado");
        $categories = Category::all();
         return redirect()->route('admin.articles.index')->with('categories', $categories);
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
     
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       
      
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
          $article = Article::find($id);
        $article->delete();
        
        Flash::error('El articulo ' . $article->name. ' ha sido eliminada');
        $articles = Article::all();  
        return redirect()->route('admin.articles.index')->with('articles', $articles);
         
    }
    
    
}
