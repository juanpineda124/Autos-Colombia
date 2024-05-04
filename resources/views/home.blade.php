@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="background-color: #ffffcc;">
                <div class="card-header">{{ __('Panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center"><b>{{ __('¡Bienvenido al servicio de Parqueaderos Mensuales!') }}</b></h1>
                </div>
                <div class="form-group">
                    <div class="contenedor mb-4">
                        <img src="{{ asset('images/parqueadero.jpeg') }}" alt="imagen logo parqueadero">
                        </div>

                        <p style="text-align: justify; font-size: 1.2em; padding: 0 20px;">¿Buscas estacionamiento seguro y sin complicaciones 
                            a largo plazo? Nuestro servicio de Parqueaderos Mensuales es la solución perfecta. Con acceso exclusivo 
                            y flexible para tu vehículo personal o de trabajo, te olvidarás del estrés de buscar aparcamiento 
                            diariamente. Con un enfoque en la seguridad y la comodidad, nuestras instalaciones protegen tu vehículo 
                             las 24 horas del día. Únete a nuestra comunidad y disfruta de la conveniencia que ofrecemos.</p>
                    <!-- Agregue un contenedor para aplicar el margen -->
                    <div class="mx-4"> 
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <img src="{{ asset('images/empleados.png') }}" class="card-img-top" alt="imagen lista de empleados">
                                    <div class="card-header">
                                        Usuarios
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Ingresa y visualiza la lista de empleados registrados.</p>
                                        <a href="{{ route('users.index') }}" class="btn btn-primary">Ingresar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <img src="{{ asset('images/entradas.png') }}" class="card-img-top" alt="imagen lista de autos">
                                    <div class="card-header">
                                        Entrada de autos
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Ingresa y visualiza los autos registrados.</p>
                                        <a href="{{ route('entradas.index') }}" class="btn btn-primary">Ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                                <div class="card">
                                    <img src="{{ asset('images/salidas.png') }}" class="card-img-top" alt="imagen salida de autos">
                                    <div class="card-header">
                                        Salida de autos
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Ingresa y visualiza la salida de autos.</p>
                                        <a href="{{ route('salidas.index') }}" class="btn btn-primary">Ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
