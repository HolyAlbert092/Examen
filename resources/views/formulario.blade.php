<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></link>
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css"></link>
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap4.css"></link>
	<title>Registro</title>
	<title></title>
</head>
<body>
	 <style>

         input.error{
          border-color: red;
         }

         
      </style>
	<div class="container pt-3">
		@if(session('error'))
    <div class="alert alert-info">
        {{ session('error') }}
    </div>
@endif
		<p><strong>Nuevo contacto </strong></p>
		<form id="formulario" action="{{ route('agregar') }}" method="POST">
			@csrf
  			<div class="form-group">
    			<label for="name">*Nombre</label>
   				<input type="text" class="form-control" id="name" placeholder="" @isset($request) value="{{$request['name']}}"@endisset name="name" >   				
 			</div>
  			<div class="form-group">
    			<label for="street">*Domicilio</label>
   				<input type="text" class="form-control" id="street" name="street" placeholder="" @isset($request) value="{{$request['street']}}"@endisset>
 			</div>
 			<div class="form-group">
    			<label for="number">*Número</label>
   				<input type="text" class="form-control input-number" id="number" name="number" placeholder="" @isset($request) value="{{$request['number']}}"@endisset maxlength="10">
 			</div>

 			<div class="form-group">
    			<label for="pc">*Codigo postal</label>
   				<input type="text" class="form-control" id="pc" name="pc" placeholder="" @isset($request) value="{{$request['pc']}}"@endisset>
 			</div>

 			<div class="form-group">
    			<label for="colony">*Colonia</label>
   				<input type="text" class="form-control" id="colony" name="colony" placeholder="" @isset($request) value="{{$request['colony']}}"@endisset>
 			</div>

 			<div class="form-group">
    			<label for="city">*Ciudad</label>
   				<input type="text" class="form-control" id="city" name="city" placeholder="" @isset($request) value="{{$request['city']}}"@endisset>
 			</div>

 			<div class="form-group">
    			<label for="state">*Estado</label>
   				<input type="text" class="form-control" id="state" name="state" placeholder="" @isset($request) value="{{$request['state']}}"@endisset>
 			</div>

 			<div class="form-group">
    			<label for="phone">*Telefono</label>
   				<input type="text" class="form-control input-number" name="phone" placeholder="" @isset($request) value="{{$request['phone']}}"@endisset maxlength="10">
   				
 			</div>
  		
  			<div class="form-group">
    			<label for="email">*Correo electronico</label>
   				<input type="email" class="form-control" id="email" name="email" placeholder="" @isset($request) value="{{$request['email']}}"@endisset>
 			</div>
  			
  			<button type="submit" class="btn btn-success" id="btnGPS" >Generar datos GPS</button>

  			<div class="form-group">
    			<label for="lat">*Latitud</label>
   				<input type="text" class="form-control" id="lat" name="lat" placeholder="" @isset($lat) value="{{$lat}}"@endisset disabled>
   				 <input type="hidden"  name="latitud" @isset($lat) value="{{$lat}}"@endisset>
 			</div>

 			<div class="form-group">
    			<label for="long">*Longitud</label>
   				<input type="text" class="form-control" id="long" name="long" placeholder="" @isset($long) value="{{$long}}"@endisset disabled>
   				 <input type="hidden"  name="longitud" @isset($lat) value="{{$long}}"@endisset>
 			</div>
 			<button type="button" class="btn btn-primary" id="btnEnviar" >Agregar</button>
 			<a href="/" class="btn btn-secondary" >Regresar</button>
 			
		</form>
	</div>

	 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	 <script>

	 	function validar()
	 	{
	 		$("#formulario").validate({
 				rules: {
 					name: {
 						required: true,
  					},

 					street: {
 						required: true,
 					},

 					number: {
 						required: true,
 					},

 					colony: {
 						required: true,
 					},

 					city: {
 						required: true,
 					},

 					state: {
 						required: true,
 					},

 					phone: {
 						required: true,
 						minlength: 10
 					
 					},

 					pc: {
 						required: true,
 					},

 					email: {
 						required: true,
 						email: true,
 					},
 				},
 				messages:{
 					name: {
 						required: "Campo obligatorio",
 						minlenght: "Tu nombre debe ser de mas de 2 caracteres"
 					},

 					street: {
 						required: "Campo obligatorio"
 					},

 					number: {
 						required: "Campo obligatorio"
 					},

 					city: {
 						required: "Campo obligatorio"
 					},

 					colony: {
 						required: "Campo obligatorio"
 					},

 					state: {
 						required: "Campo obligatorio"
 					},

 					phone: {
 						required: "Campo obligatorio",
 						minlength: "Ingresa 10 digitos"
 					},

 					pc: {
 						required: "Campo obligatorio",
 					},

 					email: {
 						required: "Campo obligatorio",
 						email: "favor de ingresar un formato de correo valido"
 					}
 				}
 			});
	 	}
 		

		$('.input-number').on('input', function () { 
    		this.value = this.value.replace(/[^0-9]/g,'');
		});

		function verificarCampos() {
       		var camposLlenos = true;
        	$('#colony, #city,#state,#pc').each(function() {
          	if ($(this).val().trim() === "") {
            	camposLlenos = false;  
            	return false; 
          		}
        	});

        	if (camposLlenos) {
         		$('#btnGPS').prop('disabled', false);
       		} else {
          		$('#btnGPS').prop('disabled', true);
        	}        	
      	}

      	function coords() {
      		var info = true;
      		$('#lat, #long').each(function() {
          	if ($(this).val().trim() === "") {
            	info = false;  
            	return false; 
          		}
        	});
        	if(info){
        		$('#btnEnviar').prop('disabled',false);        		
        	} else {
        		$('#btnEnviar').prop('disabled',true);
        	}
      	}

      $('#colony, #city,#state,#pc').on('input', function() {
        verificarCampos(); 
      });

       $('#btnGPS').on('click', function() {
        $('#formulario').attr('action', '/cargarDatos/0'); 
        $('#formulario').submit();  
      });
       $('#btnEnviar').on('click',function() {
       		validar();
        	$('#formulario').submit();
       });

      verificarCampos();
      coords();
	 </script>

</body>
</html>