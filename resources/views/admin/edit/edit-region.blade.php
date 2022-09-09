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

                        <label for="">Region code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="region_name" type="text" name="region_name" value="{{ $region->region_code }}" class="ml-3 bg-gray-100" disabled><br><br>
                       <label for="">Zone</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <select id="zone_id" name="zone_id">

                           <option selected value="{{$region->zone->id}}" id="zone_id">{{$region->zone->code}}</option>
                        @foreach ($zone as $zone)
                        @if (!($zone->id == $region->zone->id))

                        <option value="{{$zone->id}}" id="zone_id">{{$zone->code}}</option>
                        @endif
                        @endforeach
                       </select><br><br>
                       <label for="">Short discription</label><input id="region_name" type="text" name="region_name" value="{{ $region->region_name }}" class="ml-3"><br><br>
                        <input type="submit" value="UPDATE" class="ml-32 p-10 text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-admin-template>
