<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use App\Models\User;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::query()->role('distributor')->get();
        $sku = Sku::query()->get();
        return view('distributor.dashboard')
            ->with(['users' => $user])
            ->with(['skus' => $sku]);
    }
}
