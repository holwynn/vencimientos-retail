<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_products()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('GET', '/api/products');

        $res->assertStatus(200);
        $res->assertJson([0 => [
            'name' => true,
            'upc' => true,
        ]]);
    }

    /** @test */
    public function it_shows_products_by_upc()
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

    /** @test */
    public function it_creates_products()
    {
        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

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

    /** @test */
    public function it_updates_products()
    {
        $prod = factory(\App\Product::class)->create();

        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

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


    /** @test */
    public function it_deletes_products()
    {
        $prod = factory(\App\Product::class)->create();
        
        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE', '/api/products/'.$prod->upc);

        $res->assertStatus(200);
        $res->assertJson([
            'msg' => 'Product deleted',
        ]);
    }

    /** @test */
    public function it_doesnt_create_products_if_unauthorized()
    {
        $res = $this->json('POST', '/api/products', [
            'name' => 'My new product',
            'upc' => '09384762748273',
            'img' => 'https://imgur.com/photo.jpg',
        ]);

        $res->assertStatus(401);
    }

    /** @test */
    public function it_doesnt_update_products_if_unauthorized()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('PUT', '/api/products/'.$prod->upc, [
            'name' => 'New product name',
        ]);

        $res->assertStatus(401);
    }

    /** @test */
    public function it_doesnt_delete_products_if_unauthorized()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('DELETE', '/api/products/'.$prod->upc);

        $res->assertStatus(401);
    }
}
