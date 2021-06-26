@extends('home')

@section('contenido')

  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js">
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
</script>


<div class="container-fluid" style="background:white">

@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

  <h2>Exportar Informes</h2>

  <br> <br>

                    <form class="center-block form-inline" style="width:500px"  action="{{ route('aprobadas.create') }}" >
                    @csrf

                    <h3 align="center">Rango De Fechas</h3>
                    <br>

                  <div class="form-group" align="center">
                  <label for="fecha1">Fecha de Inicio</label>
                  <br>
                      <div class="input-group">
                      <span class="input-group-addon "><i class="fa">&#xf073;</i></span>
                                        
                     <input name="fecha1" id="fecha1" class="datepicker form-control " type="text" required>
                        </div>
                  </div>

                  <div class="form-group" align="center">
                  <label for="fecha2" >Fecha Final</label>
                  <br>
                      <div class="input-group">
                      <span class="input-group-addon "><i class="fa">&#xf073;</i></span>
                                        
                     <input name="fecha2" id="fecha2" class="datepicker form-control " type="text" required>
                        </div>
                  </div>

                      <div class="form-group col-md-11 ">
                          <br>
                      <button type="submit" class="btn btn-success btn-lg btn-block " ><i class="fa fa-file-pdf-o"> Generar Reporte</i> </button>
                      </div>
                      
                      

                    </form>
<br> <br>
<br><br>
<br><br>
<br>
<br>
<br>
<br>
<br>
                    </div>


<script type="text/javascript">




$('.datepicker').datetimepicker({

format: 'YYYY-MM-DD',
daysOfWeekDisabled: [0, 0],
locale: 'es',

});



</script>

@endsection