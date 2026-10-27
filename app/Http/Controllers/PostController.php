<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $status = $request->query('status');
    //     $posts = Post::query()
    //         ->when($status, function (Builder $query) use ($status) {
    //             $query->where('status', $status);
    //         })
    //         ->get();
    //     return view('posts.index', [
    //         'title' => 'Post',
    //         'posts' => $posts,
    //         'status' => $status,
    //     ]);
    // }
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');
        $perPage = (int) $request->query('per_page', 10);
        if (!in_array($perPage, [5, 10, 25])) {
            $perPage = 10;
        }

        $posts = Post::query()
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->orderByDesc('created_at')
            ->orderByDesc('id')  // pembeda urutan, karena data seeder dibuat di detik yang sama
            ->paginate($perPage)
            ->withQueryString();  // filter, pencarian, dan per_page ikut terbawa saat pindah halaman

        return view('posts.index', [
            'title' => 'Post',
            'posts' => $posts,
            'status' => $status,
            'search' => $search,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'description' => ['required', 'string', 'min:10'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->description = $validated['description'] ?? null;
        $post->status = $validated['status'];
        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post' => $post,
        ];

        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'description' => ['required', 'string', 'min:10'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $post = Post::findOrFail($id);

        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'] ?? null;
        $post->status = $validatedData['status'];
        $post->save();

        return redirect()
            ->route('posts.index', $post)
            ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }

    public function trash()
    {
        return view('posts.trash', [
            'title' => 'Trash',
            'posts' => Post::onlyTrashed()->get()
        ]);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()
            ->route('posts.trash')
            ->with('success', 'Post berhasil dikembalikan.');
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect()
            ->route('posts.trash')
            ->with('success', 'Post berhasil dihapus permanen.');
    }

    public function published()
    {
        $posts = Post::published()->get();
        return view('posts.published', compact('posts'));
    }
}
