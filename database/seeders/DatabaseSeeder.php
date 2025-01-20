<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => 'Pedro',
        //     'email' => 'pedro@example.com',
        //     'password' => Hash::make('password')
        // ]);

        // DB::table('posts')->insert([
        //     'owner_id' => '1',
        //     'name' => 'O Corvo',
        //     'type' => 'movie',
        //     'description' => 'Na noite antes de seu casamento, o músico Eric Draven e sua noiva são brutalmente assassinados por membros de uma gangue violenta do centro da cidade.
        //                         No aniversário da sua morte, Eric sai de sua sepultura e assume o manto gótico do Corvo, 
        //                         um vingador sobrenatural, rastreando os bandidos responsáveis pelo 
        //                         crime que os assassinaram impiedosamente. Eric finalmente confronta o líder 
        //                         gangster Top Dollar para completar sua missão macabra',
        //     'genre' => 'Ação/Terror',
        //     'director' => 'Alex Proyas',
        //     'release_date' =>'1994-08-19',
        //     'duration' => '102',
        //     'rating' => '4.5',
        //     'poster_image' => 'https://www.papodecinema.com.br/wp-content/uploads/2024/03/20240318-o-corvo-1994-papo-de-cinema-crtaz.jpeg'
        // ]);

        // DB::table('posts')->insert([
        //     'owner_id' => '2',
        //     'name' => 'Matrix',
        //     'type' => 'movie',
        //     'description' => 'Um jovem programador, Thomas Anderson, descobre que o mundo em que vive é uma simulação virtual chamada Matrix, 
        //                        criada para subjugar a humanidade. Ele é levado por Morpheus e Trinity a uma realidade sombria, 
        //                        onde descobre que é "Neo", o Escolhido, destinado a libertar a humanidade dos domínios das máquinas.',
        //     'genre' => 'Ficção Científica/Ação',
        //     'director' => 'Lana Wachowski, Lilly Wachowski',
        //     'release_date' => '1999-03-31',
        //     'duration' => '136',
        //     'rating' => '4.8',
        //     'poster_image' => 'https://www.themoviedb.org/t/p/original/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg'
        // ]);
        
        // DB::table('posts')->insert([
        //     'owner_id' => '1',
        //     'name' => 'King Kong',
        //     'type' => 'movie',
        //     'description' => 'Em 1933, uma equipe de filmagem liderada pelo diretor Carl Denham viaja para a misteriosa Ilha da Caveira, 
        //                        onde encontram criaturas pré-históricas e um gigantesco gorila chamado Kong. 
        //                        Kong se apaixona pela atriz Ann Darrow, mas é capturado e levado a Nova York, 
        //                        onde enfrenta um destino trágico no topo do Empire State Building.',
        //     'genre' => 'Aventura/Fantasia',
        //     'director' => 'Peter Jackson',
        //     'release_date' => '2005-12-14',
        //     'duration' => '187',
        //     'rating' => '4.3',
        //     'poster_image' => 'https://www.themoviedb.org/t/p/original/8F9xUvb1JMWUMkFV2Yq3aiueAbq.jpg'
        // ]);

        // DB::table('posts_vote')->insert([
        //     'post_id' => '1',
        //     'owner_id' => '1',
        //     'up_vote' => '3',
        //     'down_vote' => '2'
        // ]);

        // DB::table('posts_vote')->insert([
        //     'post_id' => '2',
        //     'owner_id' => '2',
        //     'up_vote' => '15',
        //     'down_vote' => '7'
        // ]);

        // DB::table('posts_followers')->insert([
        //         'follower_id' => '1',
        //         'post_id' => '1',
        //         'owner_post_id' => 1
        // ]);
        
    }
}
