<?php

class PagoController extends BaseController {


	public function getRespuestapago()
	{

		
		$transactionId = $_REQUEST['transactionId'];
		$processingDate=$_REQUEST['processingDate'];
		$buyerEmail=$_REQUEST['buyerEmail'];
		$transactionState=$_REQUEST['transactionState'];

		if($transactionState==4)
		{
			
		}
		



		return $transactionId;


	}

	public function getConfirmacionpago()
	{
		
	}

	public function getObtenerinformacionpago($monto)
	{	
		$apiKey="4Vj8eK4rloUd272L48hsrarnUA";
		

		$correo_cliente="cliente@syslacstraining.com";

		if(Session::has("cliente"))
		{
			$cliente_actual=json_decode(Session::get("cliente"));
			$correo_cliente=$cliente_actual->correo_electronico;
		}

		$info_pago=new stdClass();
		$info_pago->merchantId="508029";		
		$info_pago->accountId="512323";		
		$info_pago->description="MI TIENDA EN LINEA";
		$info_pago->referenceCode="PAGO";
		$info_pago->amount=$monto;
		$info_pago->tax=0;
		$info_pago->taxReturnBase=0;
		$info_pago->currency="PEN";

		$signature=
			md5(
			$apiKey
			."~".$info_pago->merchantId
			."~".$info_pago->referenceCode
			."~".$monto
			."~".$info_pago->currency
			);

		$info_pago->signature=$signature;
		$info_pago->test="1";
		$info_pago->buyerEmail=$correo_cliente;
		$info_pago->responseUrl=url()."/pagos/respuestapago";
		$info_pago->confirmationUrl=url()."/pagos/confirmacionpago";

		return  json_encode($info_pago);

	}

}