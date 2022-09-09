<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($errors->all() as $error)
                        <div class="ml-3">
                            <p class="mt-1 text-sm text-red-900">{{ $error }}</p>
                        </div>
                    @endforeach
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf

                        <label for="">Remark </label>
                        <input type="text" value="" class="w-72" name="remark" id="remark">

                        <br>
                        <br>

                        <div class="overflow-x-auto relative">
                            <table class="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            SKU CODE
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            SKU NAME
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            UNIT PRICE
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            ENTER QTY
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            TOTAL PRICE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skus as $sku)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td>
                                                <input
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    type="text" value="{{ $sku->code }}">
                                                <input
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    type="text" name="skuid[]" value="{{ $sku->id }}" hidden>
                                            </td>
                                            <td><input
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    type="text" value="{{ $sku->name }}" disabled></td>
                                            <td><input id="price[]"
                                                    class="bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    type="text" value="{{ $sku->distributor_price }}"></td>

                                            <td><input name="qty[]" value="0"
                                                    class="bg-white-500 font-bold rounded opacity-50 " type="number">
                                            </td>
                                            <td><span for=""
                                                    class=" font-bold rounded opacity-50 cursor-not-allowed w-96">R.s
                                                    <span id="total[]"></span></span></td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <input type="submit" value="ADD PO"
                            class="text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">

                        <a href="{{ route('order.index') }}"
                            class="p-6 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-yellow-400 cursor-pointer">View</a>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
