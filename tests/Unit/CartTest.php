<?php

namespace Tests\Unit;

use App\Cart;
use App\Product;
use App\CartItem;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->product  = factory(Product::class)->create();
        $this->cart     = factory(Cart::class)->create();
    }

    /** @test */
    public function create_cart_test()
    {
        $url = '/api/carts/';

        $response = $this->postJson($url, []);

        $response->assertStatus(201)
                ->assertJson([
                    'Message' => 'A new cart have been created for you!',
                ]);

    }

    /** @test */
    public function display_item_on_cart()
    {
        $response = $this->get(route('carts.show', ['cart' => $this->cart->id, 'cartKey' => $this->cart->key]))
        ->assertSuccessful();

    }

    /** @test */
    public function can_add_to_cart_test()
    {
        $url = '/api/carts/'.$this->cart->id;

        $response = $this->postJson($url, [
            'cartKey'   => $this->cart->key,
            'productID' => $this->product->id,
            'quantity'  => 1,
        ]);

        $response->assertStatus(200)
                 ->assertSessionHasNoErrors();

    }

    /** @test */
    public function can_not_add_to_cart_test_if_quantity_higher()
    {
        $url = '/api/carts/'.$this->cart->id;

        $response = $this->postJson($url, [
            'cartKey'   => $this->cart->key,
            'productID' => $this->product->id,
            'quantity'  => $this->product->UnitsInStock + 5,
        ]);

        $response->assertJson([
            'message' => 'The Product you\'re trying to add does not enough stock.',
        ]);
    }

    /** @test */
    public function empty_form_validation_guard()
    {
        $url = '/api/carts/'.$this->cart->id;

        $response = $this->postJson($url, [
            'cartKey'   => '',
            'productID' => '',
            'quantity'  => '',
        ]);

        $response->assertStatus(400);
    }
}
