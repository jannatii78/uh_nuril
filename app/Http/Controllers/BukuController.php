<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    // Tampilkan list buku
    public function index()
    {
        $bukus = Buku::with('penerbit')->get();
        return view('buku.index', compact('bukus'));
    }

    // Form tambah buku
    public function create()
    {
        $penerbits = Penerbit::all();
        return view('buku.create', compact('penerbits'));
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|exists:penerbits,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan!');
    }

    // Form edit buku
    public function edit(Buku $buku)
    {
        $penerbits = Penerbit::all();
        return view('buku.edit', compact('buku', 'penerbits'));
    }

    // Update buku
    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|exists:penerbits,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada upload cover baru
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
                Storage::disk('public')->delete($buku->cover);
            }

            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diupdate!');
    }

    // Hapus buku
    public function destroy(Buku $buku)
    {
        if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
            Storage::disk('public')->delete($buku->cover);
        }

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
