<?php

namespace Tests\Feature\Notifications;

use Tests\TestCase;
use App\Models\User;
use App\Models\Delegate;
use App\Notifications\RankShifted;
use Illuminate\Support\Facades\Notification;

/**
 * @coversNothing
 */
class RankShiftedTest extends TestCase
{
    /** @test */
    public function it_should_notify_the_user()
    {
        Notification::fake();

        $delegate = factory(Delegate::class)->create();

        $user = factory(User::class)->create();
        $user->notify(new RankShifted($delegate));

        Notification::assertSentTo(
            $user,
            RankShifted::class,
            function ($notification, $channels) use ($delegate) {
                return $notification->delegate->id === $delegate->id;
            }
        );
    }
}
