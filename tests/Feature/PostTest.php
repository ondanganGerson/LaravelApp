<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use app\Models\User;


class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_post()
    {
        // $user = User::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
    