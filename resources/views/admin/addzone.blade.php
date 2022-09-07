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

                        <hr><br>
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
