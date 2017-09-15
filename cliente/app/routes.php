<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::controller("/productos","ProductoController");
Route::controller("/productosws","ProductoWSController");
Route::controller("/usuarios","UsuarioController");

Route::controller("/home","HomeController");
Route::controller("/carrito","CarritoController");
Route::controller("/clientes","ClienteController");


Route::controller("/pagos","PagoController");



Route::get('/login', function()
{
	return View::make('login');
});



Route::group(array('before'=>'auth'), function()
	{
		Route::get('/pagina1', function()
		{
			return View::make('session.pagina1');
		});
		Route::get('/pagina2', function()
		{
			return View::make('session.pagina2');
		});
Route::controller("/compras","MiscomprasController");

	
	}
	);