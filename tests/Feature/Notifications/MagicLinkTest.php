<?php

namespace Tests\Feature\Notifications;

use Tests\TestCase;
use App\Models\User;
use App\Notifications\MagicLink;
use Illuminate\Support\Facades\Notification;

/**
 * @coversNothing
 */
class MagicLinkTest extends TestCase
{
    /** @test */
    public function it_should_notify_the_user()
    {
        Notification::fake();

        $user = factory(User::class)->create();
        $user->notify(new MagicLink($user));

        Notification::assertSentTo($user, MagicLink::class);
    }
}
