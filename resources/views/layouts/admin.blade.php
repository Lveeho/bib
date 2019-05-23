<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('css/materialdesignicons.min.css')}}">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <!-- endinject -->

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">

                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a id="test" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="profile-text caret">
                            <?php use
                                Illuminate\Support\Facades\Auth;$test=Auth::user()
                            ?>Hi
                            @if(!empty($test->user_firstname))
                              , {{ucfirst($test->user_firstname)}}!
                            @endif
                        </span>
                        <img class="img-xs rounded-circle" src="{{asset('images/face9.jpg')}}" alt="Profile image">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark">
                            Sign Out
                        </a>
                    </div>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">
                            <div class="profile-image">
                                <img src="{{asset('images/face9.jpg')}}" alt="profile image">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">
                                    @if(!empty($test->user_firstname))
                                    {{ucfirst($test->user_firstname)}} {{ucfirst
                                                        ($test->user_lastname)}}
                                        @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public">
                        <i class="fas fa-search mr-3"></i>
                        <span class="menu-title">Zoeken</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('rentals.index')}}">
                        <i class="fas fa-window-restore mr-3"></i>
                        <span class="menu-title">Ontleningen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logs.index')}}">
                        <i class="fas fa-history mr-3"></i>
                        <span class="menu-title">Historiek</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="fas fa-user-friends mr-3"></i>
                        <span class="menu-title">Gebruikers</span>
                        <i class="fas fa-chevron-down ml-4"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.index')}}">
                                    <i class="fas fa-user-friends mr-3"></i>
                                    <span class="menu-title">All gebruikers</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.create')}}">
                                    <i class="fas fa-users-cog mr-3"></i>
                                    <span class="menu-title">Gebruiker aanmaken</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui3" aria-expanded="false"
                       aria-controls="ui-basic">
                        <i class="fas fa-pen-nib mr-3"></i>
                        <span class="menu-title">Auteurs</span>
                        <i class="fas fa-chevron-down ml-4"></i>
                    </a>
                    <div class="collapse" id="ui3">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('authors.index')}}">
                                    <i class="fas fa-pen-nib mr-3"></i>
                                    <span class="menu-title">Alle auteurs</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('authors.create')}}">
                                    <i class="fas fa-pen-nib mr-3"></i>
                                    <span class="menu-title">Auteur toevoegen</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui2" aria-expanded="false"
                       aria-controls="ui-basic">
                        <i class="fas fa-book mr-3"></i>
                        <span class="menu-title">Boeken</span>
                        <i class="fas fa-chevron-down ml-4"></i>
                    </a>
                    <div class="collapse" id="ui2">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('books.index')}}">
                                    <i class="fas fa-book mr-3"></i>
                                    <span class="menu-title">Alle boeken</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('books.create')}}">
                                    <i class="fas fa-book-medical mr-3"></i>
                                    <span class="menu-title">Boek toevoegen</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-12 px-5 mt-3">
                    @yield('content')
                </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
                        <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                        <i class="mdi mdi-heart text-danger"></i>
                    </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('js/vendor.bundle.base.js')}}"></script>

<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('js/dashboard.js')}}"></script>
<script>
    $(document).ready(function($) {
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!-- End custom js for this page-->
</body>

</html>
