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
        return [
            $order->id,
            $order->user_id,
            $order->sku_id,
            $order->remark,
            $order->qty,
            $order->po_no,
        ];
    }
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'sku_id',
            'remark',
            'qty',
            'po_no',
        ];
    }
}
