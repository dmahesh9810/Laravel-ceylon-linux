<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\IdGenerator;
use Carbon\Carbon;
use App\Exports\OrderExport;
use App\Http\Requests\OrderRequest;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        if ($request->searchclick === 1) {
            dd("asd");
        } else {

            if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

                $order = Order::all();
                return $this->viewOrder($order);
            } else {
                $order = Order::where('user_id', 'like', $request->user()->id)->get();
                return $this->viewOrder($order);
            }
        }
    }

    public function viewOrder($order)
    {
        return view('order')
            ->with(['orders' => $order]);
    }


    public function store(OrderRequest $request)
    {
        $remark = $request->remark;
        $skid = $request->skuid;
        $qty = $request->qty;

        for ($i = 0; $i < count($skid); $i++) {

            if (!$qty[$i] == 0 && $remark) {

                $data = [
                    'user_id' => $request->user()->id,
                    'sku_id' => $skid[$i],
                    'remark' => $remark,
                    'qty' => $qty[$i],
                    'po_no' => IdGenerator::GenerateId(new Order(), 'po_no', 2, '000'),
                    'date' => Carbon::now(),
                ];
                DB::table('orders')->insert($data);
            }
        }
        return redirect()->back();
    }
    public function export(Request $request)
    {

        $trust = 1;
        if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

            $trust = 2;
        }

        return Excel::download(new OrderExport($request->user()->id, $trust), 'invoices.xlsx');
    }
    public function search(Request $request)
    {

        if ($request->searchclick === 1) {
            dd("asd");
        } else {

            if ($request->user()->hasRole(Role::ROLE_ADMIN)) {

                $order = Order::all();
                return $this->viewOrder($order);
            } else {
                $order = Order::where('user_id', 'like', $request->user()->id)->get();
                return $this->viewOrder($order);
            }
        }
    }
}
