<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Cart;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use App\Category;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
       $users = User::search($request->name)->orderBy('id', 'ASC')->paginate(5);
        $categories = Category::all();
        return view('admin.users.index')->with('users', $users)->with('categories',$categories);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $categories = Category::all();
        return view('admin.users.create')->with('categories',$categories);
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
    
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
       
        if($user->type == 'member'){
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();
        }
        
        Flash::success("Se ha registrado de forma existosa");
        
        $categories = Category::all();
        
        return redirect()->route('admin.users.index')->with('categories',$categories);
        
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
      $user = User::find($id);
        
       $categories = Category::all();
        return view('admin.users.edit')->with('user', $user)->with('categories',$categories);
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
       
       $user = User::find($id);
        $user->fill($request->all());
      
        
        $user->save();
        
        Flash::success('El usuario se editó con éxito');
        
         $categories = Category::all();
            return redirect()->route('admin.users.index')->with('categories',$categories);
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        Flash::error('El usuario ' . $user->name. ' ha sido eliminado');
          $categories = Category::all();
        return redirect()->route('admin.users.index')->with('categories',$categories);
    }
}
