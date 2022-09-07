<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRegionRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Region;
use Illuminate\Http\Request;

class EditRegionController extends Controller
{
    public function index()
    {
        return view('admin.edit.region')
            ->with([
                'regions' => Region::query()
                    ->paginate(2)
            ]);
    }

    public function edit(AdminRequest $adminRequest, Region $Region)
    {
        return view('admin.edit.edit-region')
            ->with(['region' => $Region]);
    }

    public function update(AddRegionRequest $request, Region $region)
    {
        $region->update($request->validated());
        return redirect('/admin/allregion');
    }

    public function delete(AdminRequest $adminRequest, Region $region)
    {
        $region->delete();
        return redirect('/admin/allregion');
    }
}
