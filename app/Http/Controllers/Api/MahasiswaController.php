<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        return response()->json(Mahasiswa::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);
        return response()->json(Mahasiswa::create($data), 201);
    }

    public function show($id)
    {
        return response()->json(Mahasiswa::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $m = Mahasiswa::findOrFail($id);
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $m->update($data);
        return response()->json($m);
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return response()->json(['message' => 'Data dihapus']);
    }
}