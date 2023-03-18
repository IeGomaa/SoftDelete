<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CommentInterface;
use App\Http\Traits\CommentTrait;
use App\Http\Traits\PostTrait;
use App\Http\Traits\UserTrait;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentRepository implements CommentInterface
{
    use CommentTrait, UserTrait, PostTrait;
    private $commentModel;
    private $userModel;
    private $postModel;
    public function __construct(Comment $comment, User $user, Post $post)
    {
        $this->commentModel = $comment;
        $this->userModel = $user;
        $this->postModel = $post;
    }

    public function index()
    {
        $comments = $this->getComments();
        return view('pages.comment.index', compact('comments'));
    }

    public function create()
    {
        $users = $this->getUsers();
        $posts = Post::get();
        return view('pages.comment.create', compact('users', 'posts'));
    }

    public function store($request)
    {
        $this->commentModel::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'date' => $request->date
        ]);
        return redirect(route('admin.comment.index'));
    }

    public function delete($request)
    {
        $this->findCommentById($request->id)->delete();
        return back();
    }

    public function forceDelete($request)
    {
        $this->commentModel::withTrashed()->find($request->id)->forceDelete();
        return back();
    }

    public function edit($request)
    {
        $comment = $this->findCommentById($request->id);
        $users = $this->getUsers();
        $posts = $this->getPosts();
        return view('pages.comment.edit', compact('comment', 'users', 'posts'));
    }

    public function update($request)
    {
        $this->findCommentById($request->id)->update([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'date' => $request->date
        ]);
        return redirect(route('admin.comment.index'));
    }
}
