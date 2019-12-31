<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;                  //utk use model Post
use DB;
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // kne fetch the model
        // $posts =Post::all();          // Post::all(); maknanya dia amik smua yg ada kt model Post.

     // $posts = Post::OrderBy('title','desc')->get();               //title, asc means ascending pastu mesti kene ->get()   
     // $posts = Post::OrderBy('title','desc')->take(1)->get();       //limit the result

     //   return Post :: where('title','Post Two')->get();      // cari hanya title, berbeza sikit dari function show($id).
     //   $posts =DB::select('SELECT * FROM posts');        // cara dapatkn data guna DB.

        $posts = Post::OrderBy('Created_at','desc')->paginate(5);  //bergantung nk bape page number tu
        return view ('posts.index')-> with('posts',$posts); // ni kt web.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,[
            'title'=>'required',     // this is array of rules that use to store something              //
            'body'=>'required',                         //  dengan validate ni use xleh trus submit, dia kene isi dulu      //
            'cover_image'=>'image|nullable|max:1999'      // max 1999 is just under 2MB for apache server. for upload file.
        ]);
        //  return 123 ;

        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get filename with extension
            $filenameWithExt = $request-> file('cover_image')->getClientOriginalName();
            //Get filename 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request  -> file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post   // use App\Post dh define kt atas
        $post = new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');    //$request sbb datang dari form
        $post->user_id= auth()->user()->id;     //sbb dh ada auth so pakai lah. user()->"?" bole amik dari mana2 field dari table user.
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with ('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post :: find($id);
        return view ('posts.show')->with ('post',$post); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post :: find($id);

        //Check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect ('/posts')->with ('error','Unauthorized Page');        // dia redirect ke error message
        }
        return view ('posts.edit')->with ('post',$post); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this ->validate($request,[
            'title'=>'required',     // this is array of rules that use to store something              //
            'body'=>'required'      //  dengan validate ni use xleh trus submit, dia kene isi dulu      //
        ]);
        // return 123 ;

        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get filename with extension
            $filenameWithExt = $request-> file('cover_image')->getClientOriginalName();
            //Get filename 
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request  -> file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post   // use App\Post dh define kt atas
        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image')){
            // delete old image if it changed
            if ($post->cover_image != 'no_image.png') {
                Storage::delete('public/cover_images/'.$post->cover_image);
              }
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with ('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        //Check for correct user
        if(auth()->user()->id != $post->user_id){
            return redirect ('/posts')->with ('error','Unauthorized Page');        // dia redirect ke error message
        }
        if($post->cover_image !='noimage.jpg'){
            //so delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect('/posts')->with ('success', 'Post Removed');
    }
}
