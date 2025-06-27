<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar semua mahasiswa.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return MahasiswaResource::collection($mahasiswas);
    }

    /**
     * Simpan data mahasiswa baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'jk' => 'required|string|in:L,P',
            'tgl_lahir' => 'required|date',
            'jurusan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());

        return (new MahasiswaResource($mahasiswa))->additional([
            'success' => true,
            'message' => 'Mahasiswa berhasil ditambahkan.',
        ]);
    }

    /**
     * Tampilkan detail mahasiswa berdasarkan NIM.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswa);
    }

    /**
     * Perbarui data mahasiswa berdasarkan NIM.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswas,nim,' . $id . ',nim',
            'nama' => 'required|string|max:255',
            'jk' => 'required|string|in:L,P',
            'tgl_lahir' => 'required|date',
            'jurusan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return (new MahasiswaResource($mahasiswa))->additional([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diperbarui.',
        ]);
    }

    /**
     * Hapus data mahasiswa berdasarkan NIM.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa berhasil dihapus.',
        ]);
    }
}
