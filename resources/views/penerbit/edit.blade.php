@extends('layouts.app')

@section('konten')
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-semibold mb-4">Edit Data Penerbit</h3>

        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST" class="mb-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_penerbit" class="block text-sm font-medium text-gray-700">Nama Penerbit</label>
                <input type="text" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $penerbit->alamat) }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <button type="submit">Update Penerbit</button>
        </form>
    </div>
@endsection