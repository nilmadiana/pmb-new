<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    public function index()
    {
        $materis = Materi::orderBy('created_at', 'desc')->paginate(5);

        return view('Admin.materi.materi', compact('materis'));
    }

    public function create()
    {
        return view('Admin.materi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();

            $request->file->move(public_path('assets/materi'), $fileName);
            $validated['file'] = $fileName;
        }

        Materi::create($validated);

        return redirect()->route('Admin.materi.materi')->with('success', 'Materi added successfully');
    }

    public function show($id)
    {
        $materi = Materi::find($id);
        return view('Admin.materi.preview', compact('materi'));
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);

        return view('Admin.materi.update', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $materi = Materi::findOrFail($id);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/materi'), $fileName);
            $validated['file'] = $fileName;
        }

        $materi->update($validated);

        return redirect()->route('Admin.materi.materi')->with('success', 'Materi updated successfully');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        if ($materi->file) {
            $filePath = public_path('assets/materi/' . $materi->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $materi->delete();

        return redirect()->route('Admin.materi.materi')->with('success', 'Materi deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query3');

        $materis = Materi::where('judul', 'like', "%{$query}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(4);
    
        return view('Admin.materi.materi', compact('materis'));
    }
}
