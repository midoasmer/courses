@extends('layouts.dashborde')

@section('content')
    <div class="col-9">
        @if(Session::has('restored'))
            <p class="alert alert-info">{{ Session::get('restored') }}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Deleted At</th>
                    <th scope="col">Restored</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=1;
                @endphp
                @foreach($courses as $course)
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            <img height="50" width="100" src="{{$course->photo_link ? asset('Courses/'.$course->photo_link):'http://placehold.it/50x50'}}">
                        </td>
                        <td>{{$course->name}}</td>
                        <td>

                            <span class="text-danger">{{$course->deleted_at}}</span>
                            {{--                                <label class="aiz-switch aiz-switch-success mb-0">--}}
                            {{--                                    <input type="checkbox" onchange="" checked="">--}}
                            {{--                                    <span class="slider round"></span>--}}
                            {{--                                </label>--}}
                        </td>
                        <td>
                            <a href="{{route('restored.course',$course->id)}}" class="btn btn-warning buton"><i
                                    class="fas fa-edit "></i></a>
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
    <!-- Delete Category -->
    <div class="modal fade" id="delete_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        Are You Sure You Will Delete Category?
                        <input type="hidden" name="id" id="category_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Arcive Category -->
    <div class="modal fade" id="Transfer_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Arcive Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        Are You Sure You Will Arcive Category?
                        <input type="hidden" name="id" id="category_id" value="">
                        <input type="hidden" name="id_page" id="id_page" value="2">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Arcive</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

