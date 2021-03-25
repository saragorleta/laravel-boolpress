<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// per utilizzare il metodo dello slag inseriamo questo. Lo troviamo sulla
//documentazione
use Illuminate\Support\Str;
use App\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
        {
            for ($i = 0; $i < 10; $i++){
                $newPost = new Post();
                $newPost->title = $faker->sentence(4);
                $newPost->slug = $faker->Str::slug('$newPost->title');
                $newPost->content = $faker->text(500);

                $newPost->save();
        }
    }
}
