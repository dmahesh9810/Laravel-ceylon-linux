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
                    <form action="{{ route('addregion.store') }}" method="post">
                        @csrf
                        <h1>Add Region</h1>
                        <hr><br>
                        <label for="">Zone : </label>
                        <select name="zone_id" id="1" value="{{ old('zone_id') }}" class="ml-24 w-80">
                            <option name="zone_id" value="1" id="1">1</option>
                            <option name="zone_id" value="2" id="1">2</option>
                            <option name="zone_id" value="3" id="1">3</option>
                            <option name="zone_id" value="4" id="1">4</option>
                        </select>
                        <br><br>

                        <label for="">Region Name :</label>
                        <input type="text" name="region_name" value="{{ old('region_name') }}"
                            class="ml-9 w-80"><br><br>
                        <input type="submit" name="" id="" value="SAVE"
                            class="ml-36 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
