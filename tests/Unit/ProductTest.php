<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->product  = factory(Product::class)->make();
    }

    /** @test */
    public function list_available_product_test()
    {
        $url = '/api/products/';
        $response = $this->get('/api/products/');
        $response->assertStatus(200);
    }
}
