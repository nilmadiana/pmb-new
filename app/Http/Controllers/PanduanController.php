<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panduan;

class PanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $panduans = Panduan::orderBy('created_at', 'desc')->paginate(5);

        return view('Admin.panduan.panduan', compact('panduans'));
    }

    public function create()
    {
        return view('Admin.panduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();

            $request->file->move(public_path('assets/panduan'), $fileName);
            $validated['file'] = $fileName;
        }

        Panduan::create($validated);

        return redirect()->route('Admin.panduan.panduan')->with('success', 'panduan added successfully');
    }

    public function show($id)
    {
        $panduan = Panduan::find($id);
        return view('Admin.panduan.preview', compact('panduan'));
    }

    public function edit($id)
    {
        $panduan = Panduan::findOrFail($id);

        return view('Admin.panduan.update', compact('panduan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $panduan = Panduan::findOrFail($id);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/panduan'), $fileName);
            $validated['file'] = $fileName; // Update file path
        }

        $panduan->update($validated);

        return redirect()->route('Admin.panduan.panduan')->with('success', 'panduan updated successfully');
    }

    public function destroy($id)
    {
        $panduan = Panduan::findOrFail($id);

        if ($panduan->file) {
            $filePath = public_path('assets/panduan/' . $panduan->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $panduan->delete();

        return redirect()->route('Admin.panduan.panduan')->with('success', 'panduan deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query4');

        $panduans = Panduan::where('judul', 'like', "%{$query}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(4);
    
        return view('Admin.panduan.panduan', compact('panduans'));
    }
}
