<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PostInterface;
use App\Http\Traits\PostTrait;
use App\Models\Post;

class PostRepository implements PostInterface
{

    use PostTrait;
    private $postModel;
    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    public function index()
    {
        $posts = $this->getPosts();
        return view('pages.post.index', compact('posts'));
    }

    public function create()
    {
        return view('pages.post.create');
    }

    public function store($request, $service)
    {
        $imageName = $service->uploadImage($request->image);
        $this->postModel::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->body,
            'image' => $imageName,
            'date' => $request->date
        ]);
        return redirect(route('admin.post.index'));
    }

    public function delete($request)
    {
        $this->findPostById($request->id)->delete();
        return back();
    }

    public function forceDelete($request, $service)
    {
        $post = $this->postModel::withTrashed()->where('id', $request->id)->first();
        $service->deleteImageInLocal($post->image);
        $post->forceDelete();
        return back();
    }

    public function edit($request)
    {
        $post = $this->findPostById($request->id);
        return view('pages.post.edit', compact('post'));
    }

    public function update($request, $service)
    {
        $post = $this->findPostById($request->id);
        $imageName = $service->checkImage($request->image, $post);
        $post->update([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->body,
            'image' => $imageName,
            'date' => $request->date
        ]);
        return redirect(route('admin.post.index'));
    }
}
