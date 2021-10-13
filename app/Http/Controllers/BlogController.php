<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $query = Blog::query();
        if($search) {
            $query->where('title', 'LIKE', "%$search%");            
        }
        $blogs = $query->latest()->paginate(2);
        return view('blog.index', compact('blogs'));
    }

    public function show($id) {
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'content' => 'required'
        ]);
        
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;

        if($request->has('image')) {
            $img = $request->image;
            $newImg = Str::random(10).'.'.$img->getClientOriginalExtension();
            $img->move('images/', $newImg);
            $blog->image = $newImg;
        }
        $blog->save();
        return redirect('blog')->with('success', 'Saved successfully!');
    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id) {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;

        if($request->has('image')) {
            $img = $request->image;
            $newImg = Str::random(10).'.'.$img->getClientOriginalExtension();
            $img->move('images/', $newImg);
            $blog->image = $newImg;
        }

        $blog->save();       
        return redirect('blog')->with('success', 'Successfully changed!');
    }

    public function destroy($id) {
        Blog::destroy($id);
        return redirect('blog')->with('success', 'Successfully deleted!');
    }
}
