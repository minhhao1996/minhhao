<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*ADMIN*/

Route::get('/',[
    'as'=>'home',
    'uses'=>'HomeController@index'
]);
Route::get('login', function () {
    return view('auth.login');
});
Auth::routes(['verify' => true]);

Route::get('/profile', function () {
    return view('login')->with(['status' => 'Bạn vào!']);
})->middleware('verified');


Route::get('search}', [
    'as'=>'MainSearch',
    'uses'=>'HomeController@search']);
//Cart
Route::get('cart',[
    'as'=>'cart',
    'uses'=>'CartController@index'
]);
Route::get('addCart/{id}/{name}',[
    'as'=>'addCart',
    'uses'=>'CartController@addCart'
]);
Route::get('removeCart/{id}',[
    'as'=>'removeCart',
    'uses'=>'CartController@removeCart'
]);
Route::get('updateCart/{id}/{qty}',[
    'as'=>'updateCart',
    'uses'=>'CartController@updateCart'
]);
//order
Route::get('check-out', [
    'as'=>'order',
    'uses'=>'OrderController@index']);
Route::get('/get-district-order', [
    'as'=>'get-district-order',
    'uses'=>'OrderController@getDistrict']);
Route::post('postCheckout', [
    'as'=>'postCheckout',
    'uses'=>'OrderController@postCheckout']);

//Font_end
Route::get('category/{id}',[
        'as'=>'HomeCat',
        'uses'=>'HomeController@category',
    ]);
Route::get('details/{id}',[
    'as'=>'details',
    'uses'=>'DetailsController@index',
]);
//user
Route::get('login', function () {
    return view('auth.login');
});
Route::get('profile', [
    'as'=>'profile',
    'uses'=>'ProfileController@index']);

Route::get('editProfile/{name}', [
    'as'=>'editProfile',
    'uses'=>'ProfileController@editProfile']);
Route::get('/get-district', [
    'as'=>'get-district',
    'uses'=>'ProfileController@getDistrict']);

Route::post('PostProfile/{id}', [
    'as'=>'PostProfile',
    'uses'=>'ProfileController@PostProfile']);
Route::post('editProfile/district', [
    'as'=>'district',
    'uses'=>'ProfileController@district']);










Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {

    Route::get('/', function () {
        return view('admin.home');
    });

 Route::get('login',[

    ]);
    Route::post('postLogin',[
        'as'=>'loginPost',
        'uses'=>'UserController@postLogin'
    ]);
    //Category
    Route::group(['prefix'=>'catalog/'],function(){

        Route::get('/',[
            'as'=>'category',
            'uses'=>'CategoryController@index']);

        Route::get('add',[
            'as'=>'getAdd',
            'uses'=>'CategoryController@getAdd']);
        Route::post('add',[
            'as'=>'AddCat',
            'uses'=>'CategoryController@postAdd'
        ]);

        Route::get('edit/{id}',[
            'as'=>'EditCat',
            'uses'=>'CategoryController@edit']);

        Route::post('edit/{id}',[
            'as'=>'postEditCat',
            'uses'=>'CategoryController@postEdit'
        ]);

        Route::get('delete/{id}',[
            'as'=>'deleteCat',
            'uses'=>'CategoryController@delete']);



        Route::get('recyclebin',[
            'as'=>'recyclebin',
            'uses'=>'CategoryController@recyclebin']);

    });
    // Maker
    Route::group(['prefix'=>'maker/'],function(){

        Route::get('/',[
            'as'=>'maker',
            'uses'=>'MakerController@index']);
        Route::get('add',[
            'as'=>'AddMa',
            'uses'=>'MakerController@getAdd']);
        Route::post('add',[
            'as'=>'postAddMa',
            'uses'=>'MakerController@postAdd'
        ]);

        Route::get('edit/{id}',[
            'as'=>'EditMa',
            'uses'=>'MakerController@edit']);

        Route::post('edit/{id}',[
            'as'=>'postEditMa',
            'uses'=>'MakerController@EditMaker'
        ]);

        Route::get('delete/{id}',[
            'as'=>'deleteMa',
            'uses'=>'MakerController@delete']);


    });
    //Product
    Route::group(['prefix'=>'product/'],function(){

        Route::get('/',[
            'as'=>'index',
            'uses'=>'ProductController@index']);

        Route::get('add',[
            'as'=>'getAdd',
            'uses'=>'ProductController@getAdd']);
        Route::post('add',[
            'as'=>'postAdd',
            'uses'=>'ProductController@postAdd'
        ]);

        Route::get('edit/{id}',[
            'as'=>'editP',
            'uses'=>'ProductController@edit']);
        Route::post('edit/{id}',[
            'as'=>'postEditP',
            'uses'=>'ProductController@postEdit'
        ]);

        Route::get('delete/{id}',[
            'as'=>'deleteP',
            'uses'=>'ProductController@delete']);

        Route::get('delimg/{id}',[
            'as'=>'delImage',
            'uses'=>'ProductController@delImage']);

        Route::get('status/{id}',[
            'as'=>'status',
            'uses'=>'ProductController@status']);

        Route::get('import/{id}',[
            'as'=>'import',
            'uses'=>'ProductController@import']);

        Route::post('import/{id}',[
            'as'=>'postImport',
            'uses'=>'ProductController@postImport'
        ]);


        Route::get('recyclebin',[
            'as'=>'recyclebin',
            'uses'=>'ProductController@recyclebin']);

    });

    Route::group(['prefix'=>'user/'],function(){

        Route::get('/',[
            'as'=>'user',
            'uses'=>'UserController@index']);

        Route::get('edit/{id}',[
            'as'=>'EditUser',
            'uses'=>'UserController@edit']);

        Route::post('edit/{id}',[
            'as'=>'postEditUs',
            'uses'=>'UserController@EditUser'
        ]);

        Route::get('delete/{id}',[
            'as'=>'deleteMa',
            'uses'=>'UserController@delete']);


    });

});








/*FONT_END*/





Auth::routes();

