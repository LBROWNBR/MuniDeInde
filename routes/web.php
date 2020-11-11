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


/*
|--------------------------------------------------------------------------
| Routes para la Página Web
|--------------------------------------------------------------------------
*/

Route::prefix('/')->group(function () {

    Route::get('/', 'WebPageController@index');
    Route::get('/registrate', 'WebPageController@registrate');


	Route::get('/nosotros', 'WebPageController@nosotros');
    Route::get('/contactenos', 'WebPageController@contactenos');


    Route::post('/cliRegistrar', 'WebPageController@cliRegistrar');
    Route::get('/cliListarProv', 'WebPageController@cliListarProv');
    Route::get('/cliListarDist', 'WebPageController@cliListarDist');
    Route::get('/acceder', 'WebPageController@acceder');

    Route::post('/validarLoginCliente', 'WebPageController@cliValidarLogin');

    Route::get('/micuenta', 'WebPageController@micuenta');

	Route::get('/vistarapida/{IdCodigo}', 'WebPageController@vistarapida');
	Route::get('/productos', 'WebPageController@productos');
	Route::get('/productos2', 'WebPageController@productos2');
	Route::get('/carrito', 'WebPageController@carrito');
	Route::get('/checkout', 'WebPageController@checkout');
	Route::get('/productodet/{IdCodigoProducto}', 'WebPageController@productodet');
    Route::get('/confirmado', 'WebPageController@confirmado');

    //Rutas

});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Routes del Administrador
|--------------------------------------------------------------------------
*/

Route::prefix('/administrador')->group(function () {

    Route::get('/', 'AdminController@Admin_Login');
	Route::post('/AdminValidarLogin', 'AdminController@Admin_ValidarLogin');
	Route::get('/AdminControl', 'AdminController@Admin_Control');
    Route::get('/AdminCerrarSession', 'AdminController@Admin_CerrarSession');
    Route::get('/AdminMiPerfil/{idUsuario}', 'AdminController@Admin_MiPerfil');
});


