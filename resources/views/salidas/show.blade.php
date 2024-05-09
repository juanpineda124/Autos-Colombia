@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="background-color: #d1f7d1;">
        <div class="card-header">
            @if ($salida->entrada)
                <h1><strong>Placa:</strong> {{ $salida->entrada->placa }}</h1>
            @else
                <p><strong>Placa:</strong> Esta salida no tiene una placa asignada.</p>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="margin">
                    <p><strong>Nombre Propietario:</strong> {{ $salida->entrada->nombre }}</p>
                    <p><strong>Telefono Propietario:</strong> {{ $salida->entrada->tel }}</p>
                    <p><strong>Celda:</strong> {{ $salida->entrada->celda }}</p>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="margin">
                    <p><strong>Fecha de entrada:</strong> {{ $salida->entrada->created_at }}</p>
                    <p><strong>Fecha de creación:</strong> {{ $salida->created_at }}</p>
                    <p><strong>Fecha de actualización:</strong> {{ $salida->updated_at }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-start align-items-center">
            <a href="{{ route('salidas.index') }}" class="btn btn-secondary me-2">Regresar</a>
            <a href="{{ route('salidas.edit', $salida->id) }}" class="btn btn-primary me-2">Editar</a>
            <form action="{{ route('salidas.destroy', $salida->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection