<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        return view('admin.Book.list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.Book.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        if($request->file('img')){
            foreach($request->file('img') as $image){
                $path=$image->store('images');
                $img= Image::create([
                    'path' =>$path, 
                    'book_id' => $book->id
                ]);
            }        
        }
        return redirect()->route('book.create')->with('success', 'Create a new book successfully');
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
        $book = Book::find($id);
        return view('admin.Book.edit',compact('book'));
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
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->route('book.index')->with('success', 'Edit a book successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $size = count($book->Order_details);
        $imgcount = count($book->Images);
        if ($size == 0 && $imgcount == 0) {
            $book->delete();
            return redirect()->route('book.index')->with('success', 'Delete book successfully');
        }
        return redirect()->route('book.index')->with('errors', 'Cannot delete!');
    }
}
