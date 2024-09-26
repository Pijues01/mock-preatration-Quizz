@extends('user.layout.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Exam List</h1>
        {{-- <a href="{{route('showexam_table_view')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fa fa-list fa-sm text-white-50"></i> Table view</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        {{-- @php

                        $arx = [1,2,3];
                        @endphp --}}
        @foreach ($examdetails as $r)
        {{-- @php
                                if($r['public'] == 1){
                                    $status = "public";
                                }else{
                                    $status =  "Private";
                                }
                            @endphp --}}

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-sm-12 mr-2">
                            {{-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{$status}}
                        </div> --}}
                        {{-- {{($r['id'])}} --}}
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $r['exam_name'] }}
                        </div>
                        @php
                        $time = $r['duration'];
                        $time_result = ceil($time / 60);
                        $time_format = 'Minutes';
                        if ($time_result > 60) {
                        $time_result = ceil($time_result / 60);
                        $time_format = 'Hour';
                        }
                        @endphp
                        <div class="p mb-0 font-weight-bold text-gray-800">Duration
                            :{{ $time_result }} {{ $time_format }}</div>

                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Start date:{{ $r['start_date_time'] }}</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            End Date:{{ $r['end_date_time'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class=" fa-2x text-gray-300"><a
                                href="{{ url('start-info/' . enc($r['id'])) }}"><button
                                    type="button" id="fullscreenButton" class="btn btn-dark default-button">Start
                                    Exam</button></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
</div>
<!-- End of Content Wrapper -->

@endsection