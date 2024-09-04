<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Berita;

class AuthorizeAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $beritaId = $request->route('id');
        $berita = Berita::findOrFail($beritaId);

        if (Auth::user()->id !== $berita->user_id && Auth::user()->role !== 'admin' ) {
            return redirect()->route('index')->with('error', 'Unauthorized access');
        }
        
        return $next($request);
    }
}
