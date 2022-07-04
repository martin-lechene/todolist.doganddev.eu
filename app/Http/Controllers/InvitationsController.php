<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvitationRequest;


class HomeController extends Controller
{
    public function store(StoreInvitationRequest $request)
    {
        $invitation = new Invitation($request->all());
        $invitation->generateInvitationToken();
        $invitation->save();

        return redirect()->route('requestInvitation')
            ->with('success', 'Invitation to register successfully requested. Please wait for registration link.');
    }
}
