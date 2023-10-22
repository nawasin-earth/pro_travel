<?php

namespace App\Http\Controllers;
use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
{
    // คำสั่งที่คุณต้องการ
    return view('news.index');
}

public function addnews()
{
    return view('admin.addnews');
}

public function show($id)
{
    $newsItem = News::find($id);
    return view('news.show', ['newsItem' => $newsItem]);
}


public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $news = new News;
    $news->title = $request->title;
    $news->description = $request->description;

    if($request->hasFile('image')){
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $news->image = $imageName;
    }

    $news->save();

    return redirect()->route('news.create')->with('success', 'News added successfully!');
}


public function create()
{
    return view('admin.addnews');
}





}
