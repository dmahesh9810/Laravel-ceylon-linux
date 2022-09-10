<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index()
    {
        // return redirect()->back();
    }
    public function store(Request $request)
    {

        if(!$request->orderid){
            return redirect()->back();


        }else{
            $data = $request->orderid;

            $orders = [];
            for ($i = 0; $i < count($data); $i++) {
                $orders[] =  Order::query()->where('id', $data[$i])->get();
            }
            $pdf = Pdf::loadView('invoice',['orders' => $orders]);
            return $pdf->stream('temp.pdf');
            // return view('invoice',['orders' => $orders]);
        }



    }
}