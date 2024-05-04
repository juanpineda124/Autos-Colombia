@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center">Listado de empleados</h2>
  <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $empleado)
                 <tr>
                    <td>{{ $empleado->id}}</td>
                    <td>{{ $empleado->name}}</td>
                    <td>{{ $empleado->phone}}</td>
                    <td>{{ $empleado->email}}</td>
                </tr>
            @endforeach
                <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>
        </tbody>
    </table>
</div>
@endsection