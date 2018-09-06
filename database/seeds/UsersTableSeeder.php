<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@email.domain',
            'password' => bcrypt('test123'),
        ]);

        factory(\App\Models\User::class, 50)->create()->each(function ($user) {
            $user->news()->save(factory(\App\Models\News::class)->make());
        });
    }
}
