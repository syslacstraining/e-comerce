<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/css/jquery-ui.theme.css">

	

	<script type="text/javascript" src="/js/jquery-3.2.0.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>


	<script type="text/javascript">
	
	$(document).ready(function() {

	MostrarProductos();

	});

</script>

	
</head>
<body>




<h1>LISTAR PRODUCTOS AJAX</h1>


<input type="button" name="bNuevo" value="Nuevo Producto" onclick="crearNuevoProducto()">

<table id="productos">

<thead>
	<th>Codigo</th>
	<th>Nombre</th>
	<th>Categoria</th>
	<th></th>
	<th></th>
</thead>

<tbody id="bodyproductos">


	
</tbody>

</table>


<!-- CODIGO PARA LOS MODALES -->

<div style="display:none">

<div id="NuevoProducto" title="Nuevo Producto">

<form>

<input type="hidden" id="id" value="0">

<label>Codigo</label>
<input type="text" name="Codigo" id="Codigo">
<p>
<label>Nombre</label>
<input type="text" name="Nombre" id="Nombre">

<p>

<label>Categoria</label>
<input type="text" name="Categoria" id="Categoria">

<p>
<input type="button" name="" onclick="guardarNuevoProducto()" value="Guardar">
</form>
 
</div>

</div>

<!-- -->



<script type="text/javascript">
	

function CBListarProductos(listaproductos)
{
	var _id,_codigo,_nombre,_categoria;


	$("#bodyproductos").html("");

	for(i=0;i<listaproductos.length;i++)
	{

		_id=listaproductos[i].id;
		_codigo=listaproductos[i].codigo;
		_nombre=listaproductos[i].nombre;
		_categoria=listaproductos[i].categoria;


	$("#bodyproductos")
	.append("<tr><td>"+_codigo+"</td><td>"+_nombre+"</td><td>"+_categoria+"</td><td><input type='button' onclick='EditarProducto("+_id+")' value='Editar'></td><td><input type='button' value='Eliminar' onclick='EliminarProducto("+_id+")'   ></td>  </tr>");
	}
}



function MostrarProductos()
{

	$.ajax({
		method:"GET",
		url:"/productosws/listadoproductos"
	})
.done(CBListarProductos);

}




function crearNuevoProducto()
{
	$("#id").val(0);
	$("#Codigo").val("");
	$("#Nombre").val("");
	$("#Categoria").val("");

	$("#NuevoProducto").dialog();
}



function guardarNuevoProducto()
{

	$.ajax({
		method:"POST",
		url:"/productosws/guardarproducto",
		data: {codigo:$("#Codigo").val() ,nombre:$("#Nombre").val(),categoria:$("#Categoria").val(),id:$("#id").val()}
	})
	.done(productoGuardado);


}

function productoGuardado(msg)
{
	MostrarProductos();

	$("#Codigo").val("");
	$("#Nombre").val("");
	$("#Categoria").val("");

	$("#NuevoProducto").dialog("close");
}



function EditarProducto(idproducto)
{

	$.ajax(
		{
		method:"GET",
		url:"/productosws/obtenerproducto/"+idproducto
		}
	)
	.done(MostrarEdicion);

}

function MostrarEdicion(producto)
{

	$("#id").val(producto.id);
	$("#Codigo").val(producto.codigo);
	$("#Nombre").val(producto.nombre);
	$("#Categoria").val(producto.categoria);

	$("#NuevoProducto").dialog();


}






function EliminarProducto(_idproducto)
{
	$.ajax(

		{
			method:"POST",
			url:"/productosws/eliminarproducto",
			data: {idproducto:_idproducto}
		}

		).done(ProductoEliminado);
}


function ProductoEliminado(arg)
{
	console.log(arg);

	MostrarProductos();
}








</script>








</body>




</html>


