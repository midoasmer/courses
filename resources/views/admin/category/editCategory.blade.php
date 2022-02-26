
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
        <form class="row g-3" action="{{route('categories.update',$category->id)}}" method="post">
            {{ method_field('put') }}
            @csrf
            <div class="table-responsive">
                <table class="table table-sm">
                    <tbody>
                    <tr>
                        <td><label  class="">Name</label>
                        <td><input type="text"class="form-control" value="{{$category->name}}" name="name" ></td>
                    </tr>
                    <tr>
                        <td><label>Status</label>
                        <td>
                            <select class="form-select form-select-sm" name="active">
                                @if ($category->active == 1)
                                    <option value="1">Active</option>
                                @else
                                    <option value="0">Unactive</option>
                                @endif
                                <option value="1">Active</option>
                                <option value="0">Unactive</option>
                            </select>
                        </td>
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
