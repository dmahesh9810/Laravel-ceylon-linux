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
                        <input type="text" value="" class="w-72" name="remark"
                            id="remark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="" id="totaldisplay">Total : Rs.</label>
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
                                            <td><input id="price" step="any" name="price[]"
                                                    class="price bg-gray-500 text-white font-bold rounded opacity-50 cursor-not-allowed"
                                                    type="number" value="{{ $sku->distributor_price }}"></td>

                                            <td><input name="qty[]" step="any" id="price" value="0"
                                                    class="qty bg-white-500 font-bold rounded opacity-50 "
                                                    type="number">
                                            </td>
                                            <td><span for=""
                                                    class="resultbody font-bold rounded opacity-50 cursor-not-allowed w-96">R.s
                                                    <span id="total[]" name="total[]" step="any" id="total"
                                                        class="total"></span></span></td>


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
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).on('input', 'input[name="price[]"], input[name="total[]"], input[name="qty[]"]', function(e) {
            var price = $('input[name="price[]"]').map(function(idx, ele) {
                return $(ele).val().trim().length == 0 ? 0 : parseFloat($(ele).val().trim());
            }).get();
            var discount = $('input[name="total[]"]').map(function(idx, ele) {
                return $(ele).val().trim().length == 0 ? 0 : parseFloat($(ele).val().trim());
            }).get();
            var quantity = $('input[name="qty[]"]').map(function(idx, ele) {
                return $(ele).val().trim().length == 0 ? 0 : parseFloat($(ele).val().trim());
            }).get();
            var total = price.reduce(function(a, v, i) {
                return quantity[i];
            }, 0);
            var totalqty = 0;
            var totalprice = 0;
            for (i = 0; i < quantity.length; i++) {
                if (!(quantity[i] == 0)) {
                    totalqty = totalqty + quantity[i];

                    totalprice = totalprice + price[i] * quantity[i];

                }
            }
            document.getElementById("totaldisplay").innerHTML = "Total : Rs." + totalprice;
            // console.log(totalqty);
            console.log(totalprice);
        })
    </script>

</x-app-layout>
