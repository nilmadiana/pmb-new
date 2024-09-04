<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Enums\Status;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.berita.berita', compact('beritas'));
    }

    public function create()
    {
        $user = Auth::user();
        $isAdmin = $user->role == 'admin';
        $statuses =  $isAdmin ? Status::getValues() : ['Draft', 'Submit'];
        $defaultStatus = $isAdmin ? null : 'Draft';
        $editorName = $isAdmin ? 'Admin' : null;
        return view('Admin.berita.create', compact('statuses', 'user', 'isAdmin', 'defaultStatus', 'editorName'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $isAdmin = $user->role == 'admin'; 
    
        $rules = [
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'keterangan_gambar' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'status' => 'required|in:' . implode(',', Status::getValues()), 
            'tag' => $isAdmin ? 'required|string|max:255' : 'nullable|string|max:255',
            'comments' => $isAdmin ? 'required|string|max:255' : 'nullable|string|max:255',
        ];
    
        $validated = $request->validate($rules);
    
        if ($request->hasFile('gambar')) {
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('/assets/gambar'), $gambarName);
            $validated['gambar'] = 'assets/gambar/' . $gambarName;
        }
    
        $validated['username'] = $user->name; 
        $validated['editor'] = $isAdmin ? 'Admin' : 'N/A'; 
    
        $validated['user_id'] = $user->id;
    
        Berita::create($validated);
    
        return redirect()->route('Admin.berita.berita')->with('success', 'News added successfully');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('Admin.berita.detail', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $statuses = Auth::user()->role == 'admin'
            ? ['Draft', 'Submit', 'Accept', 'Reject']
            : ['Draft', 'Submit'];

        return view('Admin.berita.update', compact('berita', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $isAdmin = $user->role == 'admin'; 
        
        $rules = [
            'judul' => 'required|string|max:255',
            'isi_berita' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'keterangan_gambar' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'status' => 'required|in:' . implode(',', Status::getValues()), 
            'tag' => $isAdmin ? 'required|string|max:255' : 'nullable|string|max:255',
            'comments' => $isAdmin ? 'required|string|max:255' : 'nullable|string|max:255',
        ];
    
        $validated = $request->validate($rules);
    
        if ($request->hasFile('gambar')) {
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('/assets/gambar'), $gambarName);
            $validated['gambar'] = 'assets/gambar/' . $gambarName;
        }
    
        $berita = Berita::findOrFail($id);
    
        $validated['username'] = $berita->username;
        $validated['editor'] = $isAdmin ? $user->name : $berita->editor; 
    
        $berita->update($validated);
    
        return redirect()->route('Admin.berita.berita')->with('success', 'News updated successfully');
    }
    
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $berita = Berita::findOrFail($id);
    
        if (Auth::user()->role == 'admin' || (Auth::user()->role == 'penulis' && $berita->status == 'Draft')) {
            if ($berita->gambar) {
                $gambarPath = public_path('assets/gambar/' . $berita->gambar);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
    
            $berita->delete();
    
            return redirect()->route('Admin.berita.berita')->with('success', 'News deleted successfully.');
        } else {
            return redirect()->route('index')->with('error', 'Unauthorized access');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $beritas = Berita::where('judul', 'like', "%{$query}%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(4);
    
        return view('Admin.berita.berita', compact('beritas'));
    }
}
