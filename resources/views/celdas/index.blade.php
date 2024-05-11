@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center">Lista De Celdas</h2>
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
                <th>Celda</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($celdas as $celda)
                 <tr>
                    <td>{{ $celda->id}}</td>
                    <td>{{ $celda->lugar}}</td>
                    <td>
                        @if ($celda->active)
                            Libre
                        @else
                            Ocupado
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('celdas.edit', $celda->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('celdas.show', $celda->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            <a href="{{ route('celdas.create') }}" class="btn btn-secondary my-3">Crear celda</a>
            <a href="{{ route('home') }}" class="btn btn-secondary mx-5">Home</a>
        </tbody>
    </table>
</div>
@endsection
