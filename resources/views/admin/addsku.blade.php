<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>
<x-admin-template>

    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-12">
                    @foreach ($errors->all() as $error)
                    <div class="ml-3">
                        <p class="mt-1 text-sm text-red-900">{{ $error }}</p>
                    </div>
                    @endforeach
                    <form action="{{ route('addsku.store') }}" method="post">
                        @csrf
                        <h1>Add Users</h1>
                        <hr><br>

                        <label for="" class="required">SKU Name :</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" name="name" value="{{ old('name') }}" class="ml-16 w-80"><br><br>
                        <label for="" class="required">MRP :</label>&nbsp;&nbsp;
                        <input type="text" name="mrp" value="{{ old('mrp') }}" class="ml-28 w-80"><br><br>
                        <label for="" class="required">Distributor Price :</label>
                        <input type="number" name="distributor_price" value="{{ old('distributor_price') }}"
                            class="ml-10 w-80"><br><br>
                        <label for="" class="required">Weight/Volume :</label>
                        <input type="number" name="weight" value="{{ old('weight') }}" class="ml-11 w-80">
                        <select name="weight_id" value="{{ old('weight_id') }}" id="1">
                            <option value="g" id="1">g</option>
                            <option value="ml" id="1">ml</option>
                            <option value="kg" id="1">kg</option>
                            <option value="l" id="1">l</option>
                        </select><br><br>
                        <input type="submit" name="" id="" value="SAVE"
                            class="ml-44 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
