@extends('templates.maestroinicio')
@section('body')


	
	<h1>MI CARRITO</h1>

<table class="table">
	<thead>
		<td>
		Fecha
		</td>

		<td>
		Monto
		</td>

		<td>
		Estado
		</td>


		
	</thead>


<?
	foreach ($miscompras as $miscomprass) {
		
?>

		<tr>
		<td><?=$miscomprass->fecha_venta?></td>
		<td><?=$miscomprass->total?></td>
		<td>aprobado</td>
		
		</tr>

<?
	}

?>



</table>
@stop