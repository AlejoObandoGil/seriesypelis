<?php

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // eliminar carpeta posts de storage
        // Storage::disk('public')->deleteDirectory('posts');
        // limpiar la bd antes de llenar
        Category::truncate();
        Tag::truncate();
        Post::truncate();

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
        $category->name = "Comedia negra";
        $category->save();

        $category = new Category;
        $category->name = "Terror";
        $category->save();

        $category = new Category;
        $category->name = "Suspenso";
        $category->save();

        $category = new Category;
        $category->name = "Fantasia";
        $category->save();

        $category = new Category;
        $category->name = "Aventura";
        $category->save();

        $category = new Category;
        $category->name = "Ciencia Ficcion";
        $category->save();

        $category = new Category;
        $category->name = "Accion";
        $category->save();

        $category = new Category;
        $category->name = "Romantica";
        $category->save();

        // tags
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
        $tags->name = "Comedia negra";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Terror";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Suspenso";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Fantasia";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Aventura";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Ciencia Ficcion";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Accion";
        $tags->save();

        $tags = new Tag;
        $tags->name = "Romantica";
        $tags->save();

        // modelo Post instancia
        $post = new Post;
        // llamado a los valores de la BD
        $post ->title = "The Godfather";
        $post ->url = str_slug("The Godfather");
        $post ->description = "Pel??cula de drama y gansters";
        $post ->body = "El padrino (t??tulo original en ingl??s: The Godfather1???) es una pel??cula estadounidense de 1972 dirigida por Francis Ford Coppola. La pel??cula fue producida por Albert S. Ruddy, de la compa????a Paramount Pictures. Est?? basada en la novela hom??nima (que a su vez est?? basada en la familia real de los Mortillaro de Sicilia, Italia), de Mario Puzo, quien adapt?? el guion junto a Coppola y Robert Towne, este ??ltimo sin ser acreditado.

        ???Protagonizada por Marlon Brando y Al Pacino como los l??deres de una poderosa familia criminal ficticia de Nueva York, la historia, ambientada desde 1945 a 1955, cuenta las cr??nicas de la Familia Corleone liderada por Vito Corleone (Brando), enfoc??ndose en el personaje de Michael Corleone (Pacino), y su transformaci??n de un reacio joven ajeno a los asuntos familiares a un implacable jefe de la mafia ??talo-estadounidense";
        $post->published_at = '1972-03-14'; //Carbon::now();
        $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/sY1S34973zA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $post->category_id = 1;
        $post->user_id = 1;
        // $post->tags()->attach(1);
        // guardar en la BD
        $post->save();

        $post->tags()->attach(1);
        $post->tags()->attach(2);

        $post = new Post;
        // llamado a los valores de la BD
        $post ->title = "Peaky Blinders";
        $post ->url = str_slug("Peaky Blinders");

        $post ->description = "Serie de drama y gansters";
        $post ->body = "Peaky Blinders es una serie de televisi??n inglesa de drama hist??rico, emitida por el canal BBC Two. La serie est?? protagonizada por Cillian Murphy y se centra en una familia de g??nsteres de Birmingham, durante los a??os veinte y del ascenso de su jefe, Thomas Shelby.

        Los creadores de la serie se basaron en los Peaky Blinders, una banda criminal que existi?? en la ciudad de Birmingham a mediados del siglo XX y que se caracterizaba porque cos??a hojas de afeitar en sus gorras.1???

        Est?? producida por Caryn Mandabach Productions y Tiger Aspect Productions y comenz?? su emisi??n en septiembre de 2013.";
        $post->published_at = '2013-09-12'; //Carbon::now();
        $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/oVzVdvGIC7U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $post->category_id = 2;
        $post->user_id = 1;
        // guardar en la BD
        $post->save();
        $post->tags()->attach(1);
        $post->tags()->attach(2);


        $post = new Post;
        // llamado a los valores de la BD
        $post ->title = "El lobo de Wall street";
        $post ->url = str_slug("El lobo de Wall street");

        $post ->description = "Pel??cula de drama y comedia negra";
        $post ->body = "El lobo de Wall Street ???cuyo t??tulo original en ingl??s es The Wolf of Wall Street??? es una pel??cula de 2013 dirigida por Martin Scorsese, basada en las memorias del mismo nombre de Jordan Belfort. Escrita por Terence Winter y protagonizada por Leonardo DiCaprio como Belfort, junto a Jonah Hill, Margot Robbie, Jean Dujardin, Rob Reiner, Kyle Chandler y Matthew McConaughey, se trata de la quinta colaboraci??n entre Scorsese y DiCaprio.3???

        La pel??cula cuenta la historia de un agente de bolsa de Nueva York, interpretado por DiCaprio, que se niega a cooperar en un caso de fraude de t??tulos que involucra la corrupci??n en Wall Street, el banco comercial e infiltraci??n de la mafia.";
        $post->published_at = '2014-01-24'; //Carbon::now();
        $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/DEMZSa0esCU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $post->category_id = 4;
        $post->user_id = 2;
        // guardar en la BD
        $post->save();
        $post->tags()->attach(2);
        $post->tags()->attach(4);
    }
}
