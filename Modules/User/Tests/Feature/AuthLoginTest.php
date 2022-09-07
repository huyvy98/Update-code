<?php

namespace Modules\User\Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\JWTAuth;

class AuthLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testValidRequestShouldReturnBadRequest()
    {
        $response = $this->postJson('/api/auth/login',['email'=>'x']);

        $response->assertStatus(422);
    }

    public function testValidRequestShouldReturnSuccess()
    {
        $user = User::factory()->state(['password' => Hash::make('1')])->create();

        $response = $this->postJson('/api/auth/login', ['email' => $user->email, 'password' => '1']);

        $response->assertStatus(200);
    }


    public function testValidTokenShouldReturnSuccess(): void
    {
        $jwtAuth = app(JWTAuth::class);
        $user = User::factory()->state(['password' => Hash::make('12345678')])->create();
        $token = $jwtAuth->fromUser($user);

        $response = $this->getJson('/api/auth/test', ['Authorization' => 'Bearer ' . $token]);
        $response->assertStatus(200);
    }

    public function testInvalidTokenShouldReturnSuccess(): void
    {
        User::factory()->state(['password' => Hash::make('12345678')])->create();
        $response = $this->getJson('/api/auth/test', ['Authorization' => 'Bearerasdasdasdasd']);

        $response->assertStatus(401);
    }
}
