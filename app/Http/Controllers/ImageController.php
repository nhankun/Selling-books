<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Book;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('book_id', 'desc')->paginate(10);
        return view('admin.image.list',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if ($request->file('img')) {
            foreach($request->file('img') as $image){
                $images = new Image();
                $images->book_id=$request->book_id;
                $path=$image->store('images');
                $images->path=$path;
                $images->save();
            }
        } 
        
        return redirect()->route('image.index')->with('success', 'Create image successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.image.edit', compact('image'));
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
        $image = Image::find($id);
        if ($request->file('img')) {
            $image->book_id = $image->book_id;
            $path=$request->file('img')->store('images');
            $image->path = $path;
        }
        $image->save();
        return redirect()->route('image.index')->with('success', 'Edit Image successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('image.index')->with('success', 'Delete Image successfully');
    }
}
