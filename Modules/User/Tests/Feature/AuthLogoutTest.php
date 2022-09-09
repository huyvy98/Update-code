<?php

namespace Modules\User\Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthLogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogoutUserFail()
    {
        $response = $this->post('/api/logout');

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogoutUserSuccess()
    {
        $user = User::factory()->create();

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user);;

        $response = $this->post('api/logout?token=' . $token);

        $response->assertStatus(200);
    }
}
