<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Actions\RegisterAction;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\UniqueConstraintViolationException;

class RegisterActionTest extends TestCase
{
    use RefreshDatabase;
    public function testUserCreatedSuccessfully()
    {
        $registerRequest = new RegisterRequest([
            'email' => 'test@test.com',
            'password' => 'test12345',
            'password_confirmation' => 'test12345',
        ]);
        $this->assertNull(resolve(RegisterAction::class)->handle($registerRequest));
    }

    public function testExceptionUserCreated()
    {
        $this->expectException(QueryException::class);
        $registerRequest = new RegisterRequest([
            'password' => 'test12345',
            'password_confirmation' => 'test12345',
        ]);
        resolve(RegisterAction::class)->handle($registerRequest);
    }
}
