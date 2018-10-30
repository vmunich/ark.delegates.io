<?php

namespace Tests\Feature\Http\Front\Delegates;

use Tests\TestCase;
use App\Models\Delegate;

/**
 * @coversNothing
 */
class ShowTest extends TestCase
{
    /** @test */
    public function guests_can_view_the_delegate()
    {
        $delegate = factory(Delegate::class)->create();

        $this
            ->get("/delegates/{$delegate->username}")
            ->assertSuccessful();
    }
}
