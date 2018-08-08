<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpirationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_expirations()
    {
        $expiration = factory(\App\Expiration::class)->create();

        $res = $this->json('GET', '/api/expirations');

        $res->assertStatus(200);
        $res->assertJson([0 => [
            'product_id' => $expiration->product->id,
            'expiration' => true,
            'qty' => true,
        ]]);
    }

    /** @test */
    public function it_shows_expirations_by_id()
    {
        $expiration = factory(\App\Expiration::class)->create();

        $res = $this->json('GET', '/api/expirations/'.$expiration->id);

        $res->assertStatus(200);
        $res->assertJson([
            'product_id' => $expiration->product->id,
            'expiration' => true,
            'qty' => true,
        ]);
    }

    /** @test */
    public function it_creates_expirations()
    {
        $prod = factory(\App\Product::class)->create();
        
        $user = factory(\App\User::class)->create();
        $token = auth()->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('POST', '/api/expirations', [
            'expiration' => '2018-02-14 00:00:00',
            'qty' => 14,
            'upc' => $prod->upc,
        ]);

        $res->assertStatus(201);
        $res->assertJson([
            'expiration' => '2018-02-14 00:00:00',
            'qty' => 14,
        ]);
    }

    /** @test */
    public function it_updates_expirations()
    {
        $expiration = factory(\App\Expiration::class)->create();
        
        $user = factory(\App\User::class)->create();
        $token = auth()->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('PUT', '/api/expirations/'.$expiration->id, [
            'qty' => 12,
            'expiration' => '2018-05-10 12:04:33',
            'checked' => 1,
        ]);

        $res->assertStatus(200);
        $res->assertJson([
            'qty' => 12,
            'expiration' => '2018-05-10 12:04:33',
            'checked' => 1
        ]);
    }

    /** @test */
    public function it_deletes_expirations()
    {
        $expiration = factory(\App\Expiration::class)->create();
        
        $user = factory(\App\User::class)->create();
        $token = auth()->tokenById($user->id);

        $res = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->json('DELETE', '/api/expirations/'.$expiration->id);

        $res->assertStatus(200);
        $res->assertJson([
            'msg' => 'Expiration deleted',
        ]);
    }

    /** @test */
    public function it_doesnt_create_expirations_if_unauthorized()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('POST', '/api/expirations', [
            'expiration' => '2018-02-14 00:00:00',
            'qty' => 14,
            'upc' => $prod->upc,
        ]);

        $res->assertStatus(401);
    }

    /** @test */
    public function it_doesnt_update_expirations_if_unauthorized()
    {
        $expiration = factory(\App\Expiration::class)->create();

        $res = $this->json('PUT', '/api/expirations/'.$expiration->id, [
            'expiration' => '2014-01-01 12:00:00',
        ]);

        $res->assertStatus(401);
    }

    /** @test */
    public function it_doesnt_delete_expirations_if_unauthorized()
    {
        $expiration = factory(\App\Expiration::class)->create();

        $res = $this->json('DELETE', '/api/expirations/'.$expiration->id);

        $res->assertStatus(401);
    }
}
