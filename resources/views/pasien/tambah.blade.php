<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pasien') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($errors->all() as $error)
                    <div class="text-sm text-red-600 space-y-1">{{ $error }}</div>
                    @endforeach
                    {{-- form create user --}}
                    <form action="{{ route('pasien.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            Nama:<br>
                            <input type="text" name="name"
                                class=" mt-1 w-64 first-line:rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                placeholder="Nama Pasien" value="{{ old('name') }}">
                            Email:<br>
                            <input type="email" name="email"
                                class=" mt-1 w-64 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                placeholder="Email" value="{{ old('email') }}">

                            Tanggal Lahir:<br>
                            <input type="date" name="birthday"
                                class=" mt-1 w-64 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                placeholder="Tanggal Lahir" value="{{ old('birthday') }}">
                            Password:<br>
                            <input type="password" name="password"
                                class=" mt-1 w-64 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                value="{{ old('password') }}">


                            <button type="submit"
                                class=" p-4 rounded-md w-48 my-1 text-white bg-blue-500">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
