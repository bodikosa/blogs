<?php
namespace App\Http\Controllers\Frontend;

use App\Model\Admin\Posts;
use Validator, Input;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;


class BlogController extends Controller
{

    public function index()
    {
        $postAll = array_chunk(Posts::all()->toArray(), 3);
        return View::make('frontend.blog.index')
            ->with('posts', $postAll);
    }

    public function show($link)
    {
        $post = Posts::where('link', $link)->first();
        return View::make('frontend.blog.show')
            ->with('post', $post);
    }

}
