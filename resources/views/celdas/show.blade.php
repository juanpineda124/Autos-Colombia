@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Detalle de la Celda</h3>

    <div class="card">
        <div class="card-body">
            {{ $celda->id }}
            {{ $celda->lugar }}
            @if ($celda->active)
                Libre
            @else
                Ocupado
            @endif
        </div>
        <a class="btn btn-primary mb-3" href="{{ route('celdas.edit', $celda->id) }}">Editar</a>
        <form action="{{ route('celdas.destroy', $celda->id) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mb-3">Eliminar</button>
            <a href="{{ route('celdas.index') }}" class="btn btn-secondary mx-5 mb-3">Regresar</a>
        </form>
    </div>
</div>
@endsection