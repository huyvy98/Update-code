<?php

namespace Modules\User\Tests\Feature;

use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterShouldReturnBadRequest()
    {
        $response = $this->postJson('/api/auth/register', ['email' => 'x']);

        $response->assertStatus(422);
    }

    /**
     * @return void
     */
    public function testRegisterShouldReturnSuccess()
    {
        $user = [
            'firstname' => 'Joe',
            'lastname' => 'Smith',
            'address' => 'HaLoi',
            'phone' => '032123213',
            'email' => Str::random(20) . '@test.com',
            'password' => '1',
            'password_confirmation' => '1'
        ];

        $response = $this->postJson('/api/auth/register',$user);

        $response->assertStatus(201);
    }
}
