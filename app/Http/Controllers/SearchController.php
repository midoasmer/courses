<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $courses = Courses::all()->where('active',1);
        $categoris = Categories::all()->where('active',1);
        return view('frontend.index',compact('courses','categoris'));
    }

    public function info($id)
    {
        $course = Courses::find($id);
        $categoris = Categories::all()->where('active',1);
        return view('frontend.courseInfo',compact('course','categoris'));
    }
    public function filters(Request $request)
    {
        $courses = Courses::where('category_id',$request->id)->where('active',1)->get();
        $categoris = Categories::all()->where('active',1);
        return response()->json([
            'courses'=>$courses,
            'categoris'=>$categoris,
            'status'=>200
        ]);
    }
    public function categories()
    {
        $categoris = Categories::where('active',1)->get();
        return response()->json([
            'categoris'=>$categoris,
            'status'=>200
        ]);
    }
    public function courses()
    {
        $courses = Courses::where('active',1)->get();
        return response()->json([
            'courses'=>$courses,
            'status'=>200
        ]);
    }
}
