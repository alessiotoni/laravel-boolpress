<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["tag_primo", "tag_secondo", "tag_terzo", "tag_quarto"];
        foreach($tags as $tag)
        {
            $new_tag_object = new Tag();
            $new_tag_object->name = $tag;
            $new_tag_object->slug = Str::slug($tag);
            $new_tag_object->save();


        }
    }
}
