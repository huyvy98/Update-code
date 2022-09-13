<?php

namespace Modules\User\Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthInfoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginUserInfoSuccess()
    {
        $user = User::factory()->state(['password' => Hash::make('1')])->create();

        $this->actingAs($user, 'api');

        $response = $this->get('/api/info', [$user]);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginUserInfoFail()
    {
        $user = User::factory()->state(['password' => Hash::make('1')])->create();

        $response = $this->get('/api/info', [$user]);

        $response->assertStatus(401);
    }
}
