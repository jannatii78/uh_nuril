@extends('layouts.app')

@section('konten')
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-semibold mb-4">Data Buku</h3>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('buku.create') }}">Tambah Data Buku</a>

        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Tahun</th>
                    <th class="border px-4 py-2">Penulis</th>
                    <th class="border px-4 py-2">Penerbit</th>
                    <th class="border px-4 py-2">Cover</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $index => $buku)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $buku->judul }}</td>
                        <td class="border px-4 py-2">{{ $buku->tahun }}</td>
                        <td class="border px-4 py-2">{{ $buku->penulis }}</td>
                        <td class="border px-4 py-2">{{ $buku->penerbit->nama_penerbit ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            @if($buku->cover)
                                <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover {{ $buku->judul }}"
                                    class="w-16 h-auto">
                            @else
                                Tidak ada cover
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('buku.edit', $buku->id) }}"
                                class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>

                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline"
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