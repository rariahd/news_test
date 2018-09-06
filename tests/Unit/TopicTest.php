<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Topic;

class TopicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testIndex()
    {
        $user = User::first();
        $response = $this->withHeaders([
                           'Authorization' => 'Bearer '.\JWTAuth::fromUser($user),
                       ])->json('GET', '/api/topics', [
                           'limit' => rand(1,20),
                           'page' => rand(1,5),
                           'sort_type' => 'asc',
                           'sort_type' => 'created_at',
                           'q' => 'a'
                       ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'code' => 200,
            ]);
    }

    public function testStore()
    {
        $user = User::first();
        $faker = \Faker\Factory::create();

        $response = $this->withHeaders([
                          'Authorization' => 'Bearer '.\JWTAuth::fromUser($user),
                      ])->json('POST', '/api/topics', [
                          'topic' => $faker->word
                      ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'code' => 200,
            ]);
    }

    public function testShow()
    {
        $user = User::first();
        $response = $this->withHeaders([
                         'Authorization' => 'Bearer '.\JWTAuth::fromUser($user),
                     ])->json('GET', '/api/topics/'.Topic::inRandomOrder()->first()->id);

        $response
              ->assertStatus(200)
              ->assertJson([
                  'success' => true,
                  'code' => 200,
              ]);
    }

    public function testUpdate()
    {
        $user = User::first();
        $faker = \Faker\Factory::create();

        $response = $this->withHeaders([
                            'Authorization' => 'Bearer '.\JWTAuth::fromUser($user),
                        ])->json('PUT', '/api/topics/'.Topic::inRandomOrder()->first()->id, [
                            'topic' => $faker->word
                        ]);

        $response
             ->assertStatus(200)
             ->assertJson([
                 'success' => true,
                 'code' => 200,
             ]);
    }

    public function testDestroy()
    {
        $user = User::first();
        $response = $this->withHeaders([
                           'Authorization' => 'Bearer '.\JWTAuth::fromUser($user),
                       ])->json('DELETE', '/api/topics/'.Topic::doesntHave('news')->inRandomOrder()->first()->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'code' => 200,
            ]);
    }
}
