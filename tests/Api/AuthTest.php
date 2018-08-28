<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_logs_in()
    {
        $user = factory(\App\User::class)->create();

        $res = $this->json('POST', route('api.login'), [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $res->assertStatus(200);
        $res->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }

    /** @test */
    public function it_logs_out()
    {
        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

        $res = $this->jwt($token)
            ->json('POST', route('api.logout'));

        $res->assertStatus(200);
        $res->assertJsonStructure([
            'message'
        ]);
    }

    /** @test */
    public function it_fails_to_log_in_with_false_credentials()
    {
        $user = factory(\App\User::class)->create();

        $res = $this->json('POST', route('api.login'), [
            'email' => $user->email,
            'password' => 'totally.not.the.password',
        ]);

        $res->assertStatus(401);
        $res->assertJsonStructure([
            'error'
        ]);
    }

    /** @test */
    public function it_shows_logged_user_info()
    {
        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

        $res = $this->jwt($token)
            ->json('POST', route('api.me'));

        $res->assertStatus(200);
        $res->assertJsonStructure([
            'id',
            'name',
            'email',
            'level'
        ]);
    }

    /** @test */
    public function it_refreshes_token()
    {
        $user = factory(\App\User::class)->create();
        $token = auth('api')->tokenById($user->id);

        $res = $this->jwt($token)
            ->json('POST', route('api.refresh'));

        $res->assertStatus(200);
        $res->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }

    /** @test */
    public function it_registers()
    {
        $res = $this->json('POST', route('api.register'), [
            'name' => 'Testy McTest',
            'email' => 'test@test.com',
            'password' => 'drowssap'
        ]);

        $res->assertStatus(200);
        $res->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);
    }
}
