@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Editar Celda</h3>
    <form action="{{ route('celdas.update', $celda->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3
        @error('lugar')
            has-error
        @enderror">
            <label for="lugar">Celda</label>
            <input type="text" name="lugar" id="lugar" class="form-control"
                value="{{ $celda->lugar }}">
            @error('lugar')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="active">Estado</label>
            <select name="active" id="active" class="form-control">
                <option value="1" {{ $celda->active ? 'selected' : ''}}>Libre</option>
                <option value="0" {{ !$celda->active ? 'selected' : ''}}>Ocupado</option>
            </select>
        </div>
        <button class="btn btn-success mb-3" type="submit">Guardar</button>
        <a href="{{ route('celdas.index') }}" class="btn btn-secondary mx-5 mb-3">Regresar</a>
    </form>
    
</div>
@endsection