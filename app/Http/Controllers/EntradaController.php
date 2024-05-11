<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEntradaRequest;
use App\Models\Celda;
use App\Models\Entrada;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EntradaController extends Controller
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
        $entradas = Entrada::all();
        
        // Retorna la vista 'salidas.index' con las salidas obtenidas y la diferencia de tiempo en segundos
        return view('entradas.index', compact('entradas' /* , 'diffInSeconds' */));
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
            $celdas = Celda::all();
            $users = User::all();
            // Retorna la vista para crear una salida con las entradas obtenidas
            return view('entradas.create', compact('celdas', 'users'));
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
    public function store(CreateEntradaRequest $request)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Crea una nueva salida con los datos del formulario
            Entrada::create($request->all());

            // Obtener el ID de la celda seleccionada
            $celdaId = $request->input('celda_id');
        
            // Inactivar la celda seleccionada
            $celda = Celda::find($celdaId);
            $celda->active = false;
            $celda->save();

            // Redirige al usuario a la página de listado de salidas con un mensaje de éxito
            return redirect()->route('entradas.index')->with('mensaje', 'Entrada creada exitosamente');
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
    public function show(Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Carga la relación 'entrada' del modelo 'salida'
            $entrada->load('celda', 'empleado');
            // Muestra la vista para ver detalles de la salida
            return view('entradas.show', compact('entrada'));
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
    public function edit(Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Obtiene todas las celdas para el formulario
            $celdas = Celda::all();
            $users = User::all();
            // Muestra la vista para editar la salida con las entradas obtenidas y la salida
            return view('entradas.edit', compact('entrada', 'celdas', 'users'));
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
    public function update(CreateEntradaRequest $request, Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Valida los datos del formulario
            $validated = $request->validated();  
            // Actualiza la salida con los datos validados
            $entrada->update($validated);

            // Obtener el ID de la celda seleccionada
            $celdaId = $request->input('celda_id');
        
            // Inactivar la celda seleccionada
            $celda = Celda::find($celdaId);
            $celda->active = false;
            $celda->save();

            // Redirige al usuario a la página de listado de salidas con un mensaje de éxito
            return redirect()->route('entradas.index')->with('mensaje', 'Entrada actualizada exitosamente');
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
    public function destroy(Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Elimina la salida
            $entrada->delete();
            // Redirige al usuario a la página de listado de salidas con un mensaje de éxito
            return redirect()->route('entradas.index')->with('mensaje', 'Entrada eliminada exitosamente');
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
