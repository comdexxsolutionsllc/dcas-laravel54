<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @test
     * A basic test example.
     *
     * @return void
     */
    public function it_returns_200()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
