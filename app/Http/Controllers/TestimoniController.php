<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'isi' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'foto' => 'required|image'
        ]);

        // ambil ID terakhir
        $last = Testimoni::latest()->first();
        $nextId = $last ? $last->id + 1 : 1;

        // format ftesti001
        $number = str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $ext = $request->file('foto')->getClientOriginalExtension();
        $filename = 'ftesti' . $number . '.' . $ext;

        // simpan file
        $request->file('foto')->move(public_path('images'), $filename);

        // simpan DB
        Testimoni::create([
            'nama' => $request->nama,
            'isi' => $request->isi,
            'rating' => $request->rating, // 🔥 FIX
            'foto' => $filename,
        ]);

        return redirect('/admin/testimoni');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'isi' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = [
            'nama' => $request->nama,
            'isi' => $request->isi,
            'rating' => $request->rating, // 🔥 FIX
        ];

        if ($request->hasFile('foto')) {

            // hapus file lama
            if ($testimoni->foto && file_exists(public_path('images/'.$testimoni->foto))) {
                unlink(public_path('images/'.$testimoni->foto));
            }

            $ext = $request->file('foto')->getClientOriginalExtension();
            $filename = 'ftesti' . str_pad($testimoni->id, 3, '0', STR_PAD_LEFT) . '.' . $ext;

            $request->file('foto')->move(public_path('images'), $filename);

            $data['foto'] = $filename;
        }

        $testimoni->update($data);

        return redirect('/admin/testimoni');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // hapus file juga
        if ($testimoni->foto && file_exists(public_path('images/'.$testimoni->foto))) {
            unlink(public_path('images/'.$testimoni->foto));
        }

        $testimoni->delete();

        return redirect('/admin/testimoni');
    }
}