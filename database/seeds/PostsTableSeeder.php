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
        $post ->description = "Película de drama y gansters";
        $post ->body = "El padrino (título original en inglés: The Godfather1​) es una película estadounidense de 1972 dirigida por Francis Ford Coppola. La película fue producida por Albert S. Ruddy, de la compañía Paramount Pictures. Está basada en la novela homónima (que a su vez está basada en la familia real de los Mortillaro de Sicilia, Italia), de Mario Puzo, quien adaptó el guion junto a Coppola y Robert Towne, este último sin ser acreditado.
            ​Protagonizada por Marlon Brando y Al Pacino como los líderes de una poderosa familia criminal ficticia de Nueva York, la historia, ambientada desde 1945 a 1955, cuenta las crónicas de la Familia Corleone liderada por Vito Corleone (Brando), enfocándose en el personaje de Michael Corleone (Pacino), y su transformación de un reacio joven ajeno a los asuntos familiares a un implacable jefe de la mafia ítalo-estadounidense";
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
        $post ->body = "Peaky Blinders es una serie de televisión inglesa de drama histórico, emitida por el canal BBC Two. La serie está protagonizada por Cillian Murphy y se centra en una familia de gánsteres de Birmingham, durante los años veinte y del ascenso de su jefe, Thomas Shelby.
            Los creadores de la serie se basaron en los Peaky Blinders, una banda criminal que existió en la ciudad de Birmingham a mediados del siglo XX y que se caracterizaba porque cosía hojas de afeitar en sus gorras.
            Está producida por Caryn Mandabach Productions y Tiger Aspect Productions y comenzó su emisión en septiembre de 2013.";
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

        $post ->description = "Película de drama y comedia negra";
        $post ->body = "El lobo de Wall Street —cuyo título original en inglés es The Wolf of Wall Street— es una película de 2013 dirigida por Martin Scorsese, basada en las memorias del mismo nombre de Jordan Belfort. Escrita por Terence Winter y protagonizada por Leonardo DiCaprio como Belfort, junto a Jonah Hill, Margot Robbie, Jean Dujardin, Rob Reiner, Kyle Chandler y Matthew McConaughey, se trata de la quinta colaboración entre Scorsese y DiCaprio.3​
            La película cuenta la historia de un agente de bolsa de Nueva York, interpretado por DiCaprio, que se niega a cooperar en un caso de fraude de títulos que involucra la corrupción en Wall Street, el banco comercial e infiltración de la mafia.";
        $post->published_at = '2014-01-24'; //Carbon::now();
        $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/DEMZSa0esCU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $post->category_id = 4;
        $post->user_id = 2;
        // guardar en la BD
        $post->save();
        $post->tags()->attach(2);
        $post->tags()->attach(4);
        $post->tags()->attach(3);


        $post = new Post;
        // llamado a los valores de la BD
        $post ->title = "Dark";
        $post ->url = str_slug("Dark");

        $post ->description = "Serie de suspenso y ciencia ficción";
        $post ->body = "Dark es una serie de televisión web alemana de suspense y ciencia ficción creada por Baran bo Odar y Jantje Friese.5​6​7​ Situada en la ficticia ciudad de Winden (Alemania), Dark sigue las secuelas de la desaparición de un niño que expone los secretos y las conexiones ocultas entre cuatro familias mientras desentrañan lentamente una siniestra conspiración de viaje en el tiempo que abarca tres generaciones. A lo largo de la serie, Dark explora las implicaciones existenciales del tiempo y sus efectos sobre la naturaleza humana.
            Dark, la primera serie original de Netflix en idioma alemán; se estrenó en el servicio de streaming Netflix el 1 de diciembre de 2017. La primera temporada fue recibida con reseñas positivas de los críticos, que hicieron comparaciones iniciales con Stranger Things, otra serie de Netflix.";
        $post->published_at = '2017-12-01'; //Carbon::now();
        $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/IJ_AZCvCacw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $post->category_id = 6;
        $post->user_id = 2;
        // guardar en la BD
        $post->save();
        $post->tags()->attach(6);
        $post->tags()->attach(9);
        $post->tags()->attach(8);
    }
}
