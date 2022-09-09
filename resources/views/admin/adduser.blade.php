<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>
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
                    <form action="{{ route('addusers.store') }}" method="post">
                        @csrf
                        <h1>Add Users</h1>
                        <hr><br>
                        <label for="" class="required">Name :</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="ml-20 w-80"><br><br>
                        <label for="" class="required">NIC :</label>
                        <input type="number" name="nic" value="{{ old('nic') }}" class="ml-24 w-80"><br><br>
                        <label for="" class="required">Address :</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="ml-16 w-80"><br><br>
                        <label for="" class="required">Mobile :&nbsp;&nbsp;&nbsp;</label>
                        <input type="number" name="mobile" value="{{ old('mobile') }}" class="ml-16 w-80"><br><br>
                        <label for="">E-mail :&nbsp;&nbsp;</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="ml-20 w-80"><br><br>
                        <label for="">Gender : </label>
                        <select name="gender" value="{{ old('gender') }}" id="gender" class="ml-20 w-80">
                            <option value="male" id="gender">Male</option>
                            <option value="female" id="gender">Female</option>
                        </select>
                        <br><br>
                        <label for="" class="required">Territory : &nbsp;&nbsp;</label>
                        <select name="territorie_id" value="{{ old('territorie_id') }}" id="territorie_id"
                            class="ml-12 w-80">
                            @foreach ($territory as $territory)
                            <option name="territorie_id" value="{{ $territory->id }}" id="territorie_id">{{ $territory->code }}
                            </option>
                        @endforeach
                        </select>
                        <br><br>
                        <label for="" class="required">User Name :</label>
                        <input type="text" name="user_name" value="{{ old('user_name') }}"
                            class="ml-10 w-80"><br><br>
                        <label for="" class="required">Password :</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="ml-12 w-80"><br><br>
                        <input type="submit" name="" id="" value="SAVE"
                            class="ml-36 text-center text-white font-bold rounded py-2 w-2/12 focus:outline-none bg-green-400 cursor-pointer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-template>
