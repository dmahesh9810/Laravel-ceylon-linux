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
                        @if(session('success'))
                        <div class="mx-6 py-1 px-4 mb-2 mt-2 bg-green-100 border text-green-600 text-sm rounded-md flex items-center justify-between shadow" role="alert">

                            <span class="block sm:inline">{{session('success')}}</span>

                        </div>
                        @endif
                        <h1>Add Territory</h1>
                        <hr><br>
                        <label for="">Zone : </label>&ensp;

                        <select name="search" id="search" class="ml-20 w-80">
                            @foreach ($zone as $zone)
                                <option name="search" value="{{ $zone->id }}" id="search">{{ $zone->code }}
                                </option>
                            @endforeach
                        </select><br><br>
                        <label for="">Region : </label>

                        <select name="region_id" id="2" value="{{ old('region_id') }}"
                            class="ml-20 w-80 searchRegion">
                            @foreach ($region as $region)
                                <option value="{{ $region->id }}" id="1">
                                    {{ $region->region_code }}</option>
                            @endforeach
                        </select>

                        <br><br>
                        <label for="">Territory Code :</label>&nbsp;
                        <input type="text" name="code" id="2" value="{{ $code }}"
                            class="ml-6 w-80" hidden>
                        <input type="text" id="2" value="{{ $code }}" class="ml-6 w-80 bg-gray-100"
                            disabled><br><br>
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

    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').on('change', function() {

                var value = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/livesearch",
                    data: {
                        'search': value
                    },
                    success: function(data) {
                        $('.searchRegion').html(data);
                    }
                });
            });
        });
    </script>
</x-admin-template>
