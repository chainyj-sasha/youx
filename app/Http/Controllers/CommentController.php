<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, $id)
    {
        dd($request->all());
//        Comment::create([
//            'name' => $request->name,
//            'text' => $request->text,
//        ]);
//        return redirect()->route();
    }

    public function create()
    {

    }
}
