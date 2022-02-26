<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        return view('admin.courses.indexCourse',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::where('active',1)->get();
        return view('admin.courses.createCourse',compact('categories'));
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
            'name' => 'required|unique:courses',
            'category_id' => 'required',
            'description' => 'required',
            'levels' => 'required',
            'hours' => 'required|integer'
        ]);
        $course = new Courses;
        $course->name = $request->name;
        $course->category_id = $request->category_id;
        $course->description = $request->description;
        $course->levels = $request->levels;
        $course->hours = $request->hours;
        $course->active = $request->active;

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('Courses', $name);
            $course->photo_link = $name;
        } else {
            $course->photo_link = Null;
        }

        $course->save();
        Session::flash('update', 'Course ' .$request->name.' Created');
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::find($id);
        return view('admin.courses.showCourse',compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::where('active',1)->get();
        $course = Courses::find($id);
        return view('admin.courses.editCourse',compact('categories','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'levels' => 'required',
            'hours' => 'required'
        ]);
        $course = Courses::find($id);
        if(!($course->name == $request->name))//to chick if the name changed then it must be unique
        {
            $validated = $request->validate([
                'name' => 'unique:categories'
            ]);
        }

        if ($course->photo_link == Null) {
            //if course dont have photo check if the user add photo or not
            if ($file = $request->file('photo')) {

                $name = time() . $file->getClientOriginalName();
                $file->move('Courses', $name);
            }
            else{

                $name=$course->photo_link;
            }
        }
         //if movie have photo check if the user edit the photo or not
        else {
            if ($file = $request->file('photo')) {

                $name = time() . $file->getClientOriginalName();
                $file->move('Courses', $name);
//                $path= public_path() . '/Courses/'.$course->photo_link;
                unlink(public_path() . '/Courses/'.$course->photo_link);
            }
            else{

                $name=$course->photo_link;
            }
        }

//        $course->update([
//            'name' => $request->name,
//            'category_id' => $request->category_id,
//            'description' => $request->description,
//            'levels' => $request->levels,
//            'hours' => $request->hours,
//            'active' => $request->active,
//            'photo_link' => $name
//        ]);
        $course->name = $request->name;
        $course->category_id = $request->category_id;
        $course->description = $request->description;
        $course->levels = $request->levels;
        $course->hours = $request->hours;
        $course->active = $request->active;
        $course->photo_link = $name;
        $course->save();
        Session::flash('update', 'Course ' .$request->name.' updated');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        $course->delete();
        Session::flash('delete', 'Course ' .$course->name.' deleted');
        return redirect()->route('courses.index');
    }

    public function deletedCourses()
    {
        $courses = Courses::onlyTrashed()->get();
        return view('admin.courses.deletedCourses',compact('courses'));
    }
    public function restoredCourses($id)
    {
        $cours= Courses::withTrashed()->find($id);
        $cours->restore();
        Session::flash('restored', 'Course ' .$cours->name.' Restored');
        return redirect()->route('deleted.courses');
    }
}
