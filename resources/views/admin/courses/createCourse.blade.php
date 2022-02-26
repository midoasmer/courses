
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
        <form class="row g-3" action="{{url('courses/store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <td><label  class="">Name</label>
                        <td><input type="text" class="form-control" placeholder="Enter Course Name" name="name" ></td>
                    </tr>
                    <tr>
                        <td><label  class="">Category</label></td>
                        <td>
                            <select class="form-select form-select-sm" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label  class="">Description</label>
                        <td><input type="text"class="form-control" placeholder="Enter Course Description" name="description" ></td>
                    </tr>
                    <tr>
                        <td><label  class="">Levels</label></td>
                        <td>
                            <select class="form-select form-select-sm" name="levels">
                                <option value="beginner">Beginner</option>
                                <option value="immediat">Immediat</option>
                                <option value="high">High</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label  class="">Course Hours</label>
                        <td><input type="number" min="0" class="form-control" placeholder="Enter Course Hours" name="hours" ></td>
                    </tr>
                    <tr>
                        <td><label>Status</label>
                        <td>
                            <select class="form-select form-select-sm" name="active">
                                <option value="1">Active</option>
                                <option value="0">Unactive</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label  class="">Image</label>
                        <td><input type="file" class="form-control" aria-label="file example" name="photo" ></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </div>
        </form>
    </div>
@endsection
