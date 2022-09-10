<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    protected $id;
    protected $trust;

    function __construct($id, $trust)
    {
        $this->id = $id;
        $this->trust = $trust;
    }
    public function collection()
    {
        if ($this->trust == 1) {

            return Order::where('user_id', $this->id)->get();
        } else {
            return Order::all();
        }
    }

    public function map($order): array
    {

        if ($this->trust == 1) {
            return [
                $order->po_no,
                $order->sku->code,
                $order->remark,
                $order->qty,
                $order->sku->distributor_price,
                $order->sku->distributor_price * $order->qty,
            ];
        } else {
            return [
                $order->po_no,
                $order->user_id,
                $order->sku->code,
                $order->remark,
                $order->qty,
                $order->sku->distributor_price,
                $order->sku->distributor_price * $order->qty,
            ];
        }
    }
    public function headings(): array
    {
        if ($this->trust == 1) {

            return [
                'po_no',
                'sku_code',
                'remark',
                'qty',
                'unit price',
                'Total price',
            ];
        } else {
            return [
                'po_no',
                'user_id',
                'sku_code',
                'remark',
                'qty',
                'unit price',
                'Total price',
            ];
        }
    }
}