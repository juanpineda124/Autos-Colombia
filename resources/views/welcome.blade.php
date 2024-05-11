@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="line-height: 2;" class="text-center"><b>¡Bienvenido al servicio de Parqueaderos Mensuales!</b></h1>
    <div class="contenedor mb-4">
    <img src="{{ asset('images/parqueadero.jpeg') }}" alt="imagen logo parqueadero">
    </div>

    <p style="text-align: justify; font-size: 1.2em; padding: 0 20px;">¿Buscas estacionamiento seguro y sin 
    complicaciones a largo plazo? Nuestro servicio de Parqueaderos Mensuales es la solución perfecta. Con 
    acceso exclusivo y flexible para tu vehículo personal o de trabajo, te olvidarás del estrés de buscar 
    aparcamiento diariamente. Con un enfoque en la seguridad y la comodidad, nuestras instalaciones protegen 
    tu vehículo las 24 horas del día. Únete a nuestra comunidad y disfruta de la conveniencia que ofrecemos.</p>

    <div class="links">
        <a href="{{ route('celdas.index') }}" class="btn btn-light mb-2">Registro celdas</a>
        <a href="{{ route('entradas.index') }}" class="btn btn-light mb-2">Registro entrada vehículos</a>
        <a href="{{ route('salidas.index') }}" class="btn btn-light mb-2">Registro salida vehiculos</a>
        <a href="{{ route('users.index') }}" class="btn btn-light mb-2">Empleados</a>
    </div>
</div>
@endsection