<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $category_id = 4;

        return view('posts.create', compact('categories', 'category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => ['required', 'string', 'max:150'],
            'post_content' => ['required', 'string', 'max:4500'],
        ]);

        $post = Post::create([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_intro' => substr($request->post_content, 0, 255)
        ]);

        $categories = $request->categories;

        foreach ($categories as $category){
            $value = $this->createCategory($category, $post->id);
            $post->categories()->attach($value);
        }
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = $post->categories()->get();
        return view('posts.show', compact('post', "categories"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        $post_categories = $post->categories()->get();
        $category_id = 0;

        return view('posts.edit', compact('post', 'categories', 'post_categories', 'category_id'));
    }


    public function createCategory($input_category, $post_id){

        $categories = Category::all();
        $colours = ['badge-primary', 'badge-info', 'badge-success', 'badge-secondary', 'badge-danger', 'badge-dark'];
        $i = rand(0, count($colours)-1 );

        if(!is_numeric($input_category) && !$categories->contains('category_name', $input_category)){
            $category = Category::create([
                'category_name' => $input_category,
                'category_colour' => $colours[$i]
            ]);
            $category->save();
            return $category->id;
        }
        return $input_category;
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
        $post = Post::findOrFail($id);
        $post->categories()->detach();

        $request->validate([
            'post_title' => ['required', 'string', 'max:150'],
            'post_content' => ['required', 'string', 'max:4500'],
        ]);
        $post->post_title = $request->get('post_title');
        $post->post_content = $request->get('post_content');

        $categories = $request->categories;

        foreach ($categories as $category){
            $value = $this->createCategory($category, $post->id);
            $post->categories()->attach($value);
        }
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
