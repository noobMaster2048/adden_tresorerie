<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInertia();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Date::use(CarbonImmutable::class);
    }

    public function registerInertia() {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'flash' => function() {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
            'errors' => function() {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
            /*'auth' => function() {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'nom' => Auth::user()->nom,
                        'login' => Auth::user()->login,
                        'email' => Auth::user()->email,
                        // 'roles' => Auth::user()->roles->pluck('guard'),
                        // 'notifications' => Auth::user()->notifications
                    ] : null,
                ];
            }*/
        ]);
    }
}
