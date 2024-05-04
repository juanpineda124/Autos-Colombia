@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Editar Salida</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <form action="{{ route('salidas.update', $salida->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="entrada">placa:</label>
            <select name="entrada_id" id="entrada" class="form-control">
                @foreach($entradas as $entrada)
                    <option value="{{ $entrada->id }}" 
                    @if($entrada->id == $salida->entrada_id) selected @endif>{{ $entrada->placa}}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success mb-3" type="submit">Guardar</button>
        <a href="{{ route('salidas.index') }}" class="btn btn-secondary mx-5 mb-3">Regresar</a>
    </form>
</div>
@endsection