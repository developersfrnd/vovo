<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;


class CategoriesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index',['categories'=> Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $uploaded_image = $request->image->store('uploads');
        $uploaded_image_name_arr = explode('/',$uploaded_image);
        
        $category = new Category;
        $category->parent_id = $request->parent_id;
        $category->name = $request->name;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        $category->slug = strtolower(str_replace(' ', '_', $request->name));
        $category->image = $uploaded_image_name_arr[1];
        $category->status = '1';

        if($request->parent_id){

            $parent = Category::find($request->parent_id);
            $category->display = $parent->display.' > '.$request->name;
            $category->depth = $parent->depth + 1;
        }else{
            $category->display = $request->name;
            $category->depth = 0;
        }

        $category->save();
        return redirect($this->ADMIN_URL.'/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
