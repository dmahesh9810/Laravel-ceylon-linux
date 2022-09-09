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
                    <form action="{{ route('addzone.store') }}" method="POST">
                        @csrf
                        @if(session('success'))
                        <div class="mx-6 py-1 px-4 mb-2 mt-2 bg-green-100 border text-green-600 text-sm rounded-md flex items-center justify-between shadow" role="alert">

                            <span class="block sm:inline">{{session('success')}}</span>

                        </div>
                        @endif

                        <input type="text" class="ml-12 w-80 bg-gray-100" value="{{ $code }}"
                            name="code" hidden><br><br>
                        <hr><br><label for="">Zone-code</label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <input type="text" class="ml-12 w-80 bg-gray-100" value="{{ $code }}"
                            disabled><br><br>
                        <label for="">Zone Long Description :</label>
                        <textarea name="discription" cols="33" rows="5" class="ml-3" value="{{ old('discription') }}"></textarea>
                        <br><br>
                        <label for="">Short Description :</label>
                        <input type="text" class="ml-12 w-80" value="{{ old('short_discription') }}"
                            name="short_discription"><br><br>&ensp;
                        <input type="submit" name="" id="" value="SAVE"
                            class="ml-44 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
