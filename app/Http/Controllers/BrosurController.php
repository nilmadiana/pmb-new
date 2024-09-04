<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use Illuminate\Http\Request;

class BrosurController extends Controller
{
    //
    public function index()
    {
        $brosurs = Brosur::orderBy('created_at', 'desc')->paginate(5);

        return view('Admin.brosur.brosur', compact('brosurs'));
    }

    public function create()
    {
        return view('Admin.brosur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarName = time() . '.' . $request->gambar->extension();
            
            $request->gambar->move(public_path('/assets/brosur'), $gambarName);
            $validated['gambar'] = 'assets/brosur/' . $gambarName;
        }

        Brosur::create($validated);

        return redirect()->route('Admin.brosur.brosur')->with('success', 'Brosur added successfully');
    }

    public function show(Brosur $brosurs)
    {
        return view('Admin.brosur.detail', compact('brosur'));
    }

    public function edit($id)
    {
        $brosur = Brosur::findOrFail($id);
        
        return view('Admin.brosur.update', compact('brosur'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $brosur = Brosur::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('assets/brosur'), $gambarName);
            $validated['gambar'] = 'assets/brosur/' . $gambarName;
        }

        $brosur->update($validated);

        return redirect()->route('Admin.brosur.brosur')->with('success', 'Brosur updated successfully.');
    }

    public function destroy($id)
    {
        $brosur = Brosur::findOrFail($id);

        if ($brosur->gambar) {
            $gambarPath = public_path('assets/brosur/' .  $brosur->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        $brosur->delete();

        return redirect()->route('Admin.brosur.brosur')->with('success', 'Brosur deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query2');

        $brosurs = Brosur::where('judul', 'like', "%{$query}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(4);
    
        return view('Admin.brosur.brosur', compact('brosurs'));
    }
}
