<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:posts',
            'category' => 'required|max:255',
            'description' => 'required',
            'file' => 'image'
        ]);

        $post = Post::create($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se creó con éxito');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => "required|max:255|unique:posts,title,$post->id",
            'category' => 'required|max:255',
            'description' => 'required',
            'file' => 'image'
        ]);

        $post->update($request->all());

        Cache::flush();

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Cache::flush();

        return redirect()->route('admin.posts.index')->with('info', 'El post se eliminó con éxito');
    }
}
