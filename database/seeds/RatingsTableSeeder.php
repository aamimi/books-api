<?php

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->truncate();

        $users = User::all();

        $users->each(function ($user) {
            $books = Arr::random(
                Book::where('user_id', '<>', $user->id)->pluck('id')->toArray(),
                random_int(0, 10)
            );
            foreach ($books as $book) {
                $user->ratings()->syncWithoutDetaching([
                    $book => ['rating' => random_int(0, 5)],
                ]);
            }
        });
    }
}
