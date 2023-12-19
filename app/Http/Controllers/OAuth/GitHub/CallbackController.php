<?php

declare(strict_types=1);

namespace App\Http\Controllers\OAuth\GitHub;

use App\Enums\Identity\Provider;
use Illuminate\Http\Request;
use Laravel\Socialite\SocialiteManager;

final readonly class CallbackController
{
    public function __construct(
        private SocialiteManager $manager,
    ) {
    }

    public function __invoke(Request $request)
    {
        $user = $this->manager->driver(
            driver: 'github'
        )->user();

        dd($user);
    }
}
