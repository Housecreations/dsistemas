<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SalesCountry;
use App\Category;

class SalesCountriesController extends Controller
{
    public function index(Request $request)
    {
         $countries = SalesCountry::paginate(5);
        $categories = Category::all();
        return view('admin.salescountries.index')->with('countries', $countries)->with('categories', $categories);
    }
    
    public function create(){
         return view('admin.salescountries.create');
    }
}
