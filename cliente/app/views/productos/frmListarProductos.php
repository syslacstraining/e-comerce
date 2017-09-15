<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<H1>LISTA DE PRODUCTOS</H1>

<a href="/productos/nuevoproducto">Nuevo Producto </a>


<table>
	<thead>
		<td>
		CODIGO
		</td>
		<td>
		NOMBRE
		</td>
		<TD>
		CATEGORIA
		</TD>
		<td>
		</td>
		<td>
		</td>
	</thead>


<?
	foreach ($listaproductos as $producto) {
		
?>

		<tr>
		<td><?=$producto->codigo?></td>
		<td><?=$producto->nombre?></td>
		<td><?=$producto->categoria?></td>

		<td><a href="/productos/editarproducto/<?=$producto->id?>">Editar</a></td>		

		</tr>

<?
	}

?>



</table>


</body>
</html>