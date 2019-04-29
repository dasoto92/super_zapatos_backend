<?php

use Illuminate\Database\Seeder;
//use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       factory(App\Article::class, 40)->create();
     }
}
