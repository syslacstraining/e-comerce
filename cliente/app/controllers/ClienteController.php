<?php

class ClienteController extends BaseController {
	public function postAutenticarcliente()
	{
		$login=Input::get("txtlogin");
		$password=Input::get("txtpassword");

		$items = Cliente::where("login","=",$login)
		->where("password","=",$password)->get();

		if(count($items)>0)
		{
			Session::put("cliente",json_encode($items[0]));
			return Redirect::to("/home");
		}
		else
		{
			return Redirect::back()->withErrors(["loginerror"=>"Password y contraseña incorrectos"]);
		}
	}
/*FUNCION PARA CERRAR SECION*/
public function getCerrarsession(){
	Session::forget("cliente");
	
	return Redirect::back();
	}

}