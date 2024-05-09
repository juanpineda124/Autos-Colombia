<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEntradaRequest;
use App\Models\Entrada;
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
        // Obtiene todas las entradas
        $entradas = Entrada::all();
        
        // Retorna la vista 'entradas.index' con las entradas obtenidas
        return view('entradas.index', compact('entradas'));
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
            // Si está autenticado, retorna la vista para crear una entrada
            return view('entradas.create');
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
            // Crea una nueva entrada con los datos validados del formulario
            Entrada::create($request->validated());
            // Redirige al usuario a la página de listado de entradas con un mensaje de éxito
            return redirect()->route('entradas.index')->with('mensaje', 'Entrada creada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Si está autenticado, muestra la vista para ver detalles de la entrada
            return view('entradas.show', compact('entrada'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Si está autenticado, muestra la vista para editar la entrada
            return view('entradas.edit', compact('entrada'));
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEntradaRequest $request, Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Actualiza los datos de la entrada con los datos validados del formulario
            $entrada->update($request->validated());
            // Redirige al usuario a la página de listado de entradas con un mensaje de éxito
            return redirect()->route('entradas.index')->with('mensaje', 'Entrada actualizada exitosamente');
        } else {
            // Si no está autenticado, redirige al usuario a la página de inicio de sesión
            return redirect()->guest("/login");
        }
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        // Verifica si el usuario está autenticado
        if(Auth::check()){
            // Elimina la entrada
            $entrada->delete();
            // Redirige al usuario a la página de listado de entradas con un mensaje de éxito
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