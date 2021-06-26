<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Reservaciones</title>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

		<style>
		.fondo {
   background: url("{{ asset('images/fondo.png') }}")no-repeat center center fixed  ;
   
}
		
		
		
		</style>

	</head>

	<body>
	
		<!-- partial:index.partial.html -->
		<nav class="mnb navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">

      <div style="padding: 15px 0;">
         <a href="#" id="msbo" style="color:white;"><i class="ic fa fa-bars"></i></a>
      </div>

				</div>
				<div id="navbar" class="navbar-collapse collapse ">
				
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
								aria-haspopup="true" aria-expanded="false" style="color:white;">
								{{ ucfirst(Auth::user()->name) }} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								
								
								<!-- <li role="separator" class="divider"></li> -->
								
							
								
								<li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

										{{ __('Cerrar Sesion') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST"
										style="display: none;">
										@csrf
									</form>
								</li>
							</ul>
						</li>
						<li><a style="color:white;" href="#"><i class="fa fa-bell-o"></i></a></li>
						<li><a href="#" style="color:white;"><i class="fa fa-comment-o"></i></a></li>
					</ul>

				</div>
			</div>
		</nav>
		<!--msb: main sidebar-->
		<div class="msb" id="msb">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="brand-wrapper">
						<!-- Brand -->
						<div class="brand-name-wrapper">
							<a class="navbar-brand" href="#" style="color:white;">
								RESERVACION
							</a>
						</div>

					</div>

				</div>

					
				<!-- Main Menu -->
				<div class="side-menu-container">
					<ul class="nav navbar-nav">
					
						
						@if (auth::user()->tipo != 'empleado')
					<li><a href="{{ route('aprobadas.index') }}"><i class="fa fa-check-circle-o" style="font-size:20px"></i>Aprobadas</a></li>
					<li><a href="{{ route('pendientes.index') }}"><i class="fa fa-clock-o" style="font-size:20px"></i> Pendientes </a></li>
					<li><a href="{{ route('rechazadas.index') }}"><i class="fa fa-close" style="font-size:20px"></i>Rechazadas</a></li>
					<li><a href="{{ route('usuario.index') }}"><i class="fa fa-user-circle" style="font-size:20px"></i>Usuarios</a></li>
					<!-- Dropdown -->
						<li class="panel panel-default" id="dropdown">
							<a data-toggle="collapse" href="#dropdown-lvl1">
								<i class="fa fa-cogs"></i> Configuraciones
								<span class="caret"></span>
							</a> 
							<!-- Dropdown level 1 -->
							 <div id="dropdown-lvl1" class="panel-collapse collapse">
								<div class="panel-body">
									<ul class="nav navbar-nav">
									<li><a href="{{ route('usuario.show','id') }}" ><i class="fa fa-key"></i> Contraseña</a></li>
									<li><a  href="{{ route('admin.show','id') }}"><i class="fa fa-institution"></i>Administrar Sedes</a></li>
									<li><a  href="{{ route('aprobadas.show','id') }}"><i class="fa fa-bar-chart"></i>Informes</a></li>
										<!-- <li><a href="#">User</a></li>
										<li><a href="#">Social</a></li> -->

										<!-- Dropdown level 2 -->
										<!-- <li class="panel panel-default" id="dropdown">
											<a data-toggle="collapse" href="#dropdown-lvl2">
												<i class="glyphicon glyphicon-off"></i> Sub Level <span
													class="caret"></span>
											</a>
											<div id="dropdown-lvl2" class="panel-collapse collapse">
												<div class="panel-body">
													<ul class="nav navbar-nav">
														<li><a href="#">Link</a></li>
														<li><a href="#">Link</a></li>
														<li><a href="#">Link</a></li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>
						</ul>
				</div> -->
					@else
				
					
						@endif
						

						
			</nav>
		</div>

	

		@include('modals/ver')
		@include('modals/ver_rechazada')
		@include('modals/editar')
        @include('auth/register')
		@include('emails/negar')
		

		<!--main content wrapper-->
		<div class="mcw fondo">
			<!--navigation here-->
			<!--main content view-->
			@yield('contenido')
		</div>
		<!-- partial -->
		<script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	

	</body>


	<script>

		// function convertir(hora){

		// 	var horaa = new Date('1970-01-01T' + hora + 'Z')
        //               .toLocaleTimeString('en-US',
        //                 {timeZone:'UTC',hour12:true,hour:'numeric',minute:'numeric'} );

		// 	return horaa;


		// }
	
	$(document).ready(function(){
	$(document).on('click', '.ver', function(){
		var id=$(this).val();
		var identificacion=$('#identificacion'+id).val();
		var nombre=$('#nombre'+id).text();
		var telefono=$('#telefono'+id).val();
		var correo=$('#correo'+id).val();
		var sede=$('#sede'+id).text();
		var espacio=$('#espacio'+id).text();
		var facultad=$('#facultad'+id).val();
		var tipo=$('#tipo'+id).val();
		var fecha=$('#fecha'+id).text();
		var horai=$('#hora_inicio'+id).text();
		var horaf=$('#hora_fin'+id).text();
		var motivo=$('#motivo'+id).val();

		
						
     $('#ver').modal('show');
	 $('#mide').text(identificacion);
	 $('#mnombre').text(nombre);
	 $('#mtelefono').text(telefono);
	 $('#mcorreo').text(correo);
	 $('#msede').text(sede);
	 $('#mespacio').text(espacio);
	 $('#mfacultad').text(facultad);
	 $('#mtipo').text(tipo);
	 $('#mfecha').text(fecha);
	 $('#mhorai').text(horai);
	 $('#mhoraf').text(horaf);
	 $('#mmotivo').text(motivo);
	
	});
});
	
	</script>



<script >  


$(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
	var identificacion=$('#identificacion'+id).text();
    var name=$('#name'+id).text();
    var email=$('#email'+id).text();
	var telefono=$('#telefono'+id).text();
	var tipo=$('#tipo'+id).text();
	var sede=$('#sede'+id).text();
    
    
      // funcion para trasladar datos a modal
	
 
	
    $('#edit').modal('show');
    $('#id').val(id);
	$('#midentificacion').val(identificacion);
    $('#mname').val(name);
    $('#memail').val(email);
    $('#mmtelefono').val(telefono);
	$('#mmtipo').val(tipo);
	$('#mmsede').val(sede);
    
	
	});
});

</script>


<script> 
$(document).ready(function(){
	$(document).on('click', '.aprobar', function(){
		var sede=$(this).val();

		$('#aprobar').modal('show');


	});
});

</script>

<script>
	
$(document).ready(function(){
	$(document).on('click', '.rechazada_ver', function(){
		var id=$(this).val();
		var identificacionr=$('#identificacionr'+id).val();
		var nombrer=$('#nombresr'+id).text();
		var telefonor=$('#telefonor'+id).val();
		var correor=$('#correor'+id).val();
		var seder=$('#seder'+id).text();
		var espacior=$('#espacior'+id).text();
		var facultadr=$('#facultadr'+id).val();
		var tipor=$('#tipor'+id).val();
		var fechar=$('#fechar'+id).text();
		var horair=$('#horair'+id).text();
		var horafr=$('#horafr'+id).text();
		var motivor=$('#motivor'+id).val();
		var mensajer=$('#mensajer'+id).val();

		
						
     $('#rechazadaver').modal('show');
	 $('#ride').text(identificacionr);
	 $('#rnombre').text(nombrer);
	 $('#rtelefono').text(telefonor);
	 $('#rcorreo').text(correor);
	 $('#rsede').text(seder);
	 $('#respacio').text(espacior);
	 $('#rfacultad').text(facultadr);
	 $('#rtipo').text(tipor);
	 $('#rfecha').text(fechar);
	 $('#rhorai').text(horair);
	 $('#rhoraf').text(horafr);
	 $('#rmotivo').text(motivor);
	 $('#rmensaje').text(mensajer);
	
	});
});
	
	</script>


<script> 
$(document).ready(function(){
	$(document).on('click', '.negar', function(){
		
		var id=$(this).val();

		// alert(id);
		
		var nombre=$('#nombre'+id).text();
		var correo=$('#correo'+id).val();
		var fecha=$('#fecha'+id).val();
		var horai=$('#hora_inicio'+id).text();
		var horaf=$('#hora_fin'+id).text();

		$('#negar').modal('show');
		
		$('#nid').val(id);
		$('#nombre').val(nombre);
		$('#correo').val(correo);
		$('#fecha').val(fecha);
		$('#horai').val(horai);
		$('#horaf').val(horaf);

		
	

	});
});

</script>

@if (auth::user()->tipo != 'empleado')

<script>
(function(){
  $('#msbo').on('click', function(){
    $('body').toggleClass('msb-x');
  });
}());



</script>

@else 

<script>

    $('body').toggleClass('msb-x');




</script>

@endif



</html>