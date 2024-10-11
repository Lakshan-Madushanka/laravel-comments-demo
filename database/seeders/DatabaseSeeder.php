<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use LakM\Comments\Models\Comment;
use LakM\Comments\Models\Guest;

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

       $this->createGuestModePost();
       $this->createAuthModePost();
    }

    public function createGuestModePost(): void
    {
        $post = Post::factory()
            ->create();

        // Add comments
        $comments = [];

        for ($i = 0; $i <= 25; $i++) {
            $guest = Guest::query()
                ->create([
                    'name' => fake()->unique()->name(),
                    'email' => fake()->unique()->email(),
                    'ip_address' => fake()->ipv4()
                ]);
            $comments[] = [
                'text' => fake()->paragraph(),
                'commenter_type' => $guest->getMorphClass(),
                'commenter_id' => $guest->getKey(),
            ];
        }
        $comments = $post->comments()->createMany($comments);

        // Add Replies
        $comments->take(5)
            ->each(function (Comment $comment) {
                $replies = [];
                $limit = random_int(10, 20);

                for ($i = 0; $i <= $limit; $i++) {
                    $guest = Guest::query()
                        ->create([
                            'name' => fake()->unique()->name(),
                            'email' => fake()->unique()->email(),
                            'ip_address' => fake()->ipv4()
                        ]);

                    $replies[] = [
                        'text' => fake()->paragraph(),
                        'commenter_type' => $guest->getMorphClass(),
                        'commenter_id' => $guest->getKey(),
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
                    $guest = Guest::query()
                        ->create(['ip_address' => fake()->ipv4()]);

                    $reactions[] = [
                        'type' => fake()->randomElement(array_keys(config('comments.reactions'))),
                        'owner_id' => $guest->getKey(),
                        'owner_type' => $guest->getMorphClass(),
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
                        'owner_id' => User::factory()->create()->getAuthIdentifier(),
                        'owner_type' => (new User())->getMorphClass()
                    ];
                }

                $comment->reactions()->createMany($reactions);
            });
    }
}
