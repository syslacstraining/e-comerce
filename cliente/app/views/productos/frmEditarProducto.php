<!DOCTYPE html>
<html>
<head>
	<title> </title>
</head>
<body>

<H1> EDITAR PRODUCTO</H1>

<form action="/productos/actualizarproducto"  method="post" > 

<input type="hidden" name="id" value="<?=$producto->id?>">

<label>codigo</label>
<input type="text" name="codigo" value="<?=$producto->codigo?>">
<p>

<label>nombre</label>
<input type="text" name="nombre" value="<?=$producto->nombre?>">

<p>

<label>categoria</label>
<input type="text" name="categoria" value="<?=$producto->categoria?>">

<p>

<input type="submit" name="guardar" value="Guardar">

</form>

</body>
</html>