<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddZoneRequest;
use App\Http\Requests\AdminRequest;
use App\Models\zone;
use App\Services\IdGenerator;

class ZoneController extends Controller
{
    public function index()
    {
        $code = IdGenerator::GenerateId(new zone(), 'code', 2, 'ZON');
        return view('admin.addzone')->with(['code' => $code]);
    }

    public function store(AddZoneRequest $addZoneRequest)
    {

        $zone = new zone();
        $zone->code = $addZoneRequest->get('code');
        $zone->discription = $addZoneRequest->get('discription');
        $zone->short_discription = $addZoneRequest->get('short_discription');
        $zone->save();

        return redirect()
            ->route('addzone.index')
            ->with('success', 'New zone has been created');
    }

}
