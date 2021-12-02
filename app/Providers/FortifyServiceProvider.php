<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\RegistroController;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            $registro = (new RegistroController)->index();
            return $registro;
        });
        
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        // Fortify::verifyEmailView(function () {
        //     return view('auth.verify');
        // });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->with('rol')->with('empresa')->first();
    
            if ($user &&
                Hash::check($request->password, $user->password)) {
                    session(['rol' => $user->rol->id_rol]);
                    session(['id_empresa' => $user->empresa->id_empresa]);
                    session(['id' => $user->id]);
                    session(['primerNombre' => $user->primer_nombre]);
                return $user;
            }
        });

        
    }
}
