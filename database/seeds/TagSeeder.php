<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// per utilizzare il metodo dello slag inseriamo questo. Lo troviamo sulla
//documentazione
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $newPost = new Tag('ciao');
            //$newPost->title = $faker->sentence(4);
            $newPost->content = $faker->text(500);

            

            //1)seleziono tutti i tag
            $tags= Tag::all();
            //il risultato è una collection, devo convertirla in array
            $tags=$tags->toArray();
            //dopo gli dico di fare il count
            $tags=Count($users);

            //queste righe possiamo farle con meno righe di codice:
            //$userCount = Count(User::all()->toArray());
            
            $newPost->user_id = rand(1, $tags);

            $slug= Str::slug($newPost->title);
            $slugIniziale = $slug;

            $postPresente = Post::where('slug',$slug)->first();

            $contatore=1;

            //-ciclo per controllare se lo slug è presente e confrontarlo
            //con quello che dobbiamo inserire:      
            while($postPresente){
                $slug = $slugIniziale . '-' . $contatore;
                $postPresente = Post::where('slug',$slug)->first();
                $contatore++;

            }

            $newPost->slug = $slug;
            //titolo: laravel magic
            //slug laravel-magic

            //vogliamo inserire un articolo con lo stesso titolo
            //titolo: laravel magic
            //$postPresente conterrà l'id oppure null
            //slug: laravel-magic-1

            //vogliamo inserire un articolo con lo stesso titolo
            //titolo: laravel magic
            //slug: laravel-magic-2
    
            
            $newPost->save();
            
            
            

    }
}
    
}
