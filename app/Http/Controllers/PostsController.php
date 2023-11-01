<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'newPost' => 'string|max:150',
        ])->validate();
    }

    public function index(){
        $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function create(Request $request)
    {
        $posts = $request->input('newPost');
        DB::table('posts')->insert([
            'posts' => $posts,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')
            ->join('posts','users.id', '=', 'posts.user_id')
            ->get();

        return redirect('/top');
    }

    public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
        ->where('id', $id)
        ->update(['posts' => $up_post]);
        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
        ->where('id', $id)
        ->delete();
        return redirect('/top');
}


}
