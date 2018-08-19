<?php

namespace Tests\Feature\Api;

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

        $res = $this->json('GET', route('api.products'));

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

        $res = $this->json('GET', route('api.products.show', ['upc' => $prod->upc]));

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

        $res = $this->jwt($token)
            ->json('POST', route('api.products.store'), [
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

        $res = $this->jwt($token)
            ->json('PUT', route('api.products.update', ['upc' => $prod->upc]), [
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

        $res = $this->jwt($token)
            ->json('DELETE', route('api.products.destroy', [
                'upc' => $prod->upc]
            ));

        $res->assertStatus(200);
        $res->assertJson([
            'msg' => 'Product deleted',
        ]);
    }

    /** @test */
    public function it_doesnt_create_products_if_unauthenticated()
    {
        $res = $this->json('POST', route('api.products.store'), [
            'name' => 'My new product',
            'upc' => '09384762748273',
            'img' => 'https://imgur.com/photo.jpg',
        ]);

        $res->assertStatus(401);
    }

    /** @test */
    public function it_doesnt_update_products_if_unauthenticated()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('PUT', route('api.products.update', ['upc' => $prod->upc]), [
            'name' => 'New product name',
        ]);

        $res->assertStatus(401);
    }

    /** @test */
    public function it_doesnt_delete_products_if_unauthenticated()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('DELETE', route('api.products.destroy', [
            'upc' => $prod->upc]
        ));

        $res->assertStatus(401);
    }

    /** @test */
    public function it_fails_validation()
    {
        $prod = factory(\App\Product::class)->create();

        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

        $res = $this->jwt($token)
            ->json('PUT', route('api.products.update', ['upc' => $prod->upc]), [
                'upc' => 'this is not a upc code',
            ]);

        $res->assertStatus(422);
    }
}
