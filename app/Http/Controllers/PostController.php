<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts']=Post::with('relAuthor')->get();

        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']= Category::where('status','Active')->pluck('name','id');
        $data['authors'] = Author::where('status','Active')->pluck('name','id');
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post= new Post();
        $post->category_id= $request->category_id;
        $post->author_id= $request->author_id;
        $post->title= $request->title;
        $post->short_description= $request->short_description;
        $post->description= $request->description;
        if ($request->is_featured)
        {
            $post->is_featured= $request->is_featured;
        }

        $post->status= $request->status;
        $post->published_date= $request->published_date;

        $image= $request->file('image');
        $image->move('images/post',$image->getClientOriginalName());

        $post->image= 'images/post/'.$image->getClientOriginalName();
        $post->save();
        session()->flash('success','Post stored successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['post']= Post::with('relAuthor','relCategory')->findOrFail($id);
        //dd($data);
        return view('admin.post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post']=Post::findOrFail($id);
        $data['authors'] = Author::where('status','Active')->pluck('name','id');
        $data['categories']= Category::where('status','Active')->pluck('name','id');
        return view('admin.post.edit',$data);
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
        $post= Post::findOrFail($id);
        $post->author_id= $request->author_id;
        $post->category_id= $request->category_id;
        $post->title= $request->title;
        $post->short_description= $request->short_description;
        $post->description= $request->description;
        if(!isset($request->is_featured))
        {
            $post->is_featured= 'No';
        }else{
            $post->is_featured= $request->is_featured;
        }
        $post->status= $request->status;
        $post->published_date= $request->published_date;

        if($request->hasFile('image')) {
            if(file_exists(public_path($post->image)))
            {
                unlink(public_path($post->image));
            }
            $image = $request->file('image');
            $image->move('images/post', $image->getClientOriginalName());
            $post->image = 'images/post/' . $image->getClientOriginalName();
        }
        $post->save();
        session()->flash('success','Post updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        if(file_exists(public_path($post->image)))
        {
            unlink(public_path($post->image));
        }
        $post->delete();
        session()->flash('success','Post deleted successfully');
        return redirect()->route('post.index');
    }
}
