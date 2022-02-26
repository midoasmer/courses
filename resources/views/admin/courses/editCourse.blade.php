
@extends('layouts.dashborde')

@section('content')
    <div class="col-9 edit__product__form">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row g-3" action="{{route('courses.update',$course->id)}}" method="post" enctype="multipart/form-data">
{{--            {{ method_field('put') }}--}}
            @csrf
            <div class="table-responsive">
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <td><label  class="">Name</label>
                        <td><input type="text" class="form-control" placeholder="Enter Course Name" name="name" value="{{$course->name}}"></td>
                    </tr>
                    <tr>
                        <td><label  class="">Category</label></td>
                        <td>
                            <select class="form-select form-select-sm" name="category_id">
                                <option value="{{$course->category_id}}">{{$course->category->name}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label  class="">Description</label>
                        <td><input type="text" class="form-control" placeholder="Enter Course Description" name="description" value="{{$course->description}}"></td>
                    </tr>
                    <tr>
                        <td><label  class="">Levels</label></td>
                        <td>
                            <select class="form-select form-select-sm" name="levels">
                                <option value="{{$course->levels}}">{{$course->levels}}</option>
                                <option value="beginner">Beginner</option>
                                <option value="immediat">Immediat</option>
                                <option value="high">High</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label  class="">Course Hours</label>
                        <td><input type="number" min="0" class="form-control" placeholder="Enter Course Hours" name="hours" value="{{$course->hours}}"></td>
                    </tr>
                    <tr>
                        <td><label>Status</label>
                        <td>
                            <select class="form-select form-select-sm" name="active">
                                $course->levels
                                @if($course->active == 1)
                                    <option value="1">Active</option>
                                @else
                                    <option value="0">Unactive</option>
                                @endif
                                <option value="1">Active</option>
                                <option value="0">Unactive</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label  class="">Image</label>
                        <td>
                            <img height="50" width="100" src="{{$course->photo_link ? asset('Courses/'.$course->photo_link):'http://placehold.it/50x50'}}">
                        </td>
                        <td><input type="file" class="form-control" aria-label="file example" name="photo" ></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
            </div>
        </form>
    </div>
@endsection
