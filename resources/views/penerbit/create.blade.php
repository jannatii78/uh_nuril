@extends('layouts.app')

@section('konten')
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-semibold mb-4">Tambah Data Penerbit</h3>

        <!-- Form untuk Menambah Penerbit -->
        <form action="{{ route('penerbit.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="mb-4">
                <label for="nama_penerbit" class="block text-sm font-medium text-gray-700">Nama Penerbit</label>
                <input type="text" id="nama_penerbit" name="nama_penerbit"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    required>
            </div>
            <button type="submit">Tambah Penerbit</button>
        </form>
    </div>
@endsection