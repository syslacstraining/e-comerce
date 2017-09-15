<?php

class MiscomprasController extends BaseController
{
	
	  public function getMiscompras()
	  {
	  	$usuario=json_decode(Session::get("cliente"));
		$miscompras = DB::table('ventas')
            ->where('idcliente','=',$usuario->id)
            ->get();
	 
	  	return View::make('carrito.miscompras')->with("miscompras",$miscompras);
	  
	  }
}