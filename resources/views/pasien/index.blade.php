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
                    {{-- Form Search --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <div class="flex justify-between">
                        <form action="{{ route('pasien.index') }}" method="GET">
                            <div class="flex">
                                <input type="text" name="search"
                                    class=" form-input rounded-md shadow-sm mt-1 block w-48" placeholder="Cari Pasien"
                                    value="{{ request('search') }}">
                                <button type="submit"
                                    class=" p-4 rounded-md ml-4 my-1 text-white bg-blue-500">Cari</button>
                            </div>
                        </form>
                        {{-- button create user --}}
                        <a href="{{ route('pasien.create') }}" class="p-4 rounded-md my-1 text-white bg-blue-500">Tambah
                            Pasien</a>
                    </div>
                    {{-- table --}}
                    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                    Nama
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                    Tangga Lahir
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                    Tanggal Terdaftar
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach($pasiens as $pasien)
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    {{$pasien->name}}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                    {{Carbon\Carbon::parse($pasien->birthday)->format('d-m-Y')}}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                    {{$pasien->created_at->diffForHumans()}}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                   {{-- delete user --}}
                                      <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Hapus</button>
                                      </form>
                                      <button onclick='Livewire.emit("openModal", "edit-user", {{ json_encode(["user" => $pasien->id]) }})'>Edit User</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pasiens->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
