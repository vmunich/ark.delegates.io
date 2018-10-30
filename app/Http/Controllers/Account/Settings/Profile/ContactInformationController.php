<?php

namespace App\Http\Controllers\Account\Settings\Profile;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Account\Settings\Profile\ChangeContactInformation;

class ContactInformationController extends Controller
{
    /**
     * Show the contact information settings.
     *
     * @return \Illuminate\View\View
     */
    public function showForm(): View
    {
        return view('account.settings.profile');
    }

    /**
     * Update the user's contact information settings.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function update(ChangeContactInformation $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        alert()->success('Your contact information is being updated! The changes should be reflected in a moment.');

        return back();
    }
}
