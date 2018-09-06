<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testRegister()
    {
       $faker = \Faker\Factory::create();
       $email = $faker->email;
       $password = $faker->word(10);

       $response = $this->json('POST', '/api/register', [
                          'name' => $faker->name,
                          'email' => $faker->unique()->safeEmail,
                          'password' => $password,
                      ]);

       $response
           ->assertStatus(200)
           ->assertJson([
               'success' => true,
               'code' => 200
           ]);
    }
}
