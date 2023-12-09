<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Actions\RegisterAction;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;

class RegisterActionTest extends TestCase
{
    public function testUserCreatedSuccessfully()
    {
        $registerRequest = new RegisterRequest([
            'email' => 'test@test.com',
            'password' => 'test12345',
            'password_confirmation' => 'test12345',
        ]);
        $this->assertNull(resolve(RegisterAction::class)->handle($registerRequest));
    }

    // public function testExceptionUserCreated()
    // {
    //     $this->expectException(QueryException::class);
    //     $registerRequest = new RegisterRequest([
    //         'password' => 'test12345',
    //         'password_confirmation' => 'test12345',
    //     ]);
    //     resolve(RegisterAction::class)->handle($registerRequest);
    // }
}
