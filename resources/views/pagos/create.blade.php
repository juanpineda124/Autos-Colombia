@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="background-color: #ffffcc;">
        <h2 class="text-center"><b>Realizar Pago</b></h2>
        <div class="card-header">
            <h1><strong>Placa:</strong> {{ $salida->entrada->placa }}</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="margin">
                <p><strong>Nombre propietario:</strong> {{ $salida->entrada->nombre }}</p>
                <p><strong>Hora de Entrada:</strong> {{ $salida->entrada->created_at }}</p>
                <p><strong>Hora de Salida:</strong> {{ $salida->created_at }}</p>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="margin">
                    <p><strong>Tiempo Estacionado:</strong> {{ $tiempoEstacionado }}</p>
                    <p><strong>Monto a Pagar:</strong> ${{ number_format($montoAPagar, 2) }} </p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-start align-items-center">
            <form action="{{ route('pagos.store') }}" method="POST">
                @csrf
                <input type="hidden" name="salida_id" value="{{ $salida->id }}">
                <input type="hidden" name="monto" value="{{ $montoAPagar }}">
                <button type="submit" class="btn btn-success">Pagar</button>
                <a href="{{ route('salidas.index') }}" class="btn btn-secondary mx-5">Regresar</a>
            </form>
        </div>
    </div>
</div>
@endsection