<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_redirect_when_not_logged_in()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
