<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    /** @test */
    public function it_shows_index_page()
    {
        $this->get('/')
            ->assertStatus(200);
    }
}
