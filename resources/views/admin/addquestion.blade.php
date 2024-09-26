<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <title>Add Question</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="{{ url('/') }}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('/') }}/css/sb-admin-2.min.css" rel="stylesheet">

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
                    <i class="fas fa-fw fa-cog"></i>
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
                    <form
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
                    </form>

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
                <div class="container-fluid ">

                    <!-- Page Heading -->
                    <!-- main content -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Question</h1>
                    </div>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->


                        {{-- {{$exam_id}} --}}

                        <form action="{{ route('addquestiontodb') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if ($result)
                                @php
                                    // @json($result->options);
                                    // dd($result->options);
                                    $lol = (array) json_decode($result->options);
                                    // dd($lol);
                                    $length = count($lol);
                                    // dd($length);
                                @endphp


                            @endif
                            <input type="hidden" name="id"
                                value="@if ($result) {{ $result->id }} @endif">
                            <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                            <input type="hidden" id="last_value" name="last_opt"
                                value="@if ($result) {{ $length }} @endif">
                            <div class="form-group">
                                <label for="question">Question :</label>
                                <textarea name="question" value="" class="form-control" rows="3">@if ($result){{ $result->question }}@else{{ old('question') }}@endif</textarea>
                                <span class="text-danger">
                                    @error('question')
                                        {{ $message }}
                                    @enderror
                                </span>

                                {{-- <input type="text" class="form-control" id="fname"
                                    placeholder="Enter Question" name="question"> --}}
                            </div>
                            <div class="form-group">
                                @if ($result)
                                    @foreach (json_decode($result->options) as $key => $option)
                                        <input type="text" name="option_{{ $key }}"
                                            value="{{ $option }}">
                                        <span>
                                            @error('option_{{ $key }}')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    @endforeach


                                @endif

                                <div id="dynamicCheck">
                                    <input type="button" value="Add option" onclick="createNewElement();" />
                                </div>

                                <div id="newElementId">Options:</div>
                                {{-- <span>@error('question'){{$message}} @enderror</span> --}}

                            </div>
                            <div class="form-inline">
                                <label class="sr-only" for="inlineFormInputGroupUsername2">Image</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="file" name="image" value="{{ old('image') }}"
                                        class="form-control">
                                    {{-- <span>@error('image'){{$message}} @enderror</span> --}}

                                </div>
                                {{-- <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label> --}}
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Time</div>
                                    </div>
                                    <input type="text" class="form-control"
                                        value="{{old('time')}}@if($result){{ $result->time }}@endif"
                                        name="time" id="inlineFormInputGroupUsername2" placeholder="time">
                                    <span>
                                        @error('time')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <label class="sr-only" for="inlineFormInputGroupUsername2">Right Amswer</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Time format</div>
                                    </div>
                                    <select name="time_format" value="{{ old('time_format') }}" id="newselectopt">
                                        <span>
                                            @error('time_format')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                        {{-- <option value="0"
                                            @if ($result) @if ($result->time_format == 0) selected @endif
                                            @endif>None</option> --}}
                                        <option value="1"
                                            @if ($result) @if ($result->time_format == 2) selected @endif
                                            @endif>Sec</option>
                                        {{-- <option value="2"
                                            @if ($result) @if ($result->time_format == 1) selected @endif
                                            @endif>Min</option> --}}

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="question">Right Answer: <small>1,2...</small></label>
                                <input type="text" placeholder="sa" class="form-control form-control-sm"
                                    value="@if ($result) {{ $result->answer }}@else {{ old('rightans') }} @endif"
                                    name="rightans">
                                <span>
                                    @error('rightans')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit" id="q_submit" class="btn bg-success">
                                Submit
                            </button>
                            {{-- {{$no_of_questions}} --}}
                        </form>
                        <div class="container">
                            <br>
                            <h2>Questions table :</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl no :</th>
                                        <th>Questions</th>
                                        <th>Time</th>
                                        <th>Time-Format</th>
                                        <th>Options</th>
                                        <th>Answers</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach ($no_of_questions as $p)
                                        @php $opt = json_decode($p['options']); @endphp
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $p['question'] }}</td>
                                            <td>{{ $p['time'] }}</td>
                                            <td>{{ $p['time_format'] }}</td>
                                            <td>
                                                @php $counts = 1; @endphp
                                                @foreach ($opt as $o)
                                                    {{ $counts++ }}: {{ $o }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $p['answer'] }}</td>
                                            <td>
                                                <i class=" fa-2x text-gray-300"><a
                                                        href="{{ url('editquestion/' . enc($exam_id) . '/' . enc($p['id'])) }}"><button
                                                            type="button" class="btn btn-dark">Edit</button></a></i>
                                            </td>
                                            <td>
                                                <i class=" fa-2x text-gray-300"><a class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')"
                                                        href="{{ url('deletequestion/' . $p['id']) }}">Delete</a></i>
                                                {{-- <i class=" fa-2x text-gray-300"><a href="{{url('deletequestion/'.$p['id'])}}"><button type="button" class="btn btn-dark">Delete</button></a></i> --}}
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>



                        <!--page end -->

                    </div>
                    <!-- /.container-fluid -->

                    <!-- End of main Content Area -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
    <script src="{{ url('/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('/') }}/js/sb-admin-2.min.js"></script>





    ques
    <script>
        let end_option = @json($last_option);
        let total_questions = @json($total_questions);
        let no_of_questions = @json($no_of_questions);
        let result = @json($result);
        console.log(result);

        if (no_of_questions >= total_questions) {
            document.getElementById("q_submit").disabled = true;
        }
        let option_no = 0;
        if (result == false) {
            option_no = end_option;
        } else {
            option_no = end_option;
        }

        function createNewElement() {

            option_no++;
            var txtNewInputBox = document.createElement('div');
            txtNewInputBox.innerHTML = "<input class='form-control form-control-sm mb-1 option' name='option_" + option_no +
                "' value='{{ old('option_"+option_no+"') }}' type='text' id='option_" + option_no + "'>";
            document.getElementById("newElementId").appendChild(txtNewInputBox);
            var last = option_no;
            console.log(last);
            document.getElementById("last_value").value = last;

        }
    </script>
</body>

</html>
