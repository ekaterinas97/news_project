<?php

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNews(int $id = null): array
    {
        $news = [];
        $getCurrentNews = static function(int $id): array
        {
            return [
                'id' => $id,
                'title'=> fake()->jobTitle(),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
            ];
        };
        if($id === null){
            for ($i = 0; $i < 10; $i++) {
                $news[] = $getCurrentNews($i + 1);
            }
            return $news;
        }
        return $getCurrentNews($id);
    }
}
