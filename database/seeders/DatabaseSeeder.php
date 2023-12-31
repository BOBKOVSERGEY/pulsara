<?php

declare(strict_types=1);

namespace Database\Seeders;


use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Enums\Publishing\Stage;
use App\Enums\Publishing\Status;
use App\Models\Group;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'first_name' => 'Sergey',
            'last_name' => 'Bobkov',
            'email' => 'bobkovsergeyarkadevich@gmail.com',
            'role' => Role::Admin,
            'provider' => Provider::Email,
            'avatar' => 'https://github.com/sergeybobkov.png',
        ]);

        $profile = Profile::factory()->for($user)->create([
            'handle' => 'bobkovs',
            'country' => 'ru',
        ]);

        $group = Group::factory()->for($user)->create([
            'name' => 'feed',
            'description' => 'The default news feed group.',
            'status' => Status::Verified,
        ]);

        Post::factory()->for($group)->for($profile)->count(25)->create([
            'stage' => Stage::Approved,
        ]);
    }
}
