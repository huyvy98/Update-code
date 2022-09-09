<?php

namespace Modules\User\Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetProductOnCateFail()
    {
        $response = $this->get('/api/categories/1/products');

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetProductOnCateSuccess()
    {

        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->get('/api/categories/1/products');

        $response->assertStatus(200);
    }
}
