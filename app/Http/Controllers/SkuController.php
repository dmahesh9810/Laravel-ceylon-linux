<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSkuRequest;
use App\Models\Sku;
use App\Services\IdGenerator;


class SkuController extends Controller
{
    public function index()
    {
        return view('admin.addsku');
    }

    public function store(AddSkuRequest $addSkuRequest)
    {
        $distributor = new Sku();
        $distributor->sku_id = IdGenerator::GenerateId(new Sku(), 'code', 2, 'SID');
        $distributor->code  = IdGenerator::GenerateId(new Sku(), 'code', 2, 'SKU');
        $distributor->name = $addSkuRequest->get('name');
        $distributor->mrp = $addSkuRequest->get('mrp');
        $distributor->distributor_price = $addSkuRequest->get('distributor_price');
        $distributor->weight = $addSkuRequest->get('weight');
        $distributor->weight_id = $addSkuRequest->get('weight_id');
        $distributor->save();

        return redirect()
            ->route('addsku.index')
            ->with('success', 'New user has been created');
    }
}
