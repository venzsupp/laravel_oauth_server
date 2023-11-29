<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Actions\RegisterAction;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        try {
            resolve(RegisterAction::class)->handle($request);
            $responseCode = 201;
            $response = ["message" => 'User added succesfully'];
        } catch (QueryException $queryException) {
            $responseCode = 401;
            $response = ['error' => $queryException->getMessage()];
        } catch (UniqueConstraintViolationException $uniqueException) {
            $responseCode = 401;
            $response = ['error' => $uniqueException->getMessage()];
        }
        return response()->json($response, $responseCode);
    }

    public function show()
    {
        return view('register');
    }
}
