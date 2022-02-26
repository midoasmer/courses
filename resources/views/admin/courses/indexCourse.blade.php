@extends('layouts.dashborde')

@section('content')
    <div class="col-9">
        @if(Session::has('create'))
            <p class="alert alert-info">{{ Session::get('create') }}</p>
        @endif
        @if(Session::has('update'))
            <p class="alert alert-info">{{ Session::get('update') }}</p>
        @endif
        @if(Session::has('delete'))
            <p class="alert alert-info">{{ Session::get('delete') }}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=1;
                @endphp
                @foreach($courses as $course)
                    <tr>
                        <td><a href="{{url("courses/show/".$course->id)}}">{{$i}}</a></td>
                        <td>
                            <img height="50" width="100" src="{{$course->photo_link ? asset('Courses/'.$course->photo_link):'http://placehold.it/50x50'}}">
                        </td>
                        <td>{{$course->name}}</td>
                        <td>
                            @if ($course->active == 1)
                                <span class="text-success"> Active </span>
                            @else
                                <span class="text-danger">Unactive</span>
                            @endif
{{--                                <label class="aiz-switch aiz-switch-success mb-0">--}}
{{--                                    <input type="checkbox" onchange="" checked="">--}}
{{--                                    <span class="slider round"></span>--}}
{{--                                </label>--}}
                        </td>
                        <td>
                            <a href="{{route('courses.edit',$course->id)}}" class="btn btn-warning buton"><i
                                    class="fas fa-edit "></i></a>
                            <form action="{{route('courses.delete',$course->id)}}" method="get" >
{{--                                {{ method_field('delete') }}--}}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger buton"><i class="fas fa-minus-circle "></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

