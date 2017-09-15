@extends('templates.maestroinicio')

@section('body')

<!--Con base de datos-->

	<div class="row">

			<center>
				<?php
					foreach ($lista_productos as $producto) {				
				?>
				<div  class="col-sm-4" style="padding: 10px">
				    <img src="{{$producto->ruta_imagen}}" class="img-thumbnail" style=" width: 150px;">
					<h4>{{$producto->nombre}}</h4>
					<p>{{$producto->descripcion}}</p>
					<H3>S/. <?=$producto->precio?></H3>
					<a class="btn btn-primary" href="/carrito/agregarproducto/<?=$producto->id?>/1">comprar</a>
				</div>

				<?php
					}
				?>
			</center>
		
	</div>

@stop