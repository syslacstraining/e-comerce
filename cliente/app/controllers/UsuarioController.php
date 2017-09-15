<?php

class UsuarioController extends BaseController {
	public function postAutenticarusuario()
	{
		$login=Input::get("txtlogin");
		$password=Input::get("txtpassword");

		$items = Usuarios::where("login","=",$login)
		->where("password","=",$password)->get();

		if(count($items)>0)
		{
			Session::put("usuario",json_encode($items[0]));
			return Redirect::to("/home");
		}
		else
		{
			return Redirect::back()->withErrors(["loginerror"=>"Password y contraseña incorrectos"]);
		}
	}
/*FUNCION PARA CERRAR SECION*/
public function getSalirsession(){
	Session::forget("usuario");
	return Redirect::to("/login");
	/*Ha salir a pagian que inico 
	return Redirect::back();*/
	}

}