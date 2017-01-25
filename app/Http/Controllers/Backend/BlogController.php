<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests\PostValid;
use Illuminate\Support\Facades\Session;
use App\Model\Admin\Posts;
use Validator,Input;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;


class BlogController extends Controller
{

    public $path_img;

    public function __construct() {
        $this->path_img =  '/public/images/blogpost/';
        $this->middleware('auth');
    }


    public function index()
    {
           $postAll =  Posts::all();

           return View::make('backend.blog.index')
               ->with('posts', $postAll);
    }

    public function show($id)
    {
        $post = Posts::find($id);
        return View::make('backend.blog.show')
             ->with('post', $post);
    }

    public function destroy($id)
    {
        $new = Posts::find($id);
        $new->delete();
        Session::flash('message', 'Новость успешно удалена!');
        return Redirect::to('admin/blog');
    }

    public function create()
    {
        return View::make('backend.blog.create');
    }

    public function store(PostValid $request)
    {

        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $data = $request->except('_token');
        $request->file('image')->move(
            base_path().$this->path_img, $imageName
        );
        $data['image'] = $this->path_img.$imageName;

        Posts::create($data);
        Session::flash('message', 'Запись была успешно создана!');
        return Redirect::to('admin/blog');
    }

}
