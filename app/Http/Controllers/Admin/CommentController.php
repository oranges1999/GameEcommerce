<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderBy("id","desc")->paginate("4");
        return view("admin.comment.index",compact("comments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd("alo");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // dd($comment->id);
        if($request->has("display")){
            Comment::whereId($comment->id)->update(["status"=>"1"]);
            return redirect()->back()->with("success","Comment has been display");
        }
        if($request->has("hidden")){
            Comment::whereId($comment->id)->update(["status"=>"0"]);
            return redirect()->back()->with("error","Comment has been hidden");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
