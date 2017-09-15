<?php

class ProductoWSController extends BaseController {


	public function getListadoproductos()
	{
		$productos = Producto::all();

		return Response::json($productos);

	}

	public function postGuardarproducto()
	{


		if($_POST["id"]==0)
			$producto = new Producto();
		else
			$producto=Producto::find($_POST["id"]);


		$producto->codigo=$_POST["codigo"];
		$producto->nombre=$_POST["nombre"];
		$producto->categoria=$_POST["categoria"];
		$producto->save();

		return "producto guardado";

	}

	
	public function getObtenerproducto($idproducto)
	{
		$producto = Producto::find($idproducto);

		return Response::json($producto);
	}


	public function postEliminarproducto()
	{

		$idproducto=$_POST["idproducto"];
		$producto=Producto::find($idproducto);
		$producto->delete();


		return "Producto eliminado";

	}

public function getDtlistarproductos(){
	return View::make("productos.frmDTListaProductos");
}

}