<?php

namespace App\Http\Controllers;

use App\Models\Celda;
use App\Http\Requests\CreateCeldaRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para la gestión de recursos de Celda.
 */
class CeldaController extends Controller
{
    /**
     * Muestra una lista de recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene todas las celdas
        $celdas = Celda::all();
        
        // Retorna la vista 'celdas.index' con las celdas obtenidas
        return view('celdas.index', compact('celdas'));
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
            // Si está autenticado, retorna la vista para crear una celda
            return view('celdas.create');
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
    public function store(CreateCeldaRequest $request)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Crea una nueva celda con los datos validados del formulario
            Celda::create($request->validated());
            // Redirige al usuario a la página de listado de celdas con un mensaje de éxito
            return redirect()->route('celdas.index')->with('mensaje', 'Celda creada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Celda  $celda
     * @return \Illuminate\Http\Response
     */
    public function show(Celda $celda)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Si está autenticado, muestra la vista para ver detalles de la celda
            return view('celdas.show', compact('celda'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Celda  $celda
     * @return \Illuminate\Http\Response
     */
    public function edit(Celda $celda)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Si está autenticado, muestra la vista para editar la celda
            return view('celdas.edit', compact('celda'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Celda  $celda
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCeldaRequest $request, Celda $celda)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Actualiza los datos de la celda con los datos validados del formulario
            $celda->update($request->validated());
            // Redirige al usuario a la página de listado de celdas con un mensaje de éxito
            return redirect()->route('celdas.index')->with('mensaje', 'Celda actualizada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Celda  $celda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celda $celda)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Elimina la celda
            $celda->delete();
            // Redirige al usuario a la página de listado de celdas con un mensaje de éxito
            return redirect()->route('celdas.index')->with('mensaje', 'Celda eliminada exitosamente');
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
