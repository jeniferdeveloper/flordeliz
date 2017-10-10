<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */


//MIDDLEWARE CORS
Route::group(['middleware' => 'cors'], function () {

    Route::post( 'oauth/access_token',function () {
        return Response::json(Authorizer::issueAccessToken());
    });
    Route::group(['prefix' => 'api', 'midd  leware' => 'oauth', 'as' => 'api.'], function () {

        Route::group(['prefix' => 'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.'], function () {

            Route::resource('order',
                'Api\Client\ClientCheckoutController', [
                    'except' => ['create', 'edit', 'destroy']
                ]);
        });

        Route::group(['prefix' => 'deliveryman', 'middleware' => 'oauth.checkrole:delivery', 'as' => 'deliveryman.'], function () {
            Route::resource('order',
                'Api\Deliveryman\DeliverymanCheckoutController', [
                    'except' => ['create', 'edit', 'destroy']
                ]);

            Route::patch('order/{id}/update-status', ['uses' =>
                'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
                'as' => 'orders.update.status']);
        });


    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

//Router Categoria
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth.checkrole', 'permission' => 'admin'], function () {
    Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
    Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::post('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    Route::post('categories/delete/{id}', ['as' => 'categories.delete', 'uses' => 'CategoriesController@delete']);
    Route::post('categories/deleteconfirmed/{id}', ['as' => 'categories.deleteconfirmed', 'uses' => 'CategoriesController@deleteconfirmed']);

    Route::get('products', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
    Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
    Route::post('products/store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
    Route::get('products/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
    Route::post('products/update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
    Route::get('products/destroy/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
    Route::post('products/deleteconfirmed/{id}', ['as' => 'products.deleteconfirmed', 'uses' => 'ProductsController@deleteconfirmed']);

    Route::get('clients', ['as' => 'clients.index', 'uses' => 'ClientsController@index']);
    Route::get('clients/create', ['as' => 'clients.create', 'uses' => 'ClientsController@create']);
    Route::post('clients/store', ['as' => 'clients.store', 'uses' => 'ClientsController@store']);
    Route::get('clients/edit/{id}', ['as' => 'clients.edit', 'uses' => 'ClientsController@edit']);
    Route::post('clients/update/{id}', ['as' => 'clients.update', 'uses' => 'ClientsController@update']);
    Route::get('clients/destroy/{id}', ['as' => 'clients.destroy', 'uses' => 'ClientsController@destroy']);
    Route::post('clients/deleteconfirmed/{id}', ['as' => 'clients.deleteconfirmed', 'uses' => 'ClientsController@deleteconfirmed']);

    Route::get('orders', ['as' => 'orders.index', 'uses' => 'OrdersController@index']);
    Route::get('orders/delivery', ['as' => 'orders.delivery', 'uses' => 'OrdersController@delivery']);
    Route::get('orders/edit/{id}', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
    Route::post('orders/update/{id}', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
    Route::get('orders/delete/{id}', ['as' => 'orders.delete', 'uses' => 'OrdersController@delete']);
    Route::post('orders/destroy/{id}', ['as' => 'orders.destroy', 'uses' => 'OrdersController@destroy']);

    Route::get('cupoms', ['as' => 'cupoms.index', 'uses' => 'CupomsController@index']);
    Route::get('cupoms/create', ['as' => 'cupoms.create', 'uses' => 'CupomsController@create']);
    Route::post('cupoms/store', ['as' => 'cupoms.store', 'uses' => 'CupomsController@store']);
    Route::get('cupoms/edit/{id}', ['as' => 'cupoms.edit', 'uses' => 'CupomsController@edit']);
    Route::post('cupoms/update/{id}', ['as' => 'cupoms.update', 'uses' => 'CupomsController@update']);
    Route::post('cupoms/delete/{id}', ['as' => 'cupoms.delete', 'uses' => 'CupomsController@delete']);

    Route::get('productions', ['as' => 'productions.index', 'uses' => 'ProductionsController@index']);
    Route::get('productions/create', ['as' => 'productions.create', 'uses' => 'ProductionsController@create']);
    Route::post('productions/store', ['as' => 'productions.store', 'uses' => 'ProductionsController@store']);
    Route::get('productions/edit/{id}', ['as' => 'productions.edit', 'uses' => 'ProductionsController@edit']);
    Route::post('productions/update/{id}', ['as' => 'productions.update', 'uses' => 'ProductionsController@update']);
    Route::post('productions/delete/{id}', ['as' => 'productions.delete', 'uses' => 'ProductionsController@delete']);
    Route::get('productions/obterProdutoTamanho/{id}', ['as' => 'productions.obter-tamanho-produto', 'uses' => 'ProductionsController@obterProdutoTamanho']);
});



//Router User
Route::group(['prefix' => 'customer', 'as' => 'customer.', 'permission' => ['user', 'admin']], function () {

    Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);

});
//Router Client

//Router Produto
// Route::get('client', function () {
//     $repository = app()->make('FlorDeLiz\Repositories\ClientRepository');
//     return $repository->all();
// });


//Route::post( 'oauth/access_token',function () {
//    return Response::json(Authorizer::issueAccessToken());
//});



//Route::get('pedidos', function (){
//    return [
//        'Pedido' => 'E0159A'
//    ];
//});
//


