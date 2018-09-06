<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use JWTAuth;

class NewsTest extends TestCase
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
                           'Authorization' => 'Bearer '.JWTAuth::fromUser($user),
                       ])->json('GET', '/api/news', [
                           'limit' => rand(1,20),
                           'page' => rand(1,5),
                           'sort_type' => 'asc',
                           'sort_type' => 'created_at',
                           'q' => 'a',
                           'status' => 'publish',
                           'topics' => ['o']
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
                          'Authorization' => 'Bearer '.JWTAuth::fromUser($user),
                      ])->json('POST', '/api/news', [
                          'title' => $faker->sentence(rand(4,9)),
                          'content' => $faker->paragraphs(rand(2,7), true),
                          'published' => rand(0,1),
                          'topics' => $faker->words(rand(1,5)),
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
                         'Authorization' => 'Bearer '.JWTAuth::fromUser($user),
                     ])->json('GET', '/api/news/'.$user->news()->inRandomOrder()->first()->id);

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
                            'Authorization' => 'Bearer '.JWTAuth::fromUser($user),
                        ])->json('PUT', '/api/news/'.$user->news()->inRandomOrder()->first()->id, [
                            'title' => $faker->sentence(rand(4,9)),
                            'content' => $faker->paragraphs(rand(2,7), true),
                            'published' => rand(0,1),
                            'topics' => $faker->words(rand(1,5)),
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
                           'Authorization' => 'Bearer '.JWTAuth::fromUser($user),
                       ])->json('DELETE', '/api/news/'.$user->news()->inRandomOrder()->first()->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'code' => 200,
            ]);
    }
}
