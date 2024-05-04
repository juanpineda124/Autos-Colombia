@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">Crear Entrada</h1>
  <form action="{{ route('entradas.store')}}" method="post">
    @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input class="form-control" type="text" name="placa" id="placa" placeholder="Placa"> 
            </div>

            <div class="form-group">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre propietario</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre propietario"> 
            </div>

            <div class="form-group">
            <div class="mb-3">
                <label for="tel" class="form-label">Telefono propietario</label>
                <input class="form-control" type="text" name="tel" id="tel" placeholder="Telefono propietario"> 
            </div>

            <div class="form-group">
            <div class="mb-3">
                <label for="celda" class="form-label">Celda</label>
                <input class="form-control" type="text" name="celda" id="celda" placeholder="celda"> 
            </div>

            <button class="btn btn-success my-3" type="submit">Guardar</button>
            <a href="{{ route('entradas.index') }}" class="btn btn-secondary mx-5">Regresar</a>
        </div>
    </form>
</div>
@endsection
