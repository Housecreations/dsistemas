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
       
            
            Image::deleteImage($image_id);
         
            return back();
     
    }
    
    
      public function newimage(Request $request, $id)
    {
            $article = Article::find($id);
          
            Image::uploadImage($article, $request);
            
            return back();
      
    }
    
     public function images($id)
    {
         $article = Article::find($id);
         
      
        return view('admin.articles.images')->with('article', $article);
    }
    
    
    
   public function index(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
       
        return view('admin.articles.index')->with('articles', $articles);
    }
    
    
  /*  public function all(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
       
        return view('admin.articles.all')->with('articles', $articles);
    }*/
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       
     return view('admin.articles.create');
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        
        Article::saveArticle($request);
        
        return redirect()->route('admin.articles.index');
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
     
        $article = Article::find($id);
      
        return view('admin.articles.edit')->with('article', $article);
        
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
        
        
            return redirect()->route('admin.articles.index');
      
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
