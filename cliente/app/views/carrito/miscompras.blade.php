@extends('templates.maestroinicio')
@section('body')
	<h1>MI CARRITO</h1>

<table>
	<thead>
		<td>
		Fecha
		</td>


		<td>
		</td>
		<td>
		</td>
	</thead>


<?
	foreach ($miscompras as $miscomprass) {
		
?>

		<tr>
		<td><?=$miscomprass->fecha_venta?></td>
		
		</tr>

<?
	}

?>



</table>
@stop