<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exam Create</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('/') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Student Exam </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-graduation-cap"></i>
                    <span>Exam</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exam menu:</h6>
                        <a class="collapse-item" href="{{ route('addexam') }}">Add Exam</a>
                        <a class="collapse-item" href="{{ route('showexam') }}">Exam List</a>
                        <a class="collapse-item" href="{{ route('trashexam') }}">Trash Exam</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $admin_name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ url('/') }}/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Exam</h1>
                    </div>

                    <form action="{{ route('addexam') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- {{print_r($result);}} --}}
                        {{-- {{ $result->exam_name }} --}}
                        <input type="hidden" name="id"
                            value="@if (isset($result)) {{ $result->id }} @endif">
                        <div class="form-group">
                            <label for="examname">Exam Name:</label>
                            <input type="text" class="form-control" id="fname" placeholder="Enter exam Name"
                                value="@if (isset($result)) {{ $result->exam_name }}@else {{ old('examname') }} @endif"
                                name="examname">
                                <span>@error('examname'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="question">No. of question:</label>
                            <input type="text" class="form-control" id="lname"
                                placeholder="Enter No. of question"
                                value="{{ old('questionno') }} @if (isset($result)) {{ $result->no_question }} @endif"
                                name="questionno">
                                <span>@error('questionno'){{$message}} @enderror</span>


                        </div>
                        <div class="form-group">
                            <label for="duration">Exam duration:</label>
                            <input type="text" class="form-control" id="email"
                                placeholder="Enter Exam time in seconds"
                                value="{{ old('duration') }}@if (isset($result)) {{ $result->duration }} @endif"
                                name="duration">
                                <span>@error('duration'){{$message}} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="persentage">Passing percentage:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter percentage"
                                value="{{ old('percentage') }} @if (isset($result)) {{ $result->passing_percentage }} @endif"
                                name="percentage">
                                <span>@error('percentage'){{$message}} @enderror</span>

                            {{-- {{ $result->passing_percentage }} --}}
                        </div>
                        <div class="form-group">
                            <label for="">Start Date:</label>
                            <input id="input1" name="startdatetime"
                                value="{{old('startdatetime')}}@if(isset($result)){{ date('H:i m/d/Y', strtotime($result->start_date_time))}}@endif"
                                width="234" />
                                <span>@error('startdatetime'){{$message}} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="contact">End Date:</label>

                            <input id="input2" name="enddatetime"
                                value="{{old('enddatetime')}}@if(isset($result)){{date('H:i m/d/Y', strtotime($result->end_date_time))}}@endif"
                                width="234" />
                                <span>@error('enddatetime'){{$message}} @enderror</span>

                        </div>
                        <div class="form-group">
                            <label for="contact">No of student:</label>
                            <input type="text" class="form-control" id="contact" name="studentno"
                                value="{{ old('studentno') }}@if(isset($result)){{$result->no_student}}@endif">
                                <span>@error('studentno'){{$message}} @enderror</span>

                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="mark" value="1"
                                    @if(isset($result))@if($result->marks == 1)     checked @endif
                                    @endif >
                                <span>
                                </span>

                                Marks is visible
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="answer" value="1"
                                    @if (isset($result)) @if ($result->answer == 1) checked @endif
                                    @endif >
                                <span>
                                    @error('answer')
                                        {{ $message }}
                                    @enderror
                                </span>
                                Answer is visible
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="public" value="1"
                                    @if (isset($result)) @if ($result->public == 1) checked @endif
                                    @endif>
                                <span>
                                    @error('public')
                                        {{ $message }}
                                    @enderror
                                </span>
                                Public
                            </label>
                        </div>
                        @if (isset($result))
                            <button type="submit" class="btn btn-success">
                                Update Exam
                            </button>
                        @else
                            <button type="submit" class="btn btn-success">
                                Create Exam
                            </button>
                        @endif
                    </form>
                    
                    <!--page end -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">

                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    <script src="{{ url('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ url('/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('/') }}/js/sb-admin-2.min.js"></script>
    <script>
        $('#input1').datetimepicker({
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
        $('#input2').datetimepicker({
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
    </script>


</body>

</html>
