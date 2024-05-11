@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Editar Entrada</h3>
    <form action="{{ route('entradas.update', $entrada->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3
        @error('placa')
            has-error
        @enderror">
            <label for="placa">Placa</label>
            <input type="text" name="placa" id="placa" class="form-control"
                value="{{ $entrada->placa }}">
            @error('placa')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3
        @error('placa')
            has-error
        @enderror">
            <label for="nombre">Nombre propietario</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="{{ $entrada->nombre }}">
            @error('nombre')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3
        @error('tel')
            has-error
        @enderror">
            <label for="tel">Telefono propietario</label>
            <input type="text" name="tel" id="tel" class="form-control"
                value="{{ $entrada->tel }}">
            @error('tel')
                <span class="help-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="celda">Celda:</label>
            <select name="celda_id" id="celda" class="form-control">
                @foreach($celdas as $celda)
                    <option value="{{ $celda->id }}" 
                    @if($celda->id == $entrada->celda_id) selected @endif
                    @if(!$celda->active) disabled @endif>{{ $celda->lugar }}</option>
                @endforeach
            </select>
        </div>
        <script>
            document.getElementById('celda').addEventListener('change', function() {
                var selectedCeldaId = this.value;

                if (selectedCeldaId !== '') {
                    // Aquí puedes enviar una solicitud AJAX al servidor para inactivar la celda
                    fetch('/inactivar-celda/' + selectedCeldaId, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // Si la solicitud fue exitosa, recarga la página o realiza otras acciones necesarias
                            window.location.reload(); // Esto recarga la página, puedes cambiarlo según tu necesidad
                        } else {
                            // Manejar errores de la solicitud
                            console.error('Error al inactivar la celda');
                        }
                    })
                    .catch(error => {
                        console.error('Error de red:', error);
                    });
                }
            });
        </script>

        <div class="form-group mb-3">
            <label for="user">Celda:</label>
            <select name="user_id" id="user" class="form-control">
                @foreach($users as $empleado)
                    <option value="{{ $empleado->id }}" 
                    @if($empleado->id == $entrada->empleado_id) selected @endif>{{ $empleado->name}}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success mb-3" type="submit">Guardar</button>
        <a href="{{ route('entradas.index') }}" class="btn btn-secondary mx-5 mb-3">Regresar</a>
    </form>
    
</div>
@endsection