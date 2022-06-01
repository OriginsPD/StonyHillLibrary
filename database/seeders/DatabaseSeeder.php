<?php

namespace Database\Seeders;

use App\Models\BookDetail;
use App\Models\BorrowedBook;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class
        ]);

        Genre::factory(10)->create();
        Category::factory(2)->state(new Sequence(
            [ 'type' => 'Fiction' ],
            [ 'type' => 'Non-Fiction' ]
        ))->create();
        BookDetail::factory(10)->create();
        Member::factory(10)->create();

    }
}
