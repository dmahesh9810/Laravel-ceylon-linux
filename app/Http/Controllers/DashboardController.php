<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return redirect()->route($this->getUser($request->user()));
    }
    private function getUser(User $user): string
    {
        if ($user->Admin()) {
            return 'admin.dashboard';
        }

        if ($user->Distributor()) {
            return 'distributor.dashboard';
        }
    }
}
