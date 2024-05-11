@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center"><b>Lista de salidas</b></h2>
  @if (session()->has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  <a href="{{ route('salidas.create') }}" class="btn btn-secondary mb-3">Crear salida</a>
  <a href="{{ route('home') }}" class="btn btn-secondary mb-3 mx-5">Home</a>
  
  <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Telefono Propietario</th>
                <th>Hora entrada</th>
                <th>Hora salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salidas as $salida)
                 <tr>
                    <td>{{ $salida->id}}</td>
                    <td>@if ($salida->entrada)
                        <p>{{ $salida->entrada->placa }}</p>
                    @else
                        <p>Esta salida no tiene una placa asignada.</p>
                    @endif</td>
                    <td>@if ($salida->entrada)
                        <p>{{ $salida->entrada->tel }}</p>
                    @else
                        <p>Esta salida no tiene un telefono asignado.</p>
                    @endif</td>
                    <td>@if ($salida->entrada)
                        <p>{{ $salida->entrada->created_at }}</p>
                    @else
                        <p>Esta salida no tiene una placa asignada.</p>
                    @endif</td>
                    <td>{{ $salida->created_at}}</td>
                    <td>
                        <a href="{{ route('salidas.show', $salida->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('salidas.edit', $salida->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('salidas.show', $salida->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection