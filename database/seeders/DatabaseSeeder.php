<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use LakM\Comments\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

//        $this->createGuestModePost();
//        $this->createAuthModePost();
    }

    public function createGuestModePost(): void
    {
        $post = Post::factory()
            ->create();

        // Add comments
        $comments = [];

        for ($i = 0; $i <= 25; $i++) {
            $comments[] = [
                'text' => fake()->paragraph(),
                'guest_name' => fake()->unique()->name(),
                'guest_email' => fake()->unique()->email(),
                'ip_address' => fake()->ipv4()
            ];
        }
        $comments = $post->comments()->createMany($comments);

        // Add Replies
        $comments->take(5)
            ->each(function (Comment $comment) {
                $replies = [];
                $limit = random_int(10, 20);

                for ($i = 0; $i <= $limit; $i++) {
                    $replies[] = [
                        'text' => fake()->paragraph(),
                        'guest_name' => fake()->unique()->name(),
                        'guest_email' => fake()->unique()->email(),
                        'ip_address' => fake()->ipv4()
                    ];
                }

               $comment->replies()
                   ->createMany($replies);
            });

        // Add Reactions
        $comments->take(10)
            ->each(function (Comment $comment) {
                $reactions = [];
                $limit = random_int(10, 25);

                for ($i = 0; $i <= $limit; $i++) {
                    $reactions[] = [
                        'type' => fake()->randomElement(array_keys(config('comments.reactions'))),
                        'ip_address' => fake()->ipv4()
                    ];
                }

                $comment->reactions()->createMany($reactions);
            });
    }

    public function createAuthModePost(): void
    {
        $article = Article::factory()
            ->create();

        // Add comments
        $comments = [];

        for ($i = 0; $i <= 25; $i++) {
            $user = User::factory()->create();
            $comments[] = [
                'text' => fake()->paragraph(),
                'commenter_type' => $user->getMorphClass(),
                'commenter_id' => $user->getAuthIdentifier(),
                'ip_address' => fake()->ipv4()
            ];
        }
        $comments = $article->comments()->createMany($comments);

        // Add Replies
        $comments->take(5)
            ->each(function (Comment $comment) {
                $replies = [];
                $limit = random_int(10, 20);

                for ($i = 0; $i <= $limit; $i++) {
                    $user = User::factory()->create();
                    $replies[] = [
                        'text' => fake()->paragraph(),
                        'commenter_type' => $user->getMorphClass(),
                        'commenter_id' => $user->getAuthIdentifier(),
                        'ip_address' => fake()->ipv4()
                    ];
                }

                $comment->replies()
                    ->createMany($replies);
            });

        // Add Reactions
        $comments->take(10)
            ->each(function (Comment $comment) {
                $reactions = [];
                $limit = random_int(10, 25);

                for ($i = 0; $i <= $limit; $i++) {
                    $reactions[] = [
                        'type' => fake()->randomElement(array_keys(config('comments.reactions'))),
                        'user_id' => User::factory()->create()->getAuthIdentifier(),
                        'ip_address' => fake()->ipv4()
                    ];
                }

                $comment->reactions()->createMany($reactions);
            });
    }
}
