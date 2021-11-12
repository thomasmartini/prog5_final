<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        $user = User::factory()->create();


        $tat = Category::create([
            'name' => 'Tips and Tricks',
            'slug' => 'tips_and_tricks'

        ]);
        $highlights = Category::create([
            'name' => 'Highlights',
            'slug' => 'highlights'
        ]);
        $utility = Category::create([
            'name' => 'Utility',
            'slug' => 'utility'
        ]);
        $discussion = Category::create([
            'name' => 'Discussion',
            'slug' => 'discussion'

        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $highlights->id,
            'title' => 'first highlight',
            'slug' => 'first_highlight',
            'body' => 'nog meer lorem ipsum maar dan is het de body'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $utility->id,
            'title' => 'first smoke',
            'slug' => 'first_smoke',
            'body' => 'nog meer lorem ipsum maar dan is het de body'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $tat->id,
            'title' => 'first tip',
            'slug' => 'first_tip',
            'body' => 'nog meer lorem ipsum maar dan is het de body'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $utility->id,
            'title' => 'new molly',
            'slug' => 'new_molly',
            'body' => 'nog meer lorem ipsum maar dan is het de body'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $discussion->id,
            'title' => 'S1mple goat?',
            'slug' => 's1mple_goat',
            'body' => 'Is he really that good? I mean he has the same amount of majors as Devilwalk'
        ]);
    }

}
