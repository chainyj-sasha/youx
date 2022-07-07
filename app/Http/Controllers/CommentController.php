<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
           $comment = Comment::create([
               'name' => $request->name,
               'text' => $request->text,
           ]);

           $comment->articles()->attach($request->id);
       //return redirect()->route('category_index');
    }

}
