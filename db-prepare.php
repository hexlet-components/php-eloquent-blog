<?php

use App\config\schema;
use App\config\loaders;
use App\Models\User;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Tag;
use App\Models\PostLike;
use App\Models\PostTag;

require 'vendor/autoload.php';

loaders\bootstrap();
schema\load();

$users = User::factory()->count(10)->create();
$tags = Tag::factory()->count(5)->create();

foreach ($users as $user) {
    $posts = Post::factory()
        ->count(3)
        ->for($user, 'creator')
        ->create();

    foreach ($posts as $post) {
        // Комментарии
        PostComment::factory()
            ->count(rand(1, 5))
            ->for($post)
            ->for($users->random(), 'creator')
            ->create();

        $likedUsers = $users->random(rand(1, 5));
        foreach ($likedUsers as $liker) {
            PostLike::factory()
                ->for($post)
                ->for($liker, 'creator')
                ->create();
        }

        $postTags = $tags->random(rand(1, 3));
        foreach ($postTags as $tag) {
            PostTag::factory()
                ->for($post)
                ->for($tag)
                ->create();
        }
    }
}

echo "✅ Seeding complete.\n";
