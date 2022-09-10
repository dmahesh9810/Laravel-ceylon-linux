<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">

                    <form action="{{ route('ordersearch.store') }}" method="post">
                        @csrf
                        <label for="">Region</label>
                        <input type="text" name="searchclick" value="1" hidden>

                        <label for="">PO NO</label>
                        <input type="text" name="pono">
                        <label for="">FROM</label>
                        <input type="date" name="datefrom">
                        <label for="">TO</label>
                        <input type="date" name="dateto">
                        <input type="submit" value="Search"
                            class="ml-2 text-center text-white font-bold rounded p-4 m-4 w-1/12 focus:outline-none bg-green-400 cursor-pointer">
                    </form>
                </div>
                <form action="{{ route('invoice.store') }}" method="POST">
                    @csrf
                    <div class="p-6 bg-white border-b border-gray-200">




                        <div class="overflow-x-auto relative">
                            <table class="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="">

                                        </th>
                                        @role('admin')
                                            <th scope="col" class="py-3 px-6">
                                                REGION
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                TERRITORY
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                DISTRIBUTOR
                                            </th>
                                        @endrole
                                        <th scope="col" class="py-3 px-6">
                                            PO NO
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            DATE
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            TIME
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            TOTAL AMOUNT
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            VIEW
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td>
                                                <input type="checkbox" name="orderid[]" id=""
                                                    value="{{ $order->id }}">
                                                <input type="text" name="skuname[]" value="{{ $order->sku->code }}"
                                                    hidden>
                                                <input type="text" name="qty[]" value="{{ $order->qty }}" hidden>
                                                <input type="text" name="pono[]" value="{{ $order->po_no }}" hidden>
                                                <input type="text" name="date[]" value="{{ $order->date }}" hidden>
                                                <input type="text" name="total[]"
                                                    value="{{ $order->qty * $order->sku->distributor_price }}" hidden>

                                            </td>
                                            @role('admin')
                                                <td>
                                                    <input
                                                        class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                        type="text"
                                                        value="{{ $order->user->territory->region->region_code }}">

                                                </td>
                                                <td><input
                                                        class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                        type="text" value="{{ $order->user->territory->code }}" disabled>
                                                </td>
                                                <td><input id="price"
                                                        class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                        type="text" value="{{ $order->user->name }}"></td>
                                            @endrole
                                            <td>
                                                <input
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    type="text" value="{{ $order->po_no }}"disabled>
                                            </td>
                                            <td><input value="{{ $order->date }}"
                                                    class="bg-gray-500 cursor-not-allowed text-white font-bold rounded opacity-50 "disabled
                                                    type="text">
                                            </td>
                                            <td><input
                                                    value="{{ Carbon\Carbon::parse($order->created_at)->format('h:i:s') }}"
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    disabled type="text">
                                            </td>
                                            <td><input value="{{ $order->qty * $order->sku->distributor_price }}"
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    disabled type="number">
                                            </td>
                                            <td>
                                                <a href="{{ route('view.show', $order) }}"
                                                    class="ml-2 p-2 bg-yellow-300">View</a>
                                            </td>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <input type="submit" value="Invoice"
                            class="ml-2 text-center text-white font-bold rounded p-4 m-4 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                        <a href="/export"
                            class="ml-2 text-center text-white font-bold rounded p-4 m-4 w-2/12 focus:outline-none bg-green-400 cursor-pointer">Export
                            ALL To Excell</a>

                </form>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
