<?php

namespace App\Models;


class Post
{
        private static $blog_posts = [
            [
                "title" => "Judul Post Pertama",
                "slug" => "judul-post-pertama",
                "author" => "Yoga Aditya",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo magni esse praesentium corrupti quod nihil consectetur, repellat dolorum veritatis rerum, minus corporis nisi iure voluptatem beatae aliquid laboriosam est inventore animi. Nemo in et laboriosam non explicabo sapiente, repellat minus, blanditiis laudantium dicta quia distinctio eum numquam excepturi commodi iusto esse qui voluptatum facere. Iusto sunt, quia libero optio reprehenderit fuga eos aperiam pariatur id sequi modi corrupti dolorem placeat dolores, totam, molestias aspernatur eaque error. Numquam dolorum fuga, perspiciatis non itaque quod dolor id sunt eum accusamus ducimus tempore nisi aspernatur corporis laboriosam modi officia repellendus laborum aperiam ea eligendi nam quibusdam. Hic eveniet voluptates, explicabo laborum sequi iste sit aspernatur magni delectus consequuntur corrupti quia a modi laudantium culpa tempora. Possimus ex optio voluptates nisi unde placeat? Mollitia, ullam perspiciatis omnis dolorem dolore et aspernatur minus animi ipsum vel sit architecto, doloremque obcaecati reiciendis! Repudiandae harum ratione repellendus!"
            ],
            [
                "title" => "Judul Post Kedua",
                "slug" => "judul-post-kedua",
                "author" => "Cupa Store",
                "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias pariatur eligendi, dolorum incidunt rem officiis enim voluptatum cupiditate sunt non accusantium in ipsa et illo, consequuntur a quaerat facere molestiae commodi fugiat, temporibus saepe sapiente doloremque earum. Inventore itaque quibusdam maxime rem eos dignissimos expedita tempora possimus eveniet quo vero illo repudiandae rerum illum commodi voluptate, placeat laboriosam mollitia? Culpa, ullam asperiores, doloribus ad quibusdam cupiditate totam ab commodi, possimus perferendis ducimus. Rerum incidunt veniam animi fugiat aut nemo rem voluptatibus soluta cumque odio dolorem unde quisquam velit laboriosam odit libero earum, enim ex nisi neque repudiandae exercitationem minima atque."
            ],
        ];

        public static function all()
        {
            return collect(self::$blog_posts);
        }

        public static function find($slug)
        {
            $posts = static::all();
            return $posts->firstWhere('slug', $slug);
        }
}
