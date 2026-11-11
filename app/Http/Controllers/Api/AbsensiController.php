<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return response()->json(Absensi::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|exists:mahasiswas,nim',
            'nama' => 'required',
            'kelas' => 'required',
            'semester' => 'required',
            'tanggal' => 'required|date',
            'masuk' => 'required',
            'keterangan' => 'required',
        ]);
        return response()->json(Absensi::create($data), 201);
    }

    public function show($id)
    {
        return response()->json(Absensi::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $a = Absensi::findOrFail($id);
        $a->update($request->all());
        return response()->json($a);
    }

    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();
        return response()->json(['message' => 'Data dihapus']);
    }
}