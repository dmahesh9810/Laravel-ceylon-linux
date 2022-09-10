<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSkuRequest;
use App\Models\Sku;
use App\Services\IdGenerator;


class SkuController extends Controller
{
    public function index()
    {
        $skuid = IdGenerator::GenerateId(new Sku(), 'code', 2, 'SID');
        $skucode = IdGenerator::GenerateId(new Sku(), 'code', 2, 'SKU');
        return view('admin.addsku')->with(['skuid' => $skuid, 'skucode' => $skucode]);;
    }

    public function store(AddSkuRequest $addSkuRequest)
    {
        $distributor = new Sku();
        $distributor->sku_id = $addSkuRequest->get('skuid');
        $distributor->code  = $addSkuRequest->get('skucode');
        $distributor->name = $addSkuRequest->get('name');
        $distributor->mrp = $addSkuRequest->get('mrp');
        $distributor->distributor_price = $addSkuRequest->get('distributor_price');
        $distributor->weight = $addSkuRequest->get('weight');
        $distributor->weight_id = $addSkuRequest->get('weight_id');
        $distributor->save();

        return redirect()
            ->route('addsku.index')
            ->with('success', 'New sku has been created');
    }
}