<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function(object $notifiables, string $url) {
            return (new MailMessage)
                ->subject('Verificar Cuenta')
                ->line('Tu cuenta ya está casi lista, tan solo debes presionar el botón')
                ->action('Confirmar Correo Electrónico', $url)
                ->line('Si no has creado ninguna cuenta, puedes ignorar o eliminar este e-mail.');
                
        });
    }
}
