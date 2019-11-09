<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $data['authors']= Author::all();
        return view('admin.author.index',$data);
    }

    public function create()
    {
        return view('admin.author.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'status' => 'required'
        ]);

        $author= new Author();
        $author->name= $request->name;
        $author->phone= $request->phone;
        $author->description= $request->description;
        $author->status= $request->status;
        $author->save();
        session()->flash('success','Author stored successfully');
        return redirect()->route('author.index');
    }

    public function edit($id)
    {
        $data['author'] = Author::findOrFail($id);
        return view('admin.author.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'description'=>'required',
            'status' => 'required'
        ]);
        $author= Author::findOrFail($id);
        $author->name= $request->name;
        $author->phone= $request->phone;
        $author->description= $request->description;
        $author->status= $request->status;
        $author->save();
        session()->flash('success','Author update successfully');
        return redirect()->route('author.index');
    }

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        session()->flash('success','Author deleted successfully');
        return redirect()->route('author.index');
    }
}
