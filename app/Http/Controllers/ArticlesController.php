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
    
    
     public function deleteimage($id, $image_id)
    {
         $article = Article::find($id);
              $categories = Category::all();
             
              $image = Image::find($image_id);
             
             unlink(public_path()."\images\articles\\".$image->image_url);
                
           

                $image->delete();
                
             
         
         Flash::success("Imagen eliminada");
          
             
        
      
        return view('admin.articles.images')->with('article', $article)->with('categories', $categories);
    }
    
    
      public function newimage(Request $request, $id)
    {
            $article = Article::find($id);
          
           if($request->file('image')){
            
                    $file = $request->file('image');
        $name = 'Dsistemas_' .time(). "." . $file->getClientOriginalExtension();
        $path = 'images/articles/';
        $file->move($path, $name);
               
                 $image = new Image();
                $image->article()->associate($article);
                $image->image_URL = $name;
                $image->save();
    
                 Flash::success("Nueva imagen agregada");
        }
        else{
             Flash::warning("Debe subir una imagen");
        }
       
          
          
       
          $categories = Category::all();
      
        return view('admin.articles.images')->with('article', $article)->with('categories', $categories);
    }
    
     public function images($id)
    {
         $article = Article::find($id);
          $categories = Category::all();
      
        return view('admin.articles.images')->with('article', $article)->with('categories', $categories);
    }
    
    
    
   public function index(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
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

        $categories = Category::all();
       
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
     
        $article = Article::find($id);
        $categories = Category::all();
        
        return view('admin.articles.edit')->with('article', $article)->with('categories', $categories);
        
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
        $article = Article::find($id);
        $article->fill($request->all());
      
        
        $article->save();
        
        Flash::success('El artículo se editó con éxito');
        
         $categories = Category::all();
            return redirect()->route('admin.articles.index')->with('categories',$categories);
      
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
        
        Flash::error('El articulo ' . $article->name. ' ha sido eliminado');
        $articles = Article::all();  
        return redirect()->route('admin.articles.index')->with('articles', $articles);
         
    }
    
    
}
