@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #d1f7d1;">
                    <div class="card-header text-center"><b>Crear salida</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('salidas.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="entrada">Placa:</label>
                                <select name="entrada_id" id="entrada" class="form-control">
                                    <option value="" disabled selected>Elige una placa</option>
                                    @foreach($entradas as $entrada)
                                        <option value="{{ $entrada->id }}">{{ $entrada->placa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mb-3">Guardar</button>
                            <a href="{{ route('entradas.index') }}" class="btn btn-secondary mx-5 mb-3">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection