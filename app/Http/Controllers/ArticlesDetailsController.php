<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ArticlesDetail;
use App\Http\Requests\ArticlesDetailRequest;
use Laracasts\Flash\Flash;
use App\Article;
use App\Image;
use App\Category;

class ArticlesDetailsController extends Controller
{
   public function index($id)
    {
          $articlesDetails = ArticlesDetail::where('article_id', '=', $id)->paginate(5);
         
       $name = Article::find($id)->name;
        
       $categories = Category::all();
       return view('admin.articlesDetails.index')->with('articlesDetails', $articlesDetails)->with('id', $id)->with('name', $name)->with('categories', $categories);
    }
    
    
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
       $name = Article::find($id)->name;
        $categories = Category::all();
     return view('admin.articlesDetails.create')->with('id', $id)->with('name', $name)->with('categories', $categories);
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        if($request->file('image')){
            
                    $file = $request->file('image');
        $name = '420clothing_' .time(). "." . $file->getClientOriginalExtension();
        $path = public_path() . '/images/articles/';
        $file->move($path, $name);
        }

     $articlesDetail = new ArticlesDetail($request->all());
        $articlesDetail->price = $articlesDetail->price - ( $articlesDetail->price * ($articlesDetail->discount / 100) ); 
       
        
     $articlesDetail->save();
      
    $image = new Image();
    $image->articlesDetail()->associate($articlesDetail);
    $image->image_URL = $name;
    $image->save();
    
        
        
    Flash::success("Articulo registrado");
        $categories = Category::all();
     return redirect()->route('admin.articlesDetails.index', $articlesDetail->article_id)->with('categories', $categories);;
        
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
        
     
        
        
    }
}
