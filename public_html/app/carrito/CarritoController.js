$(document).ready(function(){
    CargarCarrito();
});


function CargarCarrito()
{
    $("#htotal").html("0");
    $("#botonPayuContainer").html("");
    $("#idPayuButtonContainer").html("");

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


    var montoPago=$("#htotal").val();

     $.ajax({
                dataType: "json",
                method:"GET",
                url: "/pagos/obtenerinformacionpago/"+montoPago
                })
            .done(function( infopago ){

            var html_button="<form method='post' action='https://sandbox.gateway.payulatam.com/ppp-web-gateway/'>\
              <input name='merchantId'    type='hidden'  value='"+infopago.merchantId+"'   >\
              <input name='accountId'     type='hidden'  value='"+infopago.accountId+"'   >\
              <input name='description'   type='hidden'  value='"+infopago.description+"'   >\
              <input name='referenceCode' type='hidden'  value='"+infopago.referenceCode+"'   >\
              <input name='amount'        type='hidden'  value='"+infopago.amount+"'   >\
              <input name='tax'           type='hidden'  value='"+infopago.tax+"'   >\
              <input name='taxReturnBase' type='hidden'  value='"+infopago.taxReturnBase+"'   >\
              <input name='currency'      type='hidden'  value='"+infopago.currency+"'   >\
              <input name='signature'     type='hidden'  value='"+infopago.signature+"'   >\
              <input name='test'          type='hidden'  value='"+infopago.test+"'   >\
              <input name='buyerEmail'    type='hidden'  value='"+infopago.buyerEmail+"'   >\
              <input name='responseUrl'    type='hidden'  value='"+infopago.responseUrl+"'   >\
              <input name='confirmationUrl'    type='hidden'  value='"+infopago.confirmationUrl+"'   >\
              <input name='Submit'        type='submit'  value='Pagar' >\
            </form>";

            $("#idPayuButtonContainer").append(html_button);

    });

}

