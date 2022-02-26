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
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=1;
                @endphp
                @foreach($categories as $category)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            @if ($category->active == 1)
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
                            <a href="{{route('categories.show',$category->id)}}" class="btn btn-warning buton"><i
                                    class="fas fa-edit "></i></a>
                            <form action="{{route('categories.destroy',$category->id)}}" method="post" >
                                {{ method_field('delete') }}
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

