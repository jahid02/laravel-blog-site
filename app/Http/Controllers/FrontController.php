<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    private $categories;
    public function __construct()
    {
        $this->categories = Category::select(['id','name'])->where('status','Active')->get();
    }

    public function index()
    {
        $data['categories'] = $this->categories;
        $data['recent_post'] = Post::with(['relCategory'])
            ->where('status','Published')
            ->orderBy('id','Desc')
            ->limit(6)
            ->get();

        $data['all_posts'] = Post::with(['relCategory'])
            ->where('status','Published')
            ->limit(7)
            ->get();

        $data['popular_post'] = $this->popular_posts();

        $data['last2featrueds'] = $this->last2featureds();

        $data['last3featrueds'] = Post::with(['relCategory'])
            ->where('status','Published')
            ->where('is_featured','Yes')
            ->orderBy('id','Desc')
            ->limit(3)
            ->get();
        return view('frontend.home', $data);
    }

    public function details($id)
    {
        Post::where('id',$id)->increment('total_hit');
        $data['categories'] = $this->categories;
        $data['post'] = Post::with(['relCategory'])->findOrFail($id);

        $data['popular_post'] = $this->popular_posts();

        $data['last2featrueds'] = $this->last2featureds();
        return view('frontend.details', $data);
    }



    public function category_post($category_id)
    {
        $data['categories'] = $this->categories;
        $data['posts']=Post::with('relCategory')
            ->where('category_id',$category_id)
            ->where('status','Published')
            ->orderBy('id','DESC')
            ->get();

        $data['popular_post'] = $this->popular_posts();

        $data['last2featrueds'] = $this->last2featureds();

        return view('frontend.category_posts',$data);
    }

    public function search(Request $request)
    {
        $data['posts']=Post::with('relCategory')
            ->where('title','like','%'.$request->search.'%')
            ->orWhere('description','like','%'.$request->search.'%')
            ->where('status','Published')
            ->orderBy('id','DESC')
            ->get();
        $data['categories']= $this->categories;
        $data['popular_post'] = $this->popular_posts();

        $data['last2featrueds'] = $this->last2featureds();
        return view('frontend.search',$data);
    }

    private function last2featureds()
    {
        return Post::with(['relCategory'])
            ->where('status','Published')
            ->where('is_featured','Yes')
            ->orderBy('id','Desc')
            ->limit(2)
            ->get();
    }

    private function popular_posts()
    {
        return Post::where('status','Published')
            ->orderBy('total_hit','DESC')
            ->limit(4)
            ->get();
    }


}
