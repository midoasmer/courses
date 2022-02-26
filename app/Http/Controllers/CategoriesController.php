<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.category.indexCatrgory',compact('categories'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = new Categories();
        $category->name = $request->name;
        $category->active = $request->active;
        $category->save();
        Session::flash('create', 'Category ' .$request->name.' Created');
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::find($id);
        return view('admin.category.editCategory',compact('category'));
//        $course = Courses::find($id);
//       return view('admin.courses.showCourse',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        $category = Categories::find($id);
        if(!($category->name == $request->name))//to chick if the name changed then it must be unique
        {
            $validated = $request->validate([
                'name' => 'unique:categories'
            ]);
        }
        $category->name = $request->name;
        $category->active = $request->active;
        $category->save();
        Session::flash('update', 'Category ' .$request->name.' updated');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        Session::flash('delete', 'Category ' .$category->name.' deleted');
        return redirect()->route('categories.index');
    }

    public function deletedCategories()
    {
        $categories = Categories::onlyTrashed()->get();
        return view('admin.category.deletedCategories',compact('categories'));
    }
    public function restoredCategory($id)
    {
        $category = Categories::withTrashed()->find($id);
        $category->restore();
        Session::flash('restored', 'Category ' .$category->name.' Restored');
        return redirect()->route('deleted.categories');
    }
}
