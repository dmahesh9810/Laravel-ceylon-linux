<x-admin-template>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <h3>All Zone</h3><br>
                    @if(session('success'))
                        <div class="mx-6 py-1 px-4 mb-2 mt-2 bg-green-100 border text-green-600 text-sm rounded-md flex items-center justify-between shadow" role="alert">

                            <span class="block sm:inline">{{session('success')}}</span>

                        </div>
                        @endif
                    <hr>
                    <tbody class="text-sm divide-y">
                        @forelse ($zones as $zone)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="font-medium"><br>
                                        <span>Code : </span><span>{{ $zone->code }}</span><br><br>
                                        <span>Discription : </span><span>{{ $zone->discription }}</span><br><br>
                                        <span>Short discription :
                                        </span><span>{{ $zone->short_discription }}</span><br><br>
                                        <a href="{{ route('zone.edit', $zone) }}"
                                            class="p-10 text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">Edit</a>


                                        <form class="inline-block" action="{{ route('zonedelete.delete', $zone) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit"
                                                class="p-10 text-white font-medium text-white font-bold rounded py-2  bg-red-400 cursor-pointer">Delete</button>
                                        </form><br><br>
                                        <hr>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <div class="bg-red-100 border  text-red-700 p-3 rounded relative my-6 w-full shadow"
                               >
                                <span class="block sm:inline">Zones have not yet been created</span>
                            </div>
                        @endforelse
                    </tbody>
                    <div class="mt-6">
                        {{ $zones->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
