<!doctype html>
<html lang="en-US">
<head>

	<meta charset="utf-8">

	<title>Login</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

	<div id="login">

		<h2><span class="fontawesome-lock"></span>Login Autenticación</h2>

		<form action="/clientes/autenticarcliente" method="POST">

			<fieldset>

				<p><label for="email">Coreo Electronico</label></p>
				<p><input name="txtlogin" type="email" id="email" value="mail@address.com" onBlur="if(this.value=='')this.value='mail@address.com'" onFocus="if(this.value=='mail@address.com')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

				<p><label for="password">Contraseña</label></p>
				<p><input name="txtpassword" type="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

				<p><input type="submit" value="Ingresar"></p>
				<h1 id="loginmsg"><?=($errors->first("loginerror")?$errors->first("loginerror"):"");?></h1>
			</fieldset>

		</form>

	</div> <!-- end login -->

</body>	
</html>