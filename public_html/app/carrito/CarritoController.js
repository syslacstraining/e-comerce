$(document).ready(function(){
    CargarCarrito();
});


function CargarCarrito()
{
    $("#htotal").html("0");
    $("#botonPayuContainer").html("");

            $.ajax({
                dataType: "json",
                method:"GET",
                url: "/carrito/obtenercarrito"
                })
            .done(function( carrito ){
                console.log(carrito);

                $("#tblCarrito").html("");
                $("#ltotal").html("");


                for(i=0;i<carrito.productos.length;i++)
                {
                    var producto=carrito.productos[i];

                     

                    html_fila="<tr>";
                    html_fila+="<td><img height='40px' src='"+producto.ruta_imagen+"'></td>";
                    html_fila+="<td>"+producto.nombre+"</td>";
                    html_fila+="<td><input type='number' value='"+producto.cantidad+"' onchange='ModificarProductoCarrito("+producto.id+",this)'></td>";
                    html_fila+="<td>"+producto.precio+"</td>";
                    html_fila+="<td>"+producto.subtotal+"</td>";
                    html_fila+="<td><a href='#' onclick='EliminarProductoCarrito("+producto.id+")'>Eliminar</a></td>";
                    html_fila+="</tr>";

                    

                    $("#tblCarrito").append(html_fila);
                }

                    
                     $("#ltotal").append(carrito.total);

                     $("#htotal").val(carrito.total);


                     CrearBotonPayu();


            });   
}
function ModificarProductoCarrito(idproducto,obj)
{
    console.log(obj.value);



            $.ajax({
                dataType: "json",
                method:"GET",
                url: "/carrito/modificarproducto/"+idproducto+"/"+obj.value
                }) 
             .done(function(){
                console.log("Productoeliminafdo");
                CargarCarrito();
             }
             )
             .fail(function(msg){
                console.log(msg);
             })
             ;

}


function EliminarProductoCarrito(idproducto)
{
            $.ajax({
                dataType: "json",
                method:"GET",
                url: "/carrito/eliminarproducto/"+idproducto
                }) 
             .done(function(){
                console.log("Productoeliminafdo");
                CargarCarrito();
             }
             )
             .fail(function(){
                console.log("error de controller");
             })
             ;

}




function CrearBotonPayu()
{

    var montoTotal=$("#htotal").val();

    $.ajax({
            dataType: "json",
                method:"GET",
                url: "/pagos/obtenerinformacionpago/"+montoTotal
                }) 
             .done(function(info){
                console.log(info);
                

    var html_button_payu="\
    <form method='post' action='https://sandbox.gateway.payulatam.com/ppp-web-gateway/'>\
      <input name='merchantId'    type='hidden'  value='"+info.merchantId+"'>\
      <input name='accountId'     type='hidden'  value='"+info.accountId+"'>\
      <input name='description'   type='hidden'  value='"+info.description+"'>\
      <input name='referenceCode' type='hidden'  value='"+info.referenceCode+"'>\
      <input name='amount'        type='hidden'  value='"+info.amount+"'>\
      <input name='tax'           type='hidden'  value='"+info.tax+"'>\
      <input name='taxReturnBase' type='hidden'  value='"+info.taxReturnBase+"'>\
      <input name='currency'      type='hidden'  value='"+info.currency+"'>\
      <input name='signature'     type='hidden'  value='"+info.signature+"'>\
      <input name='test'          type='hidden'  value='"+info.test+"'>\
      <input name='buyerEmail'    type='hidden'  value='"+info.buyerEmail+"'>\
      <input name='responseUrl'    type='hidden'  value='"+info.responseUrl+"'>\
      <input name='confirmationUrl'     type='hidden'  value='"+info.confirmationUrl+"'>\
      <input name='Submit'        type='submit'  value='Pagar'>\
    </form>";


$("#botonPayuContainer").append(html_button_payu);

             }
             )
             .fail(function(){
                console.log("error de controller");
             })
             ;

}




function CrearBotonPaypal()
{
		var totalcarrito=document.getElementById("htotal").value;

        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'Acq9ayY5fr3aNZoWF34rGnO8TCR8Q6UwWLX6z23E-GCFnUVmqB_lpVjVLCskVWOlT10w-jyjoPrfelmH',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: totalcarrito, currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function(transaction) {
                    console.log(transaction);
                    guardarTransaccion(transaction);
                });
            }

        }, '#paypal-button-container');
}
        function guardarTransaccion(transaction)
        {
        	$.ajax({
        		method:"POST",
        		url: "/carrito/guardarpago",
        		data: {idtransaccion: transaction.id, estado:transaction.state, idclientepago:transaction.payer.payer_info.payer_id}
        	})
        	.done(function( msg ){
        		console.log("transaction guardado");

        		window.location="/carrito/confirmarpago";

        	});
        }