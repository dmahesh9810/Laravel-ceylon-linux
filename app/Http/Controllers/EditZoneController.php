<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddZoneRequest;
use App\Http\Requests\AdminRequest;
use App\Models\zone;
use Illuminate\Http\Request;

class EditZoneController extends Controller
{
    public function index()
    {
        return view('admin.edit.zone')
            ->with([
                'zones' => zone::query()
                    ->paginate(6)
            ]);
    }

    public function edit(AdminRequest $adminRequest, zone $zone)
    {

        return view('admin.edit.edit-zone')
            ->with(['zone' => $zone]);
    }
    public function update(AddZoneRequest $request, zone $zone)
    {
        $zone->update($request->validated());
        return redirect('/admin/allzone');
    }
    public function delete(AdminRequest $adminRequest, zone $zone)
    {
        $zone->delete();
        return redirect('/admin/allzone');
    }
}