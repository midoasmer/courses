@extends('layouts.minapp')

@section('content')
    <section class="trending-products " id="our-product">
        <div class="container">
            <div class="row text-center">
                <h2>Courses</h2>
                <div id="courses" class="row text-center">
                @foreach($courses as $course)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-start">
                        <div class="card">
                            <div class="card-img">
                                <div class="new">NEW</div>
                                <a href="{{url('courses/info/'.$course->id)}}" class="card-icon"><i class="fas fa-arrow-circle-right"></i></a>
                                <div class="overlay"></div>
                                <img src="{{$course->photo_link ? asset('Courses/'.$course->photo_link):'http://placehold.it/50x50'}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <p class="product-section">{{$course->category->name}}</p>
                                <h5 class="card-title">{{$course->name}}</h5>
                                <p class="card-text">{{$course->hours}}H</p>
                                <p class="card-text">{{$course->description}}</p>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span><span class="card-text">({{$course->views}})</span><br>
                                <a href="{{url('courses/info/'.$course->id)}}" class="see-more-btn">SEE MORE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <div><a class="more-products-btn" href="#">More Courses<i
                            class="fas fa-arrow-right slider-btn__icon"></i></a></div>
            </div>
        </div>
    </section>
@endsection
