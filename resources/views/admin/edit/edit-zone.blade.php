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
                <form action="{{ route('zoneupdate.update', $zone) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-6 bg-white border-b border-gray-200 ">

                       <label for="">Zone Code</label> <input  type="text" value="{{ $zone->code }}" class="ml-12 bg-gray-100" disabled><br><br>
                       <label for="">Discription</label> <input id="discription" name="discription" type="text" value="{{ $zone->discription }}" class="ml-12"><br><br>
                       <label for="">Short discription</label><input id="short_discription" type="text" name="short_discription" value="{{ $zone->short_discription }}" class="ml-3"><br><br>
                        <input type="submit" value="UPDATE" class="ml-32 p-10 text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-admin-template>
