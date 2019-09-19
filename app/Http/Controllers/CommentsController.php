<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentsController extends Controller
{
    public function comment ($id) {
       $comment = Comments::create([

           'user_id' => auth()->id(),

           'post_id' => $id,

           'comment' => request('comment'),
       ])->save();

       return redirect()->route('publications');
    }

    public function delete ($id) {
           $comment = Comments::destroy($id);
           return redirect()->route('publications'); 
    }

}
