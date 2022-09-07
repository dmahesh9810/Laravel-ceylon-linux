<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTerritoryRequest;
use App\Models\Territory;
use Illuminate\Http\Request;
use App\Services\IdGenerator;

class TerritoryController extends Controller
{
    public function index()
    {
        return view('admin.addterritory');
    }

    public function store(AddTerritoryRequest $addTerritoryRequest)
    {
        $territory = new Territory();
        $territory->region_id = $addTerritoryRequest->get('region_id');
        $territory->code = IdGenerator::GenerateId(new Territory(), 'code', 2, 'TER');
        $territory->name = $addTerritoryRequest->get('name');
        $territory->save();

        return redirect()
            ->route('addterritory.index')
            ->with('success', 'New region has been created');
    }
}
