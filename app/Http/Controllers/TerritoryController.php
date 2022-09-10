<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTerritoryRequest;
use App\Models\Region;
use App\Models\Territory;
use App\Models\zone;
use Illuminate\Http\Request;
use App\Services\IdGenerator;

class TerritoryController extends Controller
{
    public function index()
    {
        $code = IdGenerator::GenerateId(new Territory(), 'code', 2, 'TER');
        $zone= zone::all();
        $region= Region::all();
        return view('admin.addterritory')->with(['code' => $code,'zone' => $zone,'region'=>$region]);
    }

    public function store(AddTerritoryRequest $addTerritoryRequest)
    {
        $territory = new Territory();
        $territory->region_id = $addTerritoryRequest->get('region_id');
        $territory->code = $addTerritoryRequest->get('code');
        $territory->name = $addTerritoryRequest->get('name');
        $territory->save();

        return redirect()
            ->route('addterritory.index')
            ->with('success', 'New territory has been created');
    }
}