@extends('templates.maestroinicio')

@section('body')
<section class="container" style="background: #cce5fc">
	<div class="row">
		<div style="padding-top: 10px">
			<center>
				<div  class="col-sm-4">
				    <img src="/img/p1.png" class="img-thumbnail" style=" width: 150px;">
					<h4>Perfumen desodrante para utilidad</h4>
					<p>La buena ultidad de las personas en el paseo</p>
					<H3>S/. 0.50</H3>
					<button type="button" class="btn btn-danger btn-sm">Comprar</button>
				</div>
				<div  class="col-sm-4">
				<img src="/img/p2.png" class="img-thumbnail" style=" width: 150px;">
					<h4>Linpieza de vidrio</h4>
					<p>Para una buena limpia de habitacion o en su cuarto</p>
					<h3>S/. 200.99</h3>
					<button type="button" class="btn btn-danger btn-sm">Comprar</button>
				</div>

				<div  class="col-sm-4">
				<img src="/img/p3.png" class="img-thumbnail" style=" width: 150px;">
					<h4>Canchito de ahorro</h4>
					<p>La creencia de tener mucho ahorro en  la familia</p>
					<h3>S/. 80.50</h3>
					<button type="button" class="btn btn-danger btn-sm">Comprar</button>
				</div>
			</center>
		</div>
	</div>
</section>
<!--Con base de datos-->
<section class="container" style="background: #cce5fc">
	<div class="row">
		<div style="padding-top: 10px">
			<center>
				<?php
					foreach ($lista_productos as $producto) {				
				?>
				<div  class="col-sm-4">
				    <img src="{{$producto->ruta_imagen}}" class="img-thumbnail" style=" width: 150px;">
					<h4>{{$producto->nombre}}</h4>
					<p>{{$producto->descripcion}}</p>
					<H3>S/. <?=$producto->precio?></H3>
					<a style="background: red;" href="/carrito/agregarproducto/<?=$producto->id?>/1">comprar</a>
				</div>

				<?php
					}
				?>
			</center>
		</div>
	</div>
</section>
@stop