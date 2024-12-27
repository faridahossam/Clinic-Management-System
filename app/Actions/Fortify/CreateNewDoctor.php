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
        
        Validator::make($input->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no'     => ['required', 'string','max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input->all()['name'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => $input->all()['email'],
            'password' => Hash::make($input->all()['password']),
            'role_id' => '1',
            'phone_no' => $input->all()['phone_no'],
        ]);
    }

    public function create2(Request $input)
    {
        
        Validator::make($input->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no'     => ['required', 'string','max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input->all()['name'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => $input->all()['email'],
            'password' => Hash::make($input->all()['password']),
            'role_id' => '1',
            'phone_no' => $input->all()['phone_no'],
        ]);
    }
}