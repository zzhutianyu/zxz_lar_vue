<?php

namespace App\Http\Controllers;

use App\Model\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //api
    public function Posts() {
        $posts = Posts::where('g_id', '>', 0)->get();
        return $posts;
    }

    public function post($Pid) {
        $post = Posts::where('g_id','=', (int)$Pid)->get();
        return $post;
    }

    public function indexPosts(){
        $posts = Posts::orderBy('g_id', 'desc')->where('g_id', '<>', 0)->take(2)->get();
        return $posts;
    }

    public function listPosts($page) {
        $page = (int) $page;
        $list = Posts::skip(5 *  ($page- 1))->where('g_id', '<>', 0)->take(5)->get();
        return $list;
    }
    //api-end

    //admin
    public function create(Request $request) {
        $new = new Posts;
        $gid = Posts::where('g_id', 0)->first();
        //return $gid;
        $new->title = $request->input('title');
        $new->sub = $request->input('sub');
        $new->image_url = $request->input('imageUrl');
        $new->raw_content = $request->input('content');
        $new->html_content = $request->input('content');
        $new->g_id = ++$gid->gid;
        $new->save();
        $gid->save();
        return RJM('', '200', 'success');
    }

    public function upate(Request $request) {
        $new = Posts::where('g_id', (int) $request->input('gid'))->first();
        $new->title = $request->input('title');
        $new->sub = $request->input('sub');
        $new->image_url = $request->input('imageUrl');
        $new->raw_content = $request->input('content');
        $new->html_content = $request->input('content');
        $new->save();
        return RJM('', '200', 'success');
    }
}
