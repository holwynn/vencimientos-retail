<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test GET /api/products
     *
     * @return void
     */
    public function testShouldGetProducts()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('GET', '/api/products');

        $res->assertStatus(200);
        $res->assertJson([0 => [
            'name' => true,
            'upc' => true,
        ]]);
    }

    /**
     * Test GET /api/products/{upc}
     *
     * @return void
     */
    public function testShouldGetProductsByUpc()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('GET', '/api/products/'.$prod->upc);

        $res->assertStatus(200);
        $res->assertJson([
            'id' => $prod->id,
            'name' => $prod->name,
            'upc' => $prod->upc,
        ]);
    }

    /**
     * Test POST /api/products
     *
     * @return  void
     */
    public function testShouldAllowPostProduct()
    {
        $user = factory(\App\User::class)->create();
        $token = auth()->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST', '/api/products', [
            'name' => 'My new product',
            'upc' => '0938476748273',
            'img' => 'https://imgur.com/photo.jpg',
        ]);

        $res->assertStatus(201);
        $res->assertJson([
            'id' => \App\Product::first()->id,
            'name' => 'My new product',
            'upc' => '0938476748273',
            'img' => 'https://imgur.com/photo.jpg',
        ]);
    }

    /**
     * Test PUT /api/products
     *
     * @return  void
     */
    public function testShouldAllowPutProducts()
    {
        $prod = factory(\App\Product::class)->create();

        $user = factory(\App\User::class)->create();
        $token = auth()->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT', '/api/products/'.$prod->upc, [
            'name' => 'New product name',
            'upc' => $prod->upc,
        ]);

        $res->assertStatus(200);
        $res->assertJson([
            'name' => 'New product name',
        ]);
    }


    /**
     * Test DELETE /api/products/{upc}
     *
     * @return  void
     */
    public function testShouldAllowDeleteProducts()
    {
        $prod = factory(\App\Product::class)->create();
        
        $user = factory(\App\User::class)->create();
        $token = auth()->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE', '/api/products/'.$prod->upc);

        $res->assertStatus(200);
        $res->assertJson([
            'msg' => 'Product deleted',
        ]);
    }

    /**
     * Test unauthorized POST /api/products
     *
     * @return  void
     */
    public function testShouldNotAllowPostProductIfUnauthorized()
    {
        $res = $this->json('POST', '/api/products', [
            'name' => 'My new product',
            'upc' => '09384762748273',
            'img' => 'https://imgur.com/photo.jpg',
        ]);

        $res->assertStatus(401);
        $res->assertJson([
            'msg' => 'You are not logged in!',
        ]);
    }

    /**
     * Test unauthorized PUT /api/products/{upc}
     *
     * @return  void
     */
    public function testShouldNotAllowPutProductsIfUnauthorized()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('PUT', '/api/products/'.$prod->upc, [
            'name' => 'New product name',
        ]);

        $res->assertStatus(401);
        $res->assertJson([
            'msg' => 'You are not logged in!',
        ]);
    }

    /**
     * Test unauthorized DELETE /api/products/{upc}
     *
     * @return  void
     */
    public function testShouldNotAllowDeleteProductsIfUnauthorized()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('DELETE', '/api/products/'.$prod->upc);

        $res->assertStatus(401);
        $res->assertJson([
            'msg' => 'You are not logged in!',
        ]);
    }
}
