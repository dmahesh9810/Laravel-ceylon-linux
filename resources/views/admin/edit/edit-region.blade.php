<x-admin-template>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    edit
                </div><br>
                @foreach ($errors->all() as $error)
                        <div class="ml-3">
                            <p class="mt-1 text-sm text-red-900">{{ $error }}</p>
                        </div>
                    @endforeach
                <form action="{{ route('regionupdate.update', $region) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-6 bg-white border-b border-gray-200 ">

                       <label for="">Zone</label> <input id="zone_id " name="zone_id" type="number" value="{{ $region->zone_id }}" class="ml-12"><br><br>
                       <label for="">Short discription</label><input id="region_name" type="text" name="region_name" value="{{ $region->region_name }}" class="ml-3"><br><br>
                        <input type="submit" value="UPDATE" class="ml-32 p-10 text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-admin-template>