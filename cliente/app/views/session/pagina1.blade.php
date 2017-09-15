<?php
	$var1="Juan Perez";
	/*echo $var1; Tambien funciona igual una variable localho para modo mativo
	$_SESSSION["var1"]=$var1;*/ 
	Session::put("var1", $var1);

	echo "Variable local 1 =".$var1;
	echo "<p>"; /*p salto de linea   el punto es para concatenar*/
	echo "variable sesion 1 = ".Session::get("var1");
	echo "<p>"; /*p salto de linea*/

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<header>
<!--CREANDO BOTON PARA CERRAR SESSION-->
<a href="/usuarios/salirsession" style="float:right;"><input style="background:#58FF87" type="button" name="" value="Cerrar Session"></a>	
	<?
	$usuario = json_decode(Session::get("usuario"));
	echo "usuario conectado :".$usuario->nombres;
	?>
</header>
</body>
</html>