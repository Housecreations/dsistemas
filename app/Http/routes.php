<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/tags/{tag}', function ($tag) {
   
    
   $articles = App\Tag::where('slug', '=', $tag)->first()->articles()->orderBy('article_id', 'DESC')->get();

   $tag = App\Tag::where('slug', '=', $tag)->first();
  
  
    return view('showtags', ['articles' => $articles, 'tag' => $tag]);
});



Route::get('/', 'WelcomeController@index');

Route::get('/home', [
    'uses' => 'MembersController@index',
    'as' => 'member.index',
    'middleware' => 'members.auth'
]);


Route::get('/carrito', 'ShoppingCartsController@index');
Route::get('/carrito/vaciar', 'ShoppingCartsController@vaciar');



Route::resource('in_shopping_carts', 'InShoppingCartsController', [
    
    'only' => ['store', 'destroy']
    
]);



route::get('/checkout', 'PaymentsController@checkout');

Route::put('/payments/pay', 'PaymentsController@index');


Route::get('/payments/fail', 'PaymentsController@fail');

Route::get('/payments/success', 'PaymentsController@success');


Route::get('articulos/show/all', [
    'uses' => 'ArticlesController@all',
    'as' => 'articles.show.all'
]);

Route::get('/clients/show', [
    'uses' => 'ClientsController@show',
    'as' => 'clients.show'
]);


Route::get('/load', 'WelcomeController@listing');


Route::post('/contact', [
    'uses' => 'MessagesController@store',
    'as' => 'messages.store'
]);

Route::get('/download', [
    'uses' => 'FilesController@files',
    'as' => 'files.downloads'
]);
Route::get('/download/{route}', [
    'uses' => 'FilesController@download',
    'as' => 'files.downloads.get'
]);


Route::get('/contact', ['as' => 'contact', function () {
 
   
    return view('contact');
}]);






/* ruta para motrar los articulos de una categoria*/

Route::get('/articulos/{category}', function ($cat) {
     
    
    $articles = App\Category::where('slug', '=', $cat)->first()->articles()->orderBy('id', 'DESC')->get();

    return view('show')->with('articles', $articles);
});



Route::get('articulos/{category}/{slug}', [ 'as' => 'mostrar.articulo', function ($cat, $slug) {
    
    $article = App\Article::where('slug', '=', $slug)->first();
    $tags = $article->tags;
  
  
    $relatedArticles = collect([]);
    
   
    foreach($tags as $tag){
        
    $relatedArticle = $tag->articles()->whereNotIn('article_id',[$article->id])->get();
     
   
        $relatedArticles->push($relatedArticle);
     
        
              
    }
   
    $relatedArticles = $relatedArticles->collapse()->groupBy('id');
    
    $articles = collect([]);
    foreach($relatedArticles as $relatedArticle){
        
        $articles->push($relatedArticle[0]);
        
    }
  
   
        return view('showArticle', ['article' => $article, 'relatedArticles' => $articles]);
    
}]);


Route::get('/QuienesSomos', function () {
   
    return view('whoweare');
    
});






Route::get('/descuentos', function () {
   
    $articles = App\Article::where('ondiscount', '=', 'yes')->orderBy('id', 'DESC')->get();
  
  
    return view('showoutlet')->with('articles', $articles);
    
});




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::put('/orders/{id}', 'OrdersController@adminUpdate');
    
    Route::resource('orders', 'OrdersController', [
    
    'only' => ['index']
    
]);
    
    Route::resource('tags', 'TagsController');
    
    
    Route::get('downloads/create', [
    'uses' => 'FilesController@create',
    'as' => 'admin.files.create'
    ]);
    
    Route::post('downloads/create', [
    'uses' => 'FilesController@store',
    'as' => 'admin.files.store'
    ]);
    
    
    Route::get('downloads/index', [
    'uses' => 'FilesController@index',
    'as' => 'admin.files.index'
    ]);
    Route::get('downloads/edit/{id}', [
    'uses' => 'FilesController@edit',
    'as' => 'admin.files.edit'
    ]);
    Route::put('downloads/edit/{id}', [
    'uses' => 'FilesController@update',
    'as' => 'admin.files.update'
    ]);
    Route::get('downloads/destroy/{id}', [
    'uses' => 'FilesController@destroy',
    'as' => 'admin.files.destroy'
    ]);
      
    
    
    Route::get('/front/edit', [
    'uses' => 'FrontController@edit',
    'as' => 'admin.front.edit'
    ]);
    Route::put('/front/edit/{id}', [
    'uses' => 'FrontController@update',
    'as' => 'admin.front.update'
     ]);
    

    Route::get('/front/edit/mas', [
    'uses' => 'FrontController@mas',
    'as' => 'admin.front.mas'
    ]);
    Route::get('/front/edit/menos', [
    'uses' => 'FrontController@menos',
    'as' => 'admin.front.menos'
    ]);
    
    
    
    Route::get('/messages', [
    'uses' => 'MessagesController@index',
    'as' => 'admin.messages.index'
    ]);
    Route::get('/messages/show/{id}', [
    'uses' => 'MessagesController@show',
    'as' => 'admin.messages.show'
    ]);
    Route::get('/messages/destroy/{id}', [
    'uses' => 'MessagesController@destroy',
    'as' => 'admin.messages.destroy'
    ]);
    
    
    Route::get('/outlet', [
    'uses' => 'FrontController@outletindex',
    'as' => 'admin.outlet.index'
    ]);
    Route::get('/outlet/add/{id}', [
    'uses' => 'FrontController@add',
    'as' => 'admin.outlet.add'
    ]);
    
    
    Route::get('/outlet/show', [
    'uses' => 'FrontController@outletshow',
    'as' => 'admin.outlet.show'
    ]);
    
    Route::get('/outlet/sus/{id}', [
    'uses' => 'FrontController@sus',
    'as' => 'admin.outlet.sus'
    ]);
    
    Route::get('/clients', [
    'uses' => 'ClientsController@index',
    'as' => 'admin.clients.index'
    ]);
    
    Route::get('/clients/create', [
    'uses' => 'ClientsController@create',
    'as' => 'admin.clients.create'
    ]);
    
    Route::get('/clients/{id}', [
    'uses' => 'ClientsController@edit',
    'as' => 'admin.clients.edit'
    ]);
    
   
    Route::post('/clients/create', [
    'uses' => 'ClientsController@store',
    'as' => 'admin.clients.store'
    ]);
    Route::get('/clients/{id}/destroy', [
    'uses' => 'ClientsController@destroy',
    'as' => 'admin.clients.destroy'
    ]);
    Route::put('/clients/{id}/update', [
    'uses' => 'ClientsController@update',
    'as' => 'admin.clients.update'
    ]);
    
    
    
    Route::get('/', ['as' => 'admin.index', function () {
       
        $unread = App\Message::where('read', '=', 'no')->count();
        
        $totalMonth = App\Order::totalMonth();
        $totalMonthCount = App\Order::totalMonthCount();
        $orderCount = App\Order::orderCount();
        
        if ($unread > 99) {
            
            $unread = '+99';
        }
        
      
        $carousel = App\CarouselImage::find(1);
        
        return view('admin.index', ['unread' => $unread, 'carousel' => $carousel, 'totalMonth' => $totalMonth, 'totalMonthCount' => $totalMonthCount, 'orderCount' => $orderCount]);
    }]);
    
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', [
    'uses' => 'UsersController@destroy',
    'as' => 'admin.users.destroy'
    ]);
    
    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'admin.categories.destroy'
    ]);
    

    
    
    
    
    
    
    
    
      Route::resource('articles', 'ArticlesController');
    Route::get('articles/{id}/destroy', [
    'uses' => 'ArticlesController@destroy',
    'as' => 'admin.articles.destroy'
    ]);
    Route::get('articles/{id}/images', [
    'uses' => 'ArticlesController@images',
    'as' => 'admin.articles.images'
    ]);
    Route::delete('articles/{id}/images/{image_id}', [
    'uses' => 'ArticlesController@deleteimage',
    'as' => 'admin.articles.images.delete'
    ]);
    Route::post('articles/{id}/images', [
    'uses' => 'ArticlesController@newimage',
    'as' => 'admin.articles.images.new'
    ]);
    /*  inicio rutas sites  */
    
  
    
   /*  fin rutas states  */
    
 
    
});

 


    
Route::get('admin/auth/login', [
 'uses' => 'Auth\AuthController@getLogin',
 'as' => 'admin.auth.login'
]);
Route::post('admin/auth/login', [
 'uses' => 'Auth\AuthController@postLogin',
 'as' => 'admin.auth.login'
]);
Route::get('admin/auth/logout', [
 'uses' => 'Auth\AuthController@logout',
 'as' => 'admin.auth.logout'
]);

Route::get('/register', [
 'uses' => 'Auth\RegisterController@getRegister',
 'as' => 'admin.auth.register'
]);

Route::post('/register', [
 'uses' => 'Auth\RegisterController@register',
 'as' => 'admin.auth.register'
]);

Route::post('/password/email', [
 'uses' => 'Auth\PasswordController@sendResetLinkEmail',

]);
Route::post('/password/reset', [
 'uses' => 'Auth\PasswordController@reset',

]);
Route::get('/password/reset/{token?}', [
 'uses' => 'Auth\PasswordController@showResetForm',

]);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
