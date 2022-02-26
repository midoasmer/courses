
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
        <form class="row g-3">
            @csrf
            <div class="table-responsive">
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <img class="form-control" height="200" width="200" src="{{$course->photo_link ? asset('Courses/'.$course->photo_link):'http://placehold.it/50x50'}}">
                    </tr>
                    <tr>
                        <td><label  >Name</label>
                        <td><label type="text"class="form-control" >{{$course->name}}</label></td>
                    </tr>
                    <tr>
                        <td><label>Status</label>
                        <td>
                            @if ($course->active == 1)
                                <label type="text" class="form-control text-success">Active</label>
                            @else
                                <label type="text" class="form-control text-danger">Unactive</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><label>Category</label>
                        <td><label type="text" class="form-control" >{{$course->category->name}}</label></td>
                    </tr>
                    <tr>
                        <td><label>Description</label>
                        <td><label type="text" class="form-control" >{{$course->description}}</label></td>
                    </tr>
                    <tr>
                        <td><label>Level</label>
                        <td><label type="text" class="form-control" >{{$course->levels}}</label></td>
                    </tr>
                    <tr>
                        <td><label>Hours</label>
                        <td><label type="text" class="form-control" >{{$course->hours}}</label></td>
                    </tr>
                    <tr>
                        <td><label>Views</label>
                        <td><label type="text" class="form-control" >{{$course->views?$course->views:'No Views'}}</label></td>
                    </tr>
                    <tr>
                        <td><label>Rating</label>
                        <td><label type="text" class="form-control" >{{$course->rating?$course->rating:'No Rating'}}</label></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-auto">
                <a href="{{url('courses/edit/'.$course->id)}}" class="btn btn-primary mb-3">Edit</a>
                <a href="{{url('courses/delete/'.$course->id)}}" class="btn btn-danger mb-3">Delete</a>
            </div>
        </form>
    </div>
@endsection
