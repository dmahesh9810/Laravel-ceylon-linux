<x-admin-template>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <h3>All Region</h3><br>
                    <hr>
                    <tbody class="text-sm divide-y">
                        @forelse ($territors as $Territory)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="font-medium"><br>
                                        <span>Zone : </span><span>{{ $Territory->region->zone->code }}</span><br><br>
                                        <span>region name : </span><span>{{ $Territory->region->region_name }}</span><br><br>
                                        <span>Territor name : </span><span>{{ $Territory->name }}</span><br><br>

                                        <a href="{{ route('Territory.edit', $Territory) }}"
                                            class="p-10 text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">Edit</a>


                                        <form class="inline-block" action="{{ route('territorydelete.delete', $Territory) }}"
                                            method="POST">
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
                            <div class="bg-red-100 border  text-red-700 p-3 rounded relative my-6 w-full shadow">
                                <span class="block sm:inline">Region have not yet been created</span>
                            </div>
                        @endforelse
                    </tbody>
                    <div class="mt-6">
                        {{ $territors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
