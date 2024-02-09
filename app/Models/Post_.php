<?php

namespace App\Models;


class Post
{
    private static $post_blog = [
        [
            'judul' => 'Domin Los',
            'slug' => 'domin-los',
            'author' => 'Adriana Madalena Lopes Magno',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem nemo tempore voluptatum iste eius dolores dolorem quae quam quas, alias assumenda excepturi ex esse sed cupiditate omnis ab deserunt!'
        ],

        [
            'judul' => 'Historia Moris',
            'slug' => 'historia-moris',
            'author' => 'Brito Lazaro da Conceicao',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem nemo tempore voluptatum iste eius dolores dolorem quae quam quas, alias assumenda excepturi ex esse sed cupiditate omnis ab deserunt! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt exercitationem nemo tempore voluptatum iste eius dolores dolorem quae quam quas, alias assumenda excepturi ex esse sed cupiditate omnis ab deserunt!'
        ],

    ];

    public static function All()
    {
        return collect(self::$post_blog);
    }

    public static function find($slug)
    {
        $posts = static::All();

        return $posts->firstWhere('slug', $slug);
    }
}
