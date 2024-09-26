<!doctype html>
<html lang="en">

<head>
    <title>Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
.top_bar {
    display: flex;
    gap: 30px;
    justify-content: space-between;
}

        .row {
            justify-content: center
        }

        .shadow_area {
            box-shadow: 6px 7px 15px 3px rgb(191 189 189 / 50%);
        }
    </style>
</head>

<body>

    <div class="container m-6">
        <div class="row">
            <div class="col-sm-8">
                <div class="shadow_area" style="background: #000; color: #fff; padding: 5px 15px">
                    @php

                        $counter = 0;
                        foreach ($result as $p) {
                            if ($counter == 1) {
                                break;
                            }
                            $exam_name = $p->exam_name . "\n";
                            $visible_marks = $p->visible_marks;
                            $visible_answer = $p->visible_answer;
                            $counter++;
                        }
                        $n = 0;
                        $total_ques = count($result);
                        foreach ($result as $value) {
                            // echo $value->visible_marks;
                            // echo "<br>";
                            // echo $value->u_answer;
                            if ($value->r_answer == $value->u_answer) {
                                $n++;
                            }
                        }
                        $user_id = $exam_id->stu_id;
                        // dd($user_id);
                        // echo $visible_answer;
                    @endphp
                    <span>
                        <h3>Exam Name: {{ $exam_name }}</h3>
                    </span>
                    <span>
                        @php
                            $marks = (100 * $n) / $total_ques;
                        @endphp
                        @if ($visible_marks == 1)
                            <h5>Marks : {{ $marks }}%</h5>
                    </span>
                    @php
                        if ($marks >= 90) {
                            $grade = 'A+';
                        } elseif ($marks >= 80) {
                            $grade = 'A';
                        } elseif ($marks >= 70) {
                            $grade = 'B+';
                        } elseif ($marks >= 60) {
                            $grade = 'B';
                        } elseif ($marks >= 50) {
                            $grade = 'C+';
                        } elseif ($marks >= 40) {
                            $grade = 'C';
                        } else {
                            $grade = 'F';
                        }
                    @endphp
                    <span>Grade : {{ $grade }} </span>
                    <span>
                        <h5>Right Ans: {{ $n }}</h5>
                    </span>
                @else
                    <h1>Thank You...!</h1>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="shadow_area" style="padding: 15px">
                    @foreach ($result as $p)
                        <div class="box">
                            {{-- <pre> --}}
                            {{-- {{print_r($p);}} --}}
                            {{-- <h5> {{ $p->question }}</h5> --}}
                            @if ($visible_answer == 1)
                                <div class="top_bar">
                                    @php
                                        $time = $p->t_time;
                                        $timeInSeconds = strtotime($time) - strtotime('TODAY');
                                        //  echo $timeInSeconds;
                                    @endphp
                                        <h5>Question :{{ $p->question }}</h5>
                                    <span style="display: inline-block; min-width: 80px">
                                        <h5>Time: {{ $timeInSeconds - $p->d_time }}</h5>
                                    </span>
                                </div>

                                <div class="opt">
                                    @php
                                        $length = (array)json_decode($p->options);
                                        $check_ans = (explode(",",$p->r_answer));
                                        $u_check_ans = explode(",",$p->u_answer);
                                    @endphp
                                    @for ($il = 1; $il <= count($length); $il++)
                                        @php
                                            if(strlen($p->r_answer) > 1){
                                                if(in_array($il,$check_ans)){
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-success">'.$length[$il] .'</button>';
                                                }elseif(in_array($il,$u_check_ans)){
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-danger">'.$length[$il] .'</button>';
                                                }else{
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-outline-info">'.$length[$il] .'</button>';
                                                }
                                            }else{
                                                if ($p->r_answer == $il) {
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-success">'.$length[$il].'</button>';
                                                }elseif(strlen($p->u_answer) > 1){
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-outline-info">'.$length[$il] .'</button>';
                                                }elseif ($p->u_answer == $il) {
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-danger">'.$length[$il] .'</button>';
                                                } else {
                                                    echo'<button type="button" class="btn btn-sm m-1 btn-outline-info">'.$length[$il].'</button>';
                                                }
                                            }

                                        @endphp

                                    @endfor

                                </div>

                        </div>
                        <hr>
                    @endif
                    @endforeach
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="shadow_area text-center" style="padding: 15px">
                    <i class=" fa-2x text-gray-300"><a href="@if(Session::has('this_url')){{url('logoutuser/')}} @elseif($eid == NULL){{ URL::previous()}}@else{{url('home/'.enc($user_id))}}@endif"><button type="button" class="btn btn-dark">Okay</button></a></i>
                </div>
            </div>
        </div>





        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script>
            window.history.pushState(null, null, window.location.href);
        window.onpopstate = function() {
            window.history.go(1);
        };

        </script>
</body>

</html>
