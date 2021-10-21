<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'primerNombre' => ['required', 'alpha', 'max:50'],
            'segundoNombre' => ['required', 'alpha', 'max:50'],
            'apellidoPaterno' => ['required', 'alpha', 'max:50'],
            'apellidoMaterno' => ['required', 'alpha', 'max:50'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'nombreEmpresa' => ['required', 'alpha', 'max:100'],
            'direccion' => ['required', 'max:200'],
            'telefono' => ['required', 'numeric', 'min:9'],
            'password' => $this->passwordRules(),
        ])->validate();

        

        return User::create([
            'primer_nombre' => $input['primerNombre'],
            'segundo_nombre' => $input['segundoNombre'],
            'apellido_paterno' => $input['apellidoPaterno'],
            'apellido_materno' => $input['apellidoMaterno'],
            'password' => Hash::make($input['password']),
            'email' => $input['email'],
            'telefono' => $input['telefono'],
            'nombre_empresa' => $input['nombreEmpresa'],
            'direccion' => $input['direccion'],
        ]);

        // //creacion usuario
        // $usuario = new User;
        // primer_nombre = $input['primerNombre'];
        // segundo_nombre = $input['segundoNombre'];
        // apellido_paterno = $input['apellidoPaterno'];
        // apellido_materno = $input['apellidoMaterno'];
        // password = Hash::make($input['password']);
        // email = $input['email'];
        // telefono = $input['telefono'];
        // save();
        
    }
}
