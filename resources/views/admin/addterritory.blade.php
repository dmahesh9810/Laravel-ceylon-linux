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
                    <form action="{{ route('addterritory.store') }}" method="post">
                        @csrf
                        <h1>Add Territory</h1>
                        <hr><br>
                        <label for="">Region : </label>
                        <select name="region_id" id="2" value="{{ old('region_id') }}" class="ml-20 w-80">
                            <option value="1" id="2">1</option>
                            <option value="2" id="2">2</option>
                            <option value="3" id="2">3</option>
                            <option value="4" id="2">4</option>
                        </select>
                        <br><br>
                        <label for="">Territory Name :</label>
                        <input type="text" name="name" id="2" value="{{ old('territoryname') }}"
                            class="ml-6 w-80"><br><br>
                        <input type="submit" name="" id="" value="SAVE"
                            class="ml-36 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
