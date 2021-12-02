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

        if(User::count() == 0)
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
                'telefono' => ['required', 'numeric', 'min:9', 'unique:users'],
                'password' => $this->passwordRules(),
            ])->validate();

            $empresa = New Empresa();
            $empresa->id_empresa = date('mdYhis', time());
            $empresa->nombre_empresa = 'Radio Bienvenida';
            $empresa->direccion = "C. Cuevas 289, Rancagua, O'Higgins";
            $empresa->rubro_empresa_id = 1;
            $id_empresa = $empresa->id_empresa;
            $empresa->save();



            return User::create([
                'id' => date('mdYhis', time()),
                'primer_nombre' => $input['primerNombre'],
                'segundo_nombre' => $input['segundoNombre'],
                'apellido_paterno' => $input['apellidoPaterno'],
                'apellido_materno' => $input['apellidoMaterno'],
                'password' => Hash::make($input['password']),
                'email' => $input['email'],
                'telefono' => $input['telefono'],
                'empresa_id' => $id_empresa,
                'rol_id' => 1,
            ]);

        }
         else{


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
                 'nombreEmpresa' => ['required','not_in:0'],
                 'direccion' => ['required', 'max:200', 'string' , 'min:10'],
                 'telefono' => ['required', 'numeric', 'digits:9','unique:users'],
                //  'rubroEmpresa' => ['required', 'numeric', 'min:1'],
                 'password' => $this->passwordRules(),
             ])->validate();
           
            
             $empresa = new Empresa();
             $empresa->id_empresa = date('mdYhis', time());
             $empresa->nombre_empresa = $input['nombreEmpresa'];
             $empresa->direccion = $input['direccion'];
            $empresa->rubro_empresa_id =$input['rubroEmpresa'];
             $id_empresa = $empresa->id_empresa;
             $empresa->save();
                 
             return User::create([
                 'id' => date('mdYhis', time()),
                 'primer_nombre' => $input['primerNombre'],
                 'segundo_nombre' => $input['segundoNombre'],
                 'apellido_paterno' => $input['apellidoPaterno'],
                 'apellido_materno' => $input['apellidoMaterno'],
                 'password' => Hash::make($input['password']),
                 'email' => $input['email'],
                 'telefono' => $input['telefono'],
                 'empresa_id' => $id_empresa,
                 'rol_id' => 3,
             ]);
         }

    }
}
