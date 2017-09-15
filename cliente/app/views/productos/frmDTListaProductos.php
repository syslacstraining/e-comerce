<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="/js/jquery-3.2.0.js"></script>
	<script type="text/javascript" src="/js/datatables.min.js"></script>

	<link rel="stylesheet" type="text/css" href="/css/datatables.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>


<script type="text/javascript">
	$(document).ready(function(){
		$('#TProductos').DataTable({
			"ajax": "/productos/listarproductosyerson",

			"columns": [
			            { "data": "id" },
			            { "data": "codigo" },
			            { "data": "nombre" },
			            { "data": "categoria" }
			        ],

			        "columnDefs": [
			        {"targets":[4],"visible":true,
			        	"render": function(data, type, row){
			        		console.log(row);
			        		return "<input class='btn btn-primary btn-xs' type='button' onclick='editarproducto("+row.id+")' value='Editar'>"
			        	}
			    	},

			   		{"targets":[5],"visible":true,
			        	"render": function(data, type, row){
			        		return "<input class='btn btn-danger btn-xs' type='button' value='Eliminar'>"
			        	}
			    	},
			        	{"targets":[0],"visible":false}
			        
			        

			        ]



		});
	});


function editarproducto(idproducto){
	console.log(idproducto);
}

</script>
	
	<div style="padding-top: 20px; " class="container">
		<div>
			<div>
				<table id="TProductos" class="display table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr class="warning">
							<th>ID</th>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th width="20px">Editar</th>
							<th width="20px">Eliminar</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>