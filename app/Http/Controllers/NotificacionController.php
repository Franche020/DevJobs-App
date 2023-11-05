<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Mostrar las notificaciones con la llamada.
     */
    public function __invoke(Request $request): View
    {
        // Obterner las notificaciones del usuario
        $notifiaciones = auth()->user()->unreadNotifications;
        $vacantes = auth()->user()->vacantes;

        // Limpiar las notificaciones
        auth()->user()->unreadNotifications->markAsRead();
        return view("notificaciones.index",[
            'notificaciones' => $notifiaciones,
            'vacantes' => $vacantes
        ]);
    }
}
