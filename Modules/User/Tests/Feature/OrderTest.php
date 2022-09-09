<?php

namespace Modules\User\Tests\Feature;

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
    public function testOrderFail()
    {
        $response = $this->post('/api/orders');

        $response->assertStatus(401);
    }
}
