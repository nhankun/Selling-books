<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.Category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate(
            [
              'name'=>'required|max:255',
               'name'=>'unique:categories,name',
                
            ],
            [
             'required' => 'Cột :attribute là bắt buộc.',
             'max' => 'Cột :attribute độ dài phải nhỏ hơn :max .',
             'name.unique'=> $request->name.' already exists'
           ]
         );

        $category = new Category();
        $category->name=$request->name;
        if ($request->file('img')) {
                $path = $request->file('img')->store('images');
                $category->img=$path;
        } 
        $category->save();  

        return redirect()->route('categories.create')->withSuccess('Create a new category successfully');

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
        $category = Category::find($id);
        return view('admin.Category.edit',compact('category'));
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
         $validator = $request->validate(
            [
              'name'=>'required|max:255',
               'name'=>'unique:categories,name',
            ],
            [
             'required' => 'Cột :attribute là bắt buộc.',
             'max' => 'Cột :attribute độ dài phải nhỏ hơn :max .',
             'name.unique'=> $request->name.' already exists'
           ]
         );

         $category = Category::find($id);
         $category->name=$request->name;
         if ($request->file('img')) {
                $path = $request->file('img')->store('images');
                $category->img=$path;
        } 
        $category->save();  
        return redirect()->route('categories.edit',compact('category'))->withSuccess('Edit category successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $size = count($category->Books);
        if ($size == 0) {
            $category->delete();
            return redirect()->route('categories.index')->withSuccess('Delete category successfully');
        }
        return redirect()->route('categories.index')->withError('Cannot delete!');
    }
}
