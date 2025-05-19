@extends('layouts.app')

@section('konten')
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-semibold mb-4">Data Penerbit</h3>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('penerbit.create') }}">Tambah Penerbit</a>

        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Penerbit</th>
                    <th class="border px-4 py-2">Alamat</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerbits as $index => $penerbit)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $penerbit->nama_penerbit }}</td>
                        <td class="border px-4 py-2">{{ $penerbit->alamat }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('penerbit.edit', $penerbit->id) }}"
                                class="text-blue-500 hover:text-blue-700">Edit</a>

                            <form action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin hapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection