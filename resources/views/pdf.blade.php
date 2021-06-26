<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
#content {
     position:relative;
}

.ribbon {
     position:absolute;
     top:0;
     right:0;
}
</style>
  

</head>
<body>
<img src="../public/images/transparente.png" class="ribbon" width="60" height="60" />   
<div align="center">
<h2 ><i>Informe De Solicitudes Aprobadas    </i> </h2>

<h5><?php
        setlocale(LC_TIME, 'es');
       echo \Carbon\Carbon::parse($f1)->formatLocalized(' %d de %B de %Y')
        ?> -- <?php
        setlocale(LC_TIME, 'es');
       echo \Carbon\Carbon::parse($f2)->formatLocalized(' %d de %B de %Y')
        ?>
</h5>

</div>
  

    

    

<table class="table" style="width:100%" >
    <thead class="thead-dark" style="background:#4A4D50;color:white;">
      <tr style="text-align:center;">
        <th>#</th>
        <th>solicitante</th>
        <th>Fecha</th>
        <th>Sede</th>
        <th>Espacio</th>
        <th>Horas</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($informe as $datos)
      <tr style="text-align:center">
        <td><span><strong> {{$loop->iteration}} </strong></span></td>
        <td><span >{{ucfirst ($datos->nombres) }} {{ucfirst ($datos->apellidos) }}</span></td>
        <td ><span><?php
        setlocale(LC_TIME, 'es');
       echo \Carbon\Carbon::parse($datos->fecha)->formatLocalized(' %d de %B de %Y')
        ?></span></td>
        <td><span> {{ $datos->sede}}</span></td>
        <td><span> {{ $datos->salon}}</span></td>
        <td><span>{{date('g:i A',strtotime($datos->hora_inicio))}} - {{date('g:i A',strtotime($datos->hora_fin))}}</span></td>
      

      </tr>

      @endforeach
    
    </tbody>

</table>
  
</body>
</html>