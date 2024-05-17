@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center">Listado de entradas</h2>
  @if (session()->has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Nombre propietario</th>
                <th>Telefono propietario</th>
                <th>Celda</th>
                <th>Empleado</th>
                <th>Hora entrada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entrada)
                 <tr>
                    <td>{{ $entrada->id}}</td>
                    <td>{{ $entrada->placa}}</td>
                    <td>{{ $entrada->nombre}}</td>
                    <td>{{ $entrada->tel}}</td>
                    <td>@if ($entrada->celda)
                        <p>{{ $entrada->celda->lugar }}</p>
                    @else
                        <p>Esta entrada no tiene una celda asignado.</p>
                    @endif</td>
                    <td>@if ($entrada->empleado)
                        <p>{{ $entrada->empleado->name }}</p>
                    @else
                        <p>Esta entrada no tiene un empleado asignado.</p>
                    @endif</td>
                    <td>{{ $entrada->created_at}}</td>
                    <td>
                        <a href="{{ route('entradas.show', $entrada->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('entradas.show', $entrada->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
                <a href="{{ route('entradas.create') }}" class="btn btn-secondary my-3">Crear entrada</a>
                <a href="{{ route('home') }}" class="btn btn-secondary mx-5">Home</a>
        </tbody>
    </table>
</div>
@endsection