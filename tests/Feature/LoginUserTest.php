<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $response = $this->json('post','/api/login', [
          'email' => 'Ahmed@gmail.com',
          'password' => '123456',
        ]);


          $response->assertStatus(200);
    }
}
