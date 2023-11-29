<?php

namespace App\Http\Actions;

use Exception;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;

class RegisterAction
{
    public function handle(RegisterRequest $request): void
    {
        $email = $request->email ?? '';
        $password = $request->password ?? '';
        $name = explode('@', $email)[0];
        $request['name'] = explode('@', $email)[0];
        try {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
        } catch (QueryException | UniqueConstraintViolationException $queryException) {
            throw $queryException;
        }
    }
}
