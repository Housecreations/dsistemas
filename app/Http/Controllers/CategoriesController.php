<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Laracasts\Flash\Flash;
use App\Http\Requests\CategoryRequest;


class CategoriesController extends Controller
{
   public function index(Request $request)
    {
     $categories = Category::search($request->name)->orderBy('id', 'ASC')->paginate(5);
        
        return view('admin.categories.index')->with('categories', $categories);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $categories = Category::all();
        return view('admin.categories.create')->with('categories', $categories);
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
          $category = new Category($request->all());
        $category->save();
         Flash::success("Categoria registrada");
         $categories = Category::all();
         return redirect()->route('admin.categories.index')->with('categories', $categories);
  
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
      $category = Category::find($id);
       $categories = Category::all();
        return view('admin.categories.edit')->with('category', $category)->with('categories', $categories);
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
     
       $category = Category::find($id);
        $category->fill($request->all());
      
        
        $category->save();
        
        Flash::success('La categoria se editó con éxito');
         $categories = Category::all();  
        return redirect()->route('admin.categories.index')->with('categories', $categories);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);
        $category->delete();
        
        Flash::error('La categoria ' . $category->name. ' ha sido eliminada');
        $categories = Category::all();  
        return redirect()->route('admin.categories.index')->with('categories', $categories);
    }
    
    
    public function getCategories(Request $request, $gender){
        
     if($request->ajax()){
         
         
         
          $categories = Category::categories($gender);
        
      

            
        /*   return response()->json($categories);*/
         return response()->json(['id' => '1', 'name' => 'pantalon' ]);
        
     }
        
    }
}
