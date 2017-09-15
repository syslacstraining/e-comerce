<?php

class CarritoController extends BaseController
{
	 public function getAgregarproducto($idproducto,$cantidad)
	 {
	 	/*varriable carrito vacion*/
	 	$carrito=new  stdClass();
	 	/*reestrurando carrito*/
	 	$carrito->total=0;
	 	$carrito->productos=[];
	 	/*Array con cerro elemto []*/

	 	/*recupera por completo recuperando y Retorna todo el producto de la DB*/
	 	$producto = Producto::find($idproducto);
	 	/*Si el carrito existe*/
	 	if (Session::has("carrito")) 
	 	{
	 		$carrito = json_decode(Session::get("carrito"));
	 	}

	 	/*Vrriable de control*/
	 	$producto_encontrado=false;
	 	/*esta vacio o no esta vacio */
	 	if (count($carrito->productos)>0) 
	 	{
	 		foreach ($carrito->productos as $itemProducto) 
	 		{
	 			if($itemProducto->id==$producto->id)
	 			{
	 				$producto_encontrado=true;
	 				$itemProducto->cantidad=$itemProducto->cantidad+$cantidad;
	 				$itemProducto->subtotal=$itemProducto->cantidad*$itemProducto->precio;

	 			}
	 		}
	 	}

	 	/*sI EL PRODUCTO NO A SIDO ENCONTRADO setear*/
	 	if (!$producto_encontrado) {
	 		$producto->cantidad=$cantidad;
	 		$producto->subtotal=$producto->precio*$cantidad;

	 		$carrito->productos[]=$producto;
	 	}

	 	$total=0;
	 	foreach ($carrito->productos as $producto) {
	 		$total=$total+$producto->subtotal;
	 	}

	 	$carrito->total=$total;

	 	Session::set("carrito",json_encode($carrito));

	 	/*Pruba rapida
	 	return json_encode($carrito);*/

	 	//return View::make("carrito")->with("carrito",$carrito);
	 	return Redirect::to('/carrito');
	 }
	 public function getObtenercarrito()
	 {
	 	/* para Carrito vacio*/
	 	$carrito=new  stdClass();
	 	$carrito->total=0;
	 	$carrito->productos=[];

	 	if (Session::has("carrito")) 
	 
	 		$carrito = json_decode(Session::get("carrito"));
		
		return json_encode($carrito);
	 }
	 public function getLimpiarcarrito()
	 {
	 	/* para Carrito vacio*/
	 	$carrito=new  stdClass();
	 	$carrito->total=0;
	 	$carrito->productos=[];
	 	Session::put("carrito",json_encode($carrito));
	 }

	 public function getIndex()
	 {
	 	return View::make("carrito");
	 }



	  public function postGuardarpago()
	  {
	  	$pago = new Pago();

	  	$pago->idtransaccion=$_POST["idtransaccion"];
	  	$pago->estado=$_POST["estado"];
	  	$pago->idclientepago=$_POST["idclientepago"];

	  	$pago->save();

	  	$usuario=json_decode(Session::get("cliente"));
		$carrito=json_decode(Session::get("carrito"));

	  	$venta = new Venta();
	  	$venta->idcliente=$usuario->id;
	  	$venta->fecha_venta=new DateTime();
	  	$venta->idpago=$pago->id;
	  	$venta->total=$carrito->total;

	  	$venta->save();

	  	

	  	foreach ($carrito->productos as $itemProducto)
	  	{
	  		$detalleventa=new Detalleventa();
	  		$detalleventa->idventa=$venta->id;
	  		$detalleventa->idproducto=$itemProducto->id;
	  		$detalleventa->cantidad=$itemProducto->cantidad;
	  		$detalleventa->precio_venta=$itemProducto->precio;

	  		$detalleventa->save();

	  		

	  	}

	 	$carrito=new  stdClass();
	 	$carrito->total=0;
	 	$carrito->productos=[];
	 	Session::put("carrito",json_encode($carrito));
	  }

	  public function getModificarproducto($idproducto, $cantidad)
	  {
	 	$carrito=new  stdClass();
	 	$carrito->total=0;
	 	$carrito->productos=[];

	 	if (Session::has("carrito"))
	 	{
	 		$carrito=json_decode(Session::get("carrito"));

	 	}

	 	for ($i=0; $i <count($carrito->productos) ; $i++) 
	 	{ 
	 		if ($carrito->productos[$i]->id==$idproducto) 
	 		{
	 			$carrito->productos[$i]->cantidad=$cantidad;
	 			$carrito->productos[$i]->subtotal=$cantidad*$carrito->productos[$i]->precio;
	 		}
	 	}

	 	$total=0;
	 	foreach ($carrito->productos as $producto) {
	 		$total=$total+$producto->subtotal;
	 	}

	 	$carrito->total=$total;

		Session::put("carrito",json_encode($carrito));

	  	return json_encode($carrito);

	  }


	  public function getConfirmarpago()
	  {
	  	return View::make("carrito.confirmacionpago");
	  }

	  public function getMiscompras()
	  {
	  	$cliente=json_decode(Session::get("cliente"));
		$miscompras = DB::table('ventas')
            ->where('idcliente','=',$cliente)
            ->get();
	  	return  $miscompras;
	  	//return View::make('carrito.miscompras');
	  }
	  public function getEliminarproducto($idproducto)
	  {
	 	$carrito=new  stdClass();
	 	$carrito->total=0;
	 	$carrito->productos=[];

	 	if (Session::has("carrito"))
	 	{
	 		$carrito=json_decode(Session::get("carrito"));

	 	}


	  	for ($i=0; $i < count($carrito->productos); $i++) { 
	  		if ($carrito->productos[$i]->id==$idproducto) {
	  			array_splice($carrito->productos,$i,1);
	  			break;
	  		}
	  	}


	 	$total=0;
	 	foreach ($carrito->productos as $producto) {
	 		$total=$total+$producto->subtotal;
	 	}

	 	$carrito->total=$total;

	  	Session::put("carrito",json_encode($carrito));

	  	return json_encode($carrito);
	  }

}