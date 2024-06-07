@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center"><b>Lista de pagos</b></h2>
  @if (session()->has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>
  
  <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Nombre Propietario</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
                <th>Tiempo Estacionado</th>
                <th>Monto Pagado</th>
                <th>Hora de pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
                 <tr>
                    <td>{{ $pago->id }}</td>
                    <td>@if ($pago->salida->entrada)
                            {{ $pago->salida->entrada->placa }}
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>@if ($pago->salida->entrada)
                            {{ $pago->salida->entrada->nombre }}
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>@if ($pago->salida->entrada)
                            {{ $pago->salida->entrada->created_at }}
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>@if ($pago->salida)
                            {{ $pago->salida->created_at }}
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $pago->tiempo_estacionado }}</td>
                    <td> $ {{ number_format($pago->monto_pagado, 2) }}</td>
                    <td> $ {{ $pago->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection