@extends('templates.maestroinicio')


@section('head')
<script type="text/javascript" src="/app/carrito/CarritoController.js"></script>
@stop
@section('body')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@section('body')
<div class="container">
	<div class="row">
			<center>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>foto</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Subtotal</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="tblCarrito">

					</tbody>
				</table>
			</center>	
	</div>

	<div  class="row">

	<h2>Total: S/. <span id="ltotal"></span>
	<input type="hidden" name="" id="htotal" value="">

	<div id="idPayuButtonContainer">
		
	</div>

	
	</h2>

	

</div>


@stop