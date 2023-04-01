<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'name' => ['required', 'string', 'max:255'],
            'id_karyawan' => ['required', 'string', 'max:255', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'id_karyawan' => $input['id_karyawan'],
            'status' => $input['status'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
