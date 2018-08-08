<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpirationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test GET /api/expirations
     *
     * @return void
     */
    public function test_should_get_expirations()
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

    /**
     * Test GET /api/expirations{id}
     *
     * @return void
     */
    public function test_should_get_expirations_by_id()
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

    /**
     * Test POST /api/expirations
     *
     * @return  void
     */
    public function test_should_allow_post_expirations()
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

    /**
     * Test PUT /api/expirations/{id}
     *
     * @return  void
     */
    public function test_should_allow_put_expirations()
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

    /**
     * Test DELETE /api/expirations/{id}
     *
     * @return  void
     */
    public function test_should_allow_delete_expirations()
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

    /**
     * Test unauthorized POST /api/expirations
     *
     * @return  void
     */
    public function test_should_not_allow_post_expirations_if_unauthorized()
    {
        $prod = factory(\App\Product::class)->create();

        $res = $this->json('POST', '/api/expirations', [
            'expiration' => '2018-02-14 00:00:00',
            'qty' => 14,
            'upc' => $prod->upc,
        ]);

        $res->assertStatus(401);
    }

    /**
     * Test unauthorized PUT /api/expirations
     *
     * @return  void
     */
    public function test_should_not_allow_put_expirations_if_unauthorized()
    {
        $expiration = factory(\App\Expiration::class)->create();

        $res = $this->json('PUT', '/api/expirations/'.$expiration->id, [
            'expiration' => '2014-01-01 12:00:00',
        ]);

        $res->assertStatus(401);
    }

    /**
     * Test unauthorized DELETE /api/expirations
     *
     * @return  void
     */
    public function test_should_not_allow_delete_expirations_if_unauthorized()
    {
        $expiration = factory(\App\Expiration::class)->create();

        $res = $this->json('DELETE', '/api/expirations/'.$expiration->id);

        $res->assertStatus(401);
    }
}
