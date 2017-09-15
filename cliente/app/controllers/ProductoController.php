<?php

class ProductoController extends BaseController {



public function getListarproductos()
{

	$listaproductos=Producto::all();

	return View::make("Productos.frmListarProductos")->with("listaproductos",$listaproductos);

}

public function getNuevoproducto()
{

	return View::make("Productos.frmNuevoProducto");
}

public function postGuardarproducto()

{
  	$producto= new Producto();

  	$producto->codigo=Input::get("codigo");
  	$producto->nombre=Input::get("nombre");
  	$producto->categoria=Input::get("categoria");

  	$producto->save();

  	return Redirect::to('/productos/listarproductos');

}

public function postActualizarproducto()
{

}


public function getEditarproducto($idproducto)
{

		$producto= Producto::find($idproducto);

	return View::make("Productos.frmEditarProducto")->with("producto",$producto);	

}

public function getListarproductosajax()
{
  return View::make("productos.frmListarProductosAjax");
}

public function getListarproductosyerson()
{
  $objResult=new stdClass();
  $objResult->data=Producto::all();
  return json_encode($objResult);
}


public function getQueryproductos()
{
  return DB::table('productos')->get();
}


public function getQueryproductosy()
{
return json_encode( DB::table('productos')->where('nombre', 'Uva')->first());
}
/*Devuel del producto eleccion tottalmente diferente*/
public function getQueryproductosyy()
{
return  DB::table('productos')->where('nombre','<>', 'Uva')
->select("codigo","nombre")
->orderBy("id","desc")->get();
}
/*like cual palabra que contenga*/
public function getQueryproductosyyy()
{
return json_encode( DB::table('productos')->where("nombre","like", "U%")->get());
}

public function getDtlistarproductos(){
  return View::make("productos.frmDTListaProductos");
}

/*inner join*/
public function getQueryproductosyor()
{
return  DB::table("productos as a")
->join("categorias as b","a.idcategoria","=","b.id")
/*campo categoria de producto y nombre se esta uniedo cuando es todo tener en cuenta*/
->select("a.codigo","b.nombre","b.codigo")
->where("a.nombre","like","%PROD%")
->orderBy("b.nombre","desc")
->get();
}






}
