<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/') }}">
    <link rel="stylesheet" href="{{ asset('css/Vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Main/NavBar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Main/Mohamed-Marei.css') }}">
    <title>DashBoard</title>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="sidbar col-3 bg-dark">
            <span class="fs-4 text-white dashboord__heder"><i class="fas fa-tachometer-alt dashboord__icon"></i>DashBoard</span>
            <hr class="text-white">
            <div class="accordion bg-dark" id="accordionExample">
                <div class="accordion-item accordion__color">
                    <h2 class="accordion-header accordion__color" id="headingFour">
                        <button class="accordion-button  accordion__color collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                             Category
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse show accordion__color" aria-labelledby="headingFour"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body accordion__content">
                            <div class="collapse show" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><i class="fas fa-list-ul icons"></i><a href="{{route('categories.index')}}" class="link-dark rounded link__color">All Categories</a></li>
                                    <li><i class="fas fa-list-ul icons"></i><a href="{{route('deleted.categories')}}" class="link-dark rounded link__color">All Deleted Categories</a></li>
                                    <li><i class="fas fa-plus icons"></i><a href="{{route('create.category')}}" class="link-dark rounded link__color">Add Category</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion__color">
                    <h2 class="accordion-header accordion__color" id="headingOne">
                        <button class="accordion-button collapsed accordion__color" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Courses
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse  accordion__color" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body accordion__content">
                            <div class="collapse show" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><i class="fas fa-list-ul icons"></i><a href="{{url('courses/index')}}" class="link-dark rounded link__color">All Courses</a></li>
                                    <li><i class="fas fa-list-ul icons"></i><a href="{{route('deleted.courses')}}" class="link-dark rounded link__color">All Deleted Courses</a></li>
                                    <li><i class="fas fa-plus icons"></i><a href="{{route('create.course')}}" class="link-dark rounded link__color">Add Course</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
<script src="{{ asset('js/Vendors/all.min.js') }}"></script>
<script src="{{ asset('js/Vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/Main/Main.js') }}"></script>
</body>

</html>


