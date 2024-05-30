<?php

namespace App\Http\Controllers;

use App\Models\Celda;
use App\Models\Entrada;
use App\Models\Pago;
use Illuminate\Http\Request;
use App\Models\Salida;
use Carbon\Carbon;

class PagoController extends Controller
{
    public function index()
    {
        // Obtener todos los pagos
        $pagos = Pago::all();

        // Pasar los pagos a la vista
        return view('pagos.index', compact('pagos'));
    }

    public function create(Request $request)
    {
        $salida = Salida::findOrFail($request->salida_id);
        \Carbon\Carbon::setLocale('es');
        $horaEntrada = \Carbon\Carbon::parse($salida->entrada->created_at);
        $horaSalida = \Carbon\Carbon::parse($salida->created_at);
        $segundosEstacionado = $horaEntrada->diffInSeconds($horaSalida);

        // Convertir el tiempo estacionado a días, horas, minutos y segundos
        $dias = floor($segundosEstacionado / 86400);
        $horas = floor(($segundosEstacionado % 86400) / 3600);
        $minutos = floor(($segundosEstacionado % 3600) / 60);
        $segundos = $segundosEstacionado % 60;

        $tiempoEstacionado = '';
        if ($dias > 0) {
            $tiempoEstacionado .= "{$dias} días";
            if ($horas > 0) {
                $tiempoEstacionado .= ", {$horas} horas";
            }
            } elseif ($horas > 0) {
                $tiempoEstacionado .= "{$horas} horas";
                if ($minutos > 0) {
                    $tiempoEstacionado .= ", {$minutos} minutos";
                }
                } else {
                $tiempoEstacionado .= "{$minutos} minutos";
                if ($segundos > 0) {
                    $tiempoEstacionado .= ", {$segundos} segundos";
                }
            }

            // Calcular el monto a pagar
            $montoAPagar = $this->calculatePayment($segundosEstacionado);

        return view('pagos.create', compact('salida', 'tiempoEstacionado', 'montoAPagar'));
    }

    public function store(Request $request)
    {
        $salida = Salida::findOrFail($request->salida_id);

        $horaEntrada = Carbon::parse($salida->entrada->created_at);
        $horaSalida = Carbon::parse($salida->created_at);
        $segundosEstacionado = $horaEntrada->diffInSeconds($horaSalida);

        // Convertir el tiempo estacionado a días, horas, minutos y segundos
        $dias = floor($segundosEstacionado / 86400);
        $horas = floor(($segundosEstacionado % 86400) / 3600);
        $minutos = floor(($segundosEstacionado % 3600) / 60);
        $segundos = $segundosEstacionado % 60;

        $tiempoEstacionado = '';
        if ($dias > 0) {
            $tiempoEstacionado .= "{$dias} días";
            if ($horas > 0) {
                $tiempoEstacionado .= ", {$horas} horas";
            }
        } elseif ($horas > 0) {
            $tiempoEstacionado .= "{$horas} horas";
            if ($minutos > 0) {
                $tiempoEstacionado .= ", {$minutos} minutos";
            }
        } else {
            $tiempoEstacionado .= "{$minutos} minutos";
            if ($segundos > 0) {
                $tiempoEstacionado .= ", {$segundos} segundos";
            }
        }

        // Calcular el monto a pagar
        $montoAPagar = $this->calculatePayment($segundosEstacionado);

         // Crear y guardar el pago
        $pago = new Pago();
        $pago->salida_id = $salida->id;
        $pago->tiempo_estacionado = $tiempoEstacionado;
        $pago->monto_pagado = $montoAPagar;
        $pago->save();

        return redirect()->route('pagos.index')->with('mensaje', 'Pago realizado con éxito');
    }


    public function calculatePayment($segundosEstacionado)
    {
        // Define las tarifas
        $tarifaPorMinuto = 50; // 50 pesos por minuto
        $tarifaPorHora = 1500; // 1500 pesos por hora
        $tarifaPorDia = 21000; // 21000 pesos por día
    
        // Calcular el tiempo en días, horas, minutos y segundos
        $dias = floor($segundosEstacionado / 86400);
        $horas = floor(($segundosEstacionado % 86400) / 3600);
        $minutos = floor(($segundosEstacionado % 3600) / 60);
        $segundos = $segundosEstacionado % 60;
    
        // Calcular el monto total a pagar
        $montoTotal = 0;
    
        // Si hay días
        if ($dias > 0) {
            $montoTotal += $dias * $tarifaPorDia;
        }
        
        // Si hay horas (y no días)
        if ($horas > 0 && $dias == 0) {
            $montoTotal += $horas * $tarifaPorHora;
        }
        
        // Si hay minutos (y no horas ni días)
        if ($minutos > 0 && $horas == 0 && $dias == 0) {
            $montoTotal += ceil($minutos / 60) * $tarifaPorMinuto;
        }

        // Si hay segundos
        if ($segundos > 0 && $minutos == 0 && $horas == 0 && $dias == 0) {
            $montoTotal += ceil($segundos/ 60) * $tarifaPorMinuto;
        }
    
        return $montoTotal;
    }

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }
}

