<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->truncate();
        DB::table('books')->truncate();
        DB::table('users')->truncate();

        factory(App\Models\User::class, 50)
            ->create()
            ->each(function ($user) {
                $books = factory(App\Models\Book::class, random_int(0, 10))->make();
                $user->books()->saveMany($books);
            });
    }
}
