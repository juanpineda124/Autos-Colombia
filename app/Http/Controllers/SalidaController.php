<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalidaRequest;
use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SalidaController extends Controller
{
    /**
     * Muestra una lista de recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* // Busca el primer registro de la tabla "Entrada"
        $entradaRecord = Entrada::first();
        // Busca el primer registro de la tabla "Salida"
        $salidaRecord = Salida::first();

        if ($entradaRecord && $salidaRecord) {
            // Si hay registros en ambas tablas, calcula la diferencia en segundos
            $entradaCreatedAt = $entradaRecord->created_at;
            $salidaCreatedAt = $salidaRecord->created_at;

            $diffInSeconds = Carbon::parse($entradaCreatedAt)->diffInSeconds($salidaCreatedAt);
        } */
        
        // Obtiene todas las salidas
        $salidas = Salida::all();
        
        // Retorna la vista 'salidas.index' con las salidas obtenidas y la diferencia de tiempo en segundos
        return view('salidas.index', compact('salidas' /* , 'diffInSeconds' */));
    }


    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Obtiene todas las entradas para el formulario
            $entradas = Entrada::all();
            // Retorna la vista para crear una salida con las entradas obtenidas
            return view('salidas.create', compact('entradas'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSalidaRequest $request)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Crea una nueva salida con los datos del formulario
            Salida::create($request->all());
            // Redirige al usuario a la página de listado de salidas con un mensaje de éxito
            return redirect()->route('salidas.index')->with('mensaje', 'Salida creada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Carga la relación 'entrada' del modelo 'salida'
            $salida->load('entrada', 'celda');
            // Muestra la vista para ver detalles de la salida
            return view('salidas.show', compact('salida'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Obtiene todas las entradas para el formulario
            $entradas = Entrada::all();
            // Muestra la vista para editar la salida con las entradas obtenidas y la salida
            return view('salidas.edit', compact('salida', 'entradas'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSalidaRequest $request, Salida $salida)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Valida los datos del formulario
            $validated = $request->validated();  
            // Actualiza la salida con los datos validados
            $salida->update($validated); 
            // Redirige al usuario a la página de listado de salidas con un mensaje de éxito
            return redirect()->route('salidas.index')->with('mensaje', 'Salida actualizada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Elimina la salida
            $salida->delete();
            // Redirige al usuario a la página de listado de salidas con un mensaje de éxito
            return redirect()->route('salidas.index')->with('mensaje', 'Salida eliminada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Redirecciona al usuario a la URL anterior.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Redirige al usuario a la URL anterior
        return url()->previous();
    }
}
