@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">Crear Celda</h1>
  <form action="{{ route('celdas.store')}}" method="post">
    @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="lugar" class="form-label">celda</label>
                <input class="form-control" type="text" name="lugar" id="lugar" placeholder="Celda"> 
            </div>

            <div class="mb-3">
                <label for="active">Libre</label>
                <input class="form-check-input" type="checkbox" name="active" id="active" value="1"> 
            </div>

            <button class="btn btn-success my-3" type="submit">Guardar</button>
            <a href="{{ route('celdas.index') }}" class="btn btn-secondary mx-5">Regresar</a>
        </div>
    </form>
</div>
@endsection
