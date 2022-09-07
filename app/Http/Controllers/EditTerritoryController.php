<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTerritoryRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Territory;
use Illuminate\Http\Request;

class EditTerritoryController extends Controller
{
    public function index()
    {
        return view('admin.edit.territory')
            ->with([
                'territors' => Territory::query()
                    ->paginate(2)
            ]);
    }

    public function edit(AdminRequest $adminRequest, Territory $Territory)
    {
        return view('admin.edit.edit-territory')
            ->with(['territory' => $Territory]);
    }

    public function update(AddTerritoryRequest $request, Territory $territory)
    {
        $territory->update($request->validated());
        return redirect('/admin/allterritory');
    }

    public function delete(AdminRequest $adminRequest, Territory $Territory)
    {
        $Territory->delete();
        return redirect('/admin/allterritory');
    }


}
