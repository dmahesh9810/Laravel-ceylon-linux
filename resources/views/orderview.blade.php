<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @role('admin')
                <a href="/order"
                class="p-6 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-yellow-400 cursor-pointer">Back</a>
                @endrole
                @role('distributor')
                <a href="{{ route('order.index') }}"
                class="p-6 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-yellow-400 cursor-pointer">Back</a>
                @endrole
<div class="p-6">
    <label for="">PO Number : {{$orders->po_no}}</label><br>
    <label for="">Date : {{$orders->date}}</label><br>
    <label for="">Sku Code : {{$orders->sku->code}}</label><br>
    <label for="">Sku Id : {{$orders->sku->sku_id}}</label><br>
    <label for="">QTY : {{$orders->qty}}</label><br>
    <label for="">MRP : {{$orders->sku->mrp}} </label><br>
    <label for="">Weight : {{$orders->sku->weight}} {{$orders->sku->weight_id}}</label><br>
    <label for="">Unit Price : {{$orders->sku->distributor_price}}</label><br>
    <label for="">Total Price : {{$orders->sku->distributor_price * $orders->qty}}</label><br>
</div>
            </div>
        </div>
    </div>

</x-app-layout>
