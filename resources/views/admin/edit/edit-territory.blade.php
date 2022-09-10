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
                <form action="{{ route('territoryupdate.update', $territory) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-6 bg-white border-b border-gray-200 ">


                        <label for="">Zone
                            code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select id="search" name="search">
                            <option value="{{ $territory->region->zone_id }}">{{ $territory->region->zone->code }}
                            </option>
                            @foreach ($zone as $zone)
                                @if (!($zone->id == $territory->region->zone->id))
                                    <option id="search" name="search" value="{{ $zone->id }}">
                                        {{ $zone->code }}</option>
                                @endif
                            @endforeach
                        </select><br><br>
                        <label for="">Region code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select id="region_id" name="region_id" class="searchRegion">
                            <option id="region_id" name="region_id" selected value="{{ $territory->region->id }}">
                                {{ $territory->region->region_code }}</option>
                            @foreach ($region as $region)
                                @if (!($region->id == $territory->region_id))
                                    <option id="region_id" name="region_id" value="{{ $region->id }}">
                                        {{ $region->region_code }}</option>
                                @endif
                            @endforeach
                        </select> <br><br>
                        <label for="">Territory code</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="name"
                            type="text" name="name" value="{{ $territory->code }}" class="ml-3 bg-gray-100"
                            disabled><br><br>
                        <label for="">Territory Name</label>&nbsp;&nbsp;&nbsp;<input id="name"
                            type="text" name="name" value="{{ $territory->name }}" class="ml-3"><br><br>
                        <input type="submit" value="UPDATE"
                            class="ml-32 p-10 text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </div>
                </form>

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
                        console.log(data);
                        $('.searchRegion').html(data);
                    }
                });
            });
        });
    </script>
</x-admin-template>
