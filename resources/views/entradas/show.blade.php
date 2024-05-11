@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="background-color: #d1f7d1;">
        <div class="card-header">
            <h1 class="card-title">PLACA: {{ $entrada->placa}}</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="margin">
                    <p><strong>Nombre propietario:</strong> {{ $entrada->nombre }}</p>
                    <p><strong>Telefono propietario:</strong> {{ $entrada->tel }}</p>
                    <p><strong>Celda:</strong> {{ $entrada->celda->lugar }}</p>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="margin">
                    <p><strong>Fecha de creación:</strong> {{ $entrada->created_at }}</p>
                    <p><strong>Fecha de actualización:</strong> {{ $entrada->updated_at }}</p>
                </div>
            </div>  
        </div>
        <div class="card-footer d-flex justify-content-start align-items-center">
            <a href="{{ route('entradas.index') }}" class="btn btn-secondary me-2">Regresar</a>
            <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-primary me-2">Editar</a>
            <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection