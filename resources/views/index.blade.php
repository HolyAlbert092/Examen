<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agenda</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></link>
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css"></link>
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap4.css"></link>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
	
</head>
<body>
	<div class="container pt-3">
		<div class="container pt-3">
		@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
	@endif
		<a href="/add" class="btn btn-primary">Nuevo</a>
		<a href="/descargar" class="btn btn-success"><i class="bi-download"></i></a>
	</div>
	<div class="container pt-3">
    <table id="agenda" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>               
                <th>Nombre</th>
                <th>Domicilio</th>
                <th>#</th>
                <th>Colonia</th>
                <th>CP</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($agenda as $agenda)
            <tr>
               
                <td>{{$agenda->name}}</td>
                <td>{{$agenda->address}}</td>
                <td>{{$agenda->number}}</td>
                <td>{{$agenda->colony}}</td>
                <td>{{$agenda->pc}}</td>
                <td>{{$agenda->city}}</td>
                <td>{{$agenda->state}}</td>
                <td>{{$agenda->phone}}</td>
                <td>{{$agenda->email}}</td>
                <td>{{$agenda->lat}}</td>
                <td>{{$agenda->long}}</td>
                <td><a href="/edit/{{$agenda->id}}" class="btn btn-success btn-sm"><i class="bi-pencil"></i></a> <a href="/eliminar/{{$agenda->id}}" class="btn btn-danger btn-sm"><i class="bi-trash"></a></td>

            </tr>
           @endforeach
        </tbody>
        <tfoot>
            <tr>                
                <th>Nombre</th>
                <th>Domicilio</th>
                <th>#</th>
                <th>Colonia</th>
                <th>CP</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
	</div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> 
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script> 
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap4.js"></script>
    <script>
    	new DataTable('#agenda', {
    		responsive: true,
    		autoWidth: false,
    		 language: {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "Sin resultados encontrados",
    "paginate": {
      "first": "Primero",
      "last": "Último",
      "next": "Siguiente",
      "previous": "Anterior"
    }
  }
    	});
    </script>

</body>
</html>