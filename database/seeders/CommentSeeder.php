<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = Comment::create([
            'news_id' => 1,
            'comment_usr_id' => 2,
            'comment' => 'Asikkk Libur'
        ]);

        $comment = Comment::create([
            'news_id' => 2,
            'comment_usr_id' => 2,
            'comment' => 'Asikkk Libur'
        ]);


    }
}
