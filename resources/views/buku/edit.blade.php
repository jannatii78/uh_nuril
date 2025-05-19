@extends('layouts.app')

@section('konten')
    <div class="max-w-4xl mx-auto py-10">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-6">Edit Buku</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="judul" class="block font-medium text-sm text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200"
                        value="{{ old('judul', $buku->judul) }}" required>
                </div>

                <div class="mb-4">
                    <label for="tahun" class="block font-medium text-sm text-gray-700">Tahun Terbit</label>
                    <input type="number" name="tahun" id="tahun"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200"
                        value="{{ old('tahun', $buku->tahun) }}" required>
                </div>

                <div class="mb-4">
                    <label for="penulis" class="block font-medium text-sm text-gray-700">Penulis</label>
                    <input type="text" name="penulis" id="penulis"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200"
                        value="{{ old('penulis', $buku->penulis) }}" required>
                </div>

                <div class="mb-4">
                    <label for="penerbit_id" class="block font-medium text-sm text-gray-700">Penerbit</label>
                    <select name="penerbit_id" id="penerbit_id"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200" required>
                        <option value="">-- Pilih Penerbit --</option>
                        @foreach ($penerbits as $item)
                            <option value="{{ $item->id }}" {{ old('penerbit_id', $buku->penerbit) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_penerbit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="cover" class="block font-medium text-sm text-gray-700">Cover Buku</label>
                    <input type="file" name="cover" id="cover"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded-full file:border-0 file:text-sm file:font-semibold
                               file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @if ($buku->cover)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $buku->cover) }}" width="120" class="rounded shadow">
                            <small class="block text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        </div>
                    @endif
                </div>

                <div class="mt-6">
                    <button type="submit">Update</button>
                </div>
            </form>

        </div>
    </div>
@endsection
