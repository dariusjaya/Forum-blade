<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "darius jaya darfian",
        "email" =>"dariusjaya@yahoo.com"
    ]);
});



Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Dota 2 ",
            "slug" => "judul-post-pertama",
            "author" => "Darius Jaya",
            "body" => ""
        ],
        [
            "title" => "Valorant",
            "slug"=> "judul-post-kedua",
            "author" => "Hadi Jaya",
            "body" => ""
        ],
    ];


    return view('posts', [
        "title"=> "Posts",
        "posts" => $blog_posts
    ]);
});

// halaman single
Route::get('posts/{slug}', function($slug){

    $blog_posts = [
        [
            "title" => "Dota 2",
            "slug" => "judul-post-pertama",
            "author" => "Valve Corporation",
            "body" => "Dota 2 is a 2013 multiplayer online battle arena video game developed and published by Valve.
            The game is a sequel to Defense of the Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III: Reign of Chaos"
        ],
        [
            "title" => "Valorant",
            "slug"=> "judul-post-kedua",
            "author" => "Riot Games",
            "body" => "Valorant is a free-to-play first-person hero shooter developed and published by Riot Games, for Microsoft Windows.
            Teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by a release on June 2, 2020."
        ],
    ];
$new_post = [];
foreach($blog_posts as $post){
    if($post["slug"] === $slug){
        $new_post= $post;
    }
}

    return view('post',[
        "title"=> "single Post",
        "post" => $new_post
    ]);
});
