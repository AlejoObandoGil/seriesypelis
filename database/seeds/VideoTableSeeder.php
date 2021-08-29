<?php

use App\Models\Season;
use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Season::truncate();
        Video::truncate();

        $season = new Season();
        $season->post_id = 2;
        $season->season = 'Temporada 1';
        $season->url_season = str_slug("Temporada 1");
        $season->save();

        $video = new Video();
        $video->post_id = 2;
        $video->season_id = 1;
        $video->chapter = 'Capitulo 1';
        $video->url_chapter = str_slug("Capitulo 1");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjL09aMUxKNWlXQ1VWZGVObUZsUldxdXZFc1Z3QWErV3QxdWJobElLb0JTYw==&bg=/image.tmdb.org/t/p/w780/tplu6cXP312IN5rrT5K81zFZpMd.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 2;
        $video->season_id = 1;
        $video->chapter = 'Capitulo 2';
        $video->url_chapter = str_slug("Capitulo 2");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjendxaWk4UVNmc0VXdzZQNlFTeDgyRGR6VFh0QTNkdnBPeXBvK3hTb28vYg==&bg=/image.tmdb.org/t/p/w780/n3vGYt82f6YqD1eAHVuAhkQQBAJ.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 2;
        $video->season_id = 1;
        $video->chapter = 'Capitulo 3';
        $video->url_chapter = str_slug("Capitulo 3");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjM2N6dDFOT1B5VFNkSW1CVkpTU1huUGYvUjlxOHFJcStwcUlodFE5MTdmLw==&bg=/image.tmdb.org/t/p/w780/pQluUwtpgk7KJsTfS2CdoJBKcyb.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 2;
        $video->season_id = 1;
        $video->chapter = 'Capitulo 4';
        $video->url_chapter = str_slug("Capitulo 4");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjNWhkMjArZjIrNVRaUFljTDF3eGJHenF6VGloQlNNU1F6YjBsNFU5UDhOUg==&bg=/image.tmdb.org/t/p/w780/ktATJ6sEfEqu6HfGpE9FD7WIjvq.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 2;
        $video->season_id = 1;
        $video->chapter = 'Capitulo 5';
        $video->url_chapter = str_slug("Capitulo 5");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjeFhXR0tjNmJ4RWhhZG1qaE5wRVdZRkowVjFYQlRodXdyanUzck5acHA3Sw==&bg=/image.tmdb.org/t/p/w780/11HGUikej3bARNmp44vEnkBel5K.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 2;
        $video->season_id = 1;
        $video->chapter = 'Capitulo 6';
        $video->url_chapter = str_slug("Capitulo 6");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjMUtLTU5WZUtRL1hiTTJmakhqTG9CbW9JTjlSSkpONHJQWEdIUWpHTWh0cw==&bg=/image.tmdb.org/t/p/w780/4p4MIZG60gGHChGtTDQMO8Afb9R.jpg";
        $video->save();


        $season = new Season();
        $season->post_id = 4;
        $season->season = 'Temporada 1';
        $season->url_season = str_slug("Temporada 1");
        $season->save();

        $video = new Video();
        $video->post_id = 4;
        $video->season_id = 2;
        $video->chapter = 'Capitulo 1';
        $video->url_chapter = str_slug("Capitulo 1");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjL3d3L00rbUkxL1RuSzBJQ2FKRzBJaDh2cGlNU1BsUHVnTUZwRnZIVHdjZw==&bg=/image.tmdb.org/t/p/w780/l3mOi1hYf7SMmO28SJ69ynCDpvW.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 4;
        $video->season_id = 2;
        $video->chapter = 'Capitulo 2';
        $video->url_chapter = str_slug("Capitulo 2");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjNFFFVjNqWnpyT1Z0cXZLNUIxMEdyS3Q4ODlJN0pJSzBWUDd0dTlFdkN1Tg==&bg=/image.tmdb.org/t/p/w780/d3c3iXv04bPmTv0V9QTGew0n36k.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 4;
        $video->season_id = 2;
        $video->chapter = 'Capitulo 3';
        $video->url_chapter = str_slug("Capitulo 3");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjMGZyYU1VRjIzVzVlQ0x4WVJPRUNQcW5CYk41Q3lUbW9BMHZqMGN2VTI1ZA==&bg=/image.tmdb.org/t/p/w780/jG5jjxTcpvxn74cY4LFIzeqGph3.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 4;
        $video->season_id = 2;
        $video->chapter = 'Capitulo 4';
        $video->url_chapter = str_slug("Capitulo 4");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjeFIvTmFRa09vb0JmZnZRcUFlWi82dzJDclNVVEJFUGIxV3AxTUpGMVJpaw==&bg=/image.tmdb.org/t/p/w780/2BPHWlIVes7uNniuM5jyoflAbap.jpg";
        $video->save();

        $video = new Video();
        $video->post_id = 4;
        $video->season_id = 2;
        $video->chapter = 'Capitulo 5';
        $video->url_chapter = str_slug("Capitulo 5");
        $video->iframe_chapter = "https://gcs.megaplay.cc/index.php?h=WEdZM1RiREEzSEFhZEJhQXVSenBjMzRDMUlMNEM5UXR3Y0RyKzVFdmRYdFZob0NYdDVWQkJJOWpnUlhodzRGYg==&bg=/image.tmdb.org/t/p/w780/piwRYraJ1jUE8pcuQJfWPgs6hdy.jpg";
        $video->save();
    }
}
