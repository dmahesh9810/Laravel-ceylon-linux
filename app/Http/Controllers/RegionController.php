<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRegionRequest;
use App\Models\Region;
use App\Models\zone;
use Illuminate\Http\Request;
use App\Services\IdGenerator;

class RegionController extends Controller
{
    public function index()
    {
        $code = IdGenerator::GenerateId(new Region(), 'region_code', 2, 'REG');
        $zone= zone::all();
        return view('admin.addregion')
        ->with(['code' => $code,'zone' => $zone]);
    }
    public function store(AddRegionRequest $addRegionRequest)
    {
        $region = new Region();
        $region->zone_id = $addRegionRequest->get('zone_id');
        $region->region_code = $addRegionRequest->get('code');
        $region->region_name = $addRegionRequest->get('region_name');
        $region->save();

        return redirect()
            ->route('addregion.index')
            ->with('success', 'New region has been created');
    }

}