<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blogs::latest()->paginate(10);
        return Inertia::render('Blog/Index',['blog' => $blog]);
        // return Inertia::render('Blog/Index', [
        //     'blog' => Blogs::latest()->paginate(10)
        //         ->transform(fn ($blog) => [
        //             'id' => $blog->id,
        //             'title' => $blog->title,
        //             'slug' => $blog->slug,
        //             'body' => $blog->body,
        //             'image' => $blog->image ,
        //             // 'deleted_at' => $blog->deleted_at,
        //         ]),
        // ]);
    }

    public function create()
    {
        return Inertia::render('Blog/Create');
    }

    // public function store(Request $request)
    // {

    //         $title = $request->input('title');
    //         $slug = $request->input('slug');
    //         $body = $request->input('body');
    //         $image = $request->input('image');
    //         $user = auth()->id();
    //         $data=array('title'=>$title,"slug"=>$slug,"body"=>$body,"image"=>$image,"user"=>$user);
    //         DB::table('blogs')->insert($data);
    //         // echo "Record inserted successfully.<br/>";
    //         // echo '<a href = "/insert">Click Here</a> to go back.';
            
    //     //  Blogs::create(
    //     //     Request::validate([
    //     //         'title' => ['required'],
    //     //         'slug' => ['required', 'max:50'],
    //     //         'body' => ['required'],
    //     //         'image' => ['required', 'image'],
    //     //         'user' => Auth::user()->id,
    //     //     ])
    //     // );


    //     // Validator::make($request->all(), [
    //     //     'title' => ['required'],
    //     //     'slug' => ['required', 'max:50'],
    //     //     'body' => ['required'],
    //     //     'image' => ['required', 'image'],
    //     //     'user' => Auth::user()->id,
    //     // ])->validate();
  
    //     // Blogs::create($request->all());
  
    //     // return redirect()->back()
    //     //             ->with('message', 'Post Created Successfully.');


    // //    $request = Request::validate([
    // //         'title' => ['required', 'max:50'],
    // //         'slug' => ['required', 'max:50'],
    // //         'body' => ['required', 'max:200'],
    // //         'image' => ['required', 'image'],
    // //     ]);

    //     // dd($request);
    //     // Auth::user()->account->blogs()->create([
    //     //     'title' => Request::get('title'),
    //     //     'slug' => Request::get('slug'),
    //     //     'body' => Request::get('body'),
    //     //     'image' => Request::file('image') ? Request::file('image')->store('blogs') : null,
    //     // ]);

    //     return Redirect::route('blog');

    // }


    public function store(Request $request)
    {
        // Validate the inputs
      $blg =  $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,bmp,png' 
        ]);
        dd($blg);
        // if ($request->hasFile('file')) {

        //     $request->validate([
        //         'image' => 'mimes:jpeg,bmp,png' 
        //     ]);

            // $request->file->store('blog', 'public');

            // $product = new Blogs([
            //     "title" => $request->get('title'),
            //     "slug" => $request->get('slug'),
            //     "body" => $request->get('body'),
            //     "image" => $request->file->hashName(),
            //     "user" => auth()->id()
            // ]);
            // $product->save(); 
        // }

        // return Redirect::route('blog');
    }

    
}
