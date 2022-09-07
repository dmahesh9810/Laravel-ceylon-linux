<x-app-layout>

    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-center">
                        <a href="{{ route('dashboard') }}" class="mr-20">Dashboard</a>
                        <a href="{{ route('addzone.index') }}" class="mr-20">ADD ZONE</a>
                        <a href="{{ route('addregion.index') }}" class="mr-20">ADD REGION</a>
                        <a href="{{ route('addterritory.index') }}" class="mr-20">ADD TERRITORY</a>
                        <a href="{{ route('addusers.index') }}" class="mr-20">ADD USERS</a>
                        <a href="{{ route('addsku.index') }}" class="mr-20">ADD SKU</a>
                    </div>
                </div>
            </div>
        </div>
        <main>
            {{ $slot }}
        </main>
    </div>
</x-app-layout>
