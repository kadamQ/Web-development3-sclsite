<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->title ="Animals";
        $tag->save();

        $tag = new Tag();
        $tag->title ="Funny";
        $tag->save();

        $tag = new Tag();
        $tag->title ="Gaming";
        $tag->save();

        $tag = new Tag();
        $tag->title ="Science";
        $tag->save();

        $tag = new Tag();
        $tag->title ="Sport";
        $tag->save();
    }
}
