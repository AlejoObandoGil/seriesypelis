<?php

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // limpar la bd antes de llenar
        Post::truncate();
        Category::truncate();
        // modelo Post instancia
        $post = new Post;
        // llamado a los valores de la BD
        $post ->title = "The Godfather";
        $post ->url = str_slug("The Godfather");
        $post ->description = "Pelicula de drama, gansters";
        $post ->body = "El padrino (título original en inglés: The Godfather1​) es una película estadounidense de 1972 dirigida por Francis Ford Coppola. La película fue producida por Albert S. Ruddy, de la compañía Paramount Pictures. Está basada en la novela homónima (que a su vez está basada en la familia real de los Mortillaro de Sicilia, Italia), de Mario Puzo, quien adaptó el guion junto a Coppola y Robert Towne, este último sin ser acreditado.
        
        ​Protagonizada por Marlon Brando y Al Pacino como los líderes de una poderosa familia criminal ficticia de Nueva York, la historia, ambientada desde 1945 a 1955, cuenta las crónicas de la Familia Corleone liderada por Vito Corleone (Brando), enfocándose en el personaje de Michael Corleone (Pacino), y su transformación de un reacio joven ajeno a los asuntos familiares a un implacable jefe de la mafia ítalo-estadounidense";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        // guardar en la BD 
        $post->save();

        $post = new Post;
        // llamado a los valores de la BD
        $post ->title = "Peaky Blinders";
        $post ->url = str_slug("Peaky Blinders");

        $post ->description = "Serie de drama, gansters";
        $post ->body = "Peaky Blinders es una serie de televisión inglesa de drama histórico, emitida por el canal BBC Two. La serie está protagonizada por Cillian Murphy y se centra en una familia de gánsteres de Birmingham, durante los años veinte y del ascenso de su jefe, Thomas Shelby.

        Los creadores de la serie se basaron en los Peaky Blinders, una banda criminal que existió en la ciudad de Birmingham a mediados del siglo XX y que se caracterizaba porque cosía hojas de afeitar en sus gorras.1​
        
        Está producida por Caryn Mandabach Productions y Tiger Aspect Productions y comenzó su emisión en septiembre de 2013.";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        // guardar en la BD 
        $post->save();

        $category = new Category;
        $category->name = "Gansters";
        $category->save();

        $category = new Category;
        $category->name = "Drama";
        $category->save();
                
        $category = new Category;
        $category->name = "Comedia";
        $category->save();

        $category = new Category;
        $category->name = "Terror";
        $category->save();
        
        $category = new Category;
        $category->name = "Ciencia Ficcion";
        $category->save();

        $tags = new Tag;
        $tags->name = "Gansters";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Drama";
        $tags->save();
                
        $tags = new Tag;
        $tags->name = "Comedia";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Terror";
        $tags->save();
        
        $tags = new Tag;
        $tags->name = "Ciencia Ficcion";
        $tags->save();
    }
}
