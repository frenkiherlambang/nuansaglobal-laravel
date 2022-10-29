<div>
    <form action="{{ route('pasien.update', $user->id) }}" class="m-4" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col">
            Nama:<br>
            <input type="text" name="name"
                class=" mt-1 w-64 first-line:rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                placeholder="Nama Pasien" value="{{$user->name}}">
            Email:<br>
            <input type="email" name="email"
                class=" mt-1 w-64 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                placeholder="Email" value="{{$user->email}}">

            Tanggal Lahir:<br>
            <input type="date" name="birthday"
                class=" mt-1 w-64 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                placeholder="Tanggal Lahir" value="{{$user->birthday}}">
            Password:<br>
            <input type="password" name="password"
                class=" mt-1 w-64 rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                value="">


            <button type="submit"
                class=" p-4 rounded-md w-48 my-1 text-white bg-blue-500">Update</button>
        </div>
    </form>
</div>
