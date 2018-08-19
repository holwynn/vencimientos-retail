<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function jwt($token)
    {
        return $this->withHeaders(['Authorization' => 'Bearer ' . $token]);
    }
}
