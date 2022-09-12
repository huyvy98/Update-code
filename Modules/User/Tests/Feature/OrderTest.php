<?php

namespace Modules\User\Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateOrderReturnFail()
    {
        $response = $this->post('/api/orders');

        $response->assertStatus(401);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateOrderReturnInvalid()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $product = Product::factory()->create();

        $response = $this->postJson('/api/orders', ['product_id' => $product->id]);

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateOrderReturnSuccess()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $product = Product::factory()->create();
        $data = [
            "cart" =>
                [
                    [
                        'product_id' => $product->id,
                        'quantity' => rand(1, 15)
                    ]
                ]
        ];
        $response = $this->postJson('/api/orders',
            $data, ['Accept' => 'application/json']
        );

        $response->assertStatus(200);
    }
}
