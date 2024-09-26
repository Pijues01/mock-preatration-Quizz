<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $exam_name }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #eee;
        }

        label.radio {
            cursor: pointer;
            width: 1000px;
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.radio span {
            padding: 4px 0px;
            border: 1px solid red;
            display: inline-block;
            color: red;
            max-width: 80%;
            padding-inline: 10px;
            text-align: center;
            border-radius: 3px;
            margin-top: 7px;
            text-transform: uppercase;
        }

        label.radio input:checked+span {
            border-color: red;
            background-color: red;
            color: #fff;
        }

        .ans {
            margin-left: 36px !important;
        }

        .btn:focus {
            outline: 0 !important;
            box-shadow: none !important;
        }

        .btn:active {
            outline: 0 !important;
            box-shadow: none !important;
        }

        .question_title {
            width: calc(100% - 30px);
            justify-content: space-between;
        }
        .question_related_img {
            width: 50%;
            height: 200px;
            margin: auto;

        }
        .question_related_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


    </style>

</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10" id="exam_full">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>{{ $exam_name }}</h4>
                            <span>
                                <span>Total time : </span><span id="total_time">..</span> ( <span
                                    id="cq">..</span> of <span id="tq">..</span> )
                            </span>
                        </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">

                            <span class="d-flex question_title">
                                <span class="d-flex align-items-center">
                                    <h3 class="text-danger">Q.</h3>
                                <h5 class="mt-1 ml-2" id="q_name">..</h5>
                                </span>

                                <div><span>Q-Time :</span><span id="question_time">..</span></div>
                            </span>

                        </div>

                        <div class="question_related_img d-none" id="img-box" >
                            <img src="" alt="Image" id="dyimg" width="100%" height="">
                                <input type="hidden" id="qidbynew" value="">
                        </div>
                        <div id="option_list">
                            ...
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button onclick="pre()" id="btn-prv"
                            class="btn btn-primary d-flex align-items-center btn-danger invisible" type="button">
                            <i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;previous
                        </button>
                        <button onclick="nxt(this)" id="btn-nxt"
                            class="btn btn-primary border-success align-items-center btn-success " type="button">
                            Next<i class="fa fa-angle-right ml-2"></i>
                        </button>
                        <button onclick="nxt(this)" id="btn-fin"
                            class="btn btn-primary border-success align-items-center btn-success" type="button">
                            Save & Finish<i class="fa fa-angle-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> --}}

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- <div class="ans ml-2">
        <label class="radio"> <input type="radio" name="brazil" value="brazil">
            <span>Brazil</span>
        </label>
    </div> --}}
    <script language="javascript">
        let question = @json($question);
        let img_question = @json($img_question);
        // console.log(img_question);
        let q_length = Object.keys(question).length;
        let question_id = @json($question_id);
        let option = @json($option);
        let u_id = @json($u_id);
        let total_time = @json($total_time);
        let question_time = @json($question_time);
        let ans_ques = @json($ans_ques);
        console.log(ans_ques);
        let active_q = @json($active_q);
        let c_data = active_q;
        // console.log(c_data)
        let opt = '';
        let length = Object.keys(option[c_data]).length;
        let checkbox = @json($checkbox);
        // console.log(checkbox[c_data]);
        if (checkbox == 'false') {
            opt += "(Answer can be multiple.)";
            for (let i = 1; i <= length; i++) {
                opt +=
                    "<div class='ans ml-2'><label class='radio'><input type='checkbox' name='r_ans' onclick='r_ans_change_c(this)' value='" +
                    i + "'><span>" + option[c_data][i] + "</span></label></div>"
            }
        } else {
            for (let i = 1; i <= length; i++) {
                opt +=
                    "<div class='ans ml-2'><label class='radio'><input type='radio' name='r_ans' onclick='r_ans_change(this)' value='" +
                    i + "'><span>" + option[c_data][i] + "</span></label></div>"
            }
        }
        let right_ans_opt = '';
        // const split_string = right_ans_opt.split(" ");
        // console.log(split_string)

        $('#cq').text(c_data + 1);
        $('#tq').text(question.length);
        $('#q_name').text(question[c_data]);
        $('#question_time').text(question_time[c_data]);
        // console.log(question_time[c_data]);
        $('#option_list').html(opt);
        $('#total_time').text(total_time);
        $('#qidbynew').val(ans_ques[c_data]);
        // console.log(c_data);
        // if (c_data == 0) {
        //     document.getElementById("btn-prv").style.visibility = "hidden";
        //     document.getElementById("btn-prv").style.display = "none";
        // }
        if (c_data < question.length) {
            document.getElementById("btn-fin").style.visibility = "hidden";
            document.getElementById("btn-fin").style.display = "none";
        }

        // function pre() {
        //     if ((c_data) > 0) {
        //         c_data--;
        //         right_ans_opt = null;
        //         $('#cq').text(c_data + 1);
        //         $('#tq').text(question.length);
        //         $('#q_name').text(question[c_data]);
        //         $('#question_time').text(question_time[c_data]);
        //         $('#qidbynew').val(ans_ques[c_data]);
        //         opt = '';
        //         length = Object.keys(option[c_data]).length;
        //         // console.log(length);
        //         for (j = 1; j <= length; j++) {
        //             // console.log(j);
        //             opt += "<div class='ans ml-2'><label class='radio'><input type='radio' id ='"+j+"' name='r_ans' onclick='r_ans_change(this)' value='" + j + "'><span>" + option[c_data][j] + "</span></label></div>"
        //         }
        //         $('#option_list').html(opt);
        //         // console.log(c_data);

        //         if (c_data == 0) {
        //             document.getElementById("btn-prv").style.visibility = "hidden";
        //             document.getElementById("btn-prv").style.display = "none";
        //         } else {
        //             document.getElementById("btn-fin").style.visibility = "hidden";
        //             document.getElementById("btn-fin").style.display = "none";
        //             document.getElementById("btn-nxt").style.visibility = "visible";
        //             document.getElementById("btn-nxt").style.display = "block";
        //         }
        //     }
        // }

        function nxt(data) {
            // console.log('hello');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('update-ques') }}",
                data: {
                    'id': $('#qidbynew').val(),
                    'total_time': $('#total_time').text(),
                    'q_id': question_id[c_data],
                    'ans': right_ans_opt,
                    'c_ans': checkedvalues,
                    'd_time': question_time[c_data],
                    '_token': "{{ csrf_token() }}"

                },
                success: function(data) {
                    if (data) {
                        checkedvalues = []
                    }
                },
            });

            if ((c_data) < question.length - 1) {
                c_data++;
                right_ans_opt = null;
                $('#cq').text(c_data + 1);
                $('#tq').text(question.length);
                $('#q_name').text(question[c_data]);
                var img = (img_question[c_data]);
                if(img){
                    $('#img-box').removeClass('d-none');
                    document.getElementById('dyimg').src=window.location.origin+ '/image_question/'+img;
                }else{
                    $('#img-box').addClass('d-none');
                }
                console.log(img);
                $('#question_time').text(question_time[c_data]);
                $('#qidbynew').val(ans_ques[c_data]);

                // console.log(checkbox[c_data], c_data);
                if (c_data + 1 == q_length) {
                    document.getElementById("btn-nxt").style.visibility = "hidden";
                    document.getElementById("btn-nxt").style.display = "none";
                    document.getElementById("btn-fin").style.visibility = "visible";
                    document.getElementById("btn-fin").style.display = "block";
                } else {
                    document.getElementById("btn-fin").style.visibility = "hidden";
                    document.getElementById("btn-fin").style.display = "none";
                }
                // console.log(c_data);
                // console.log(q_length);
                opt = '';

                let length = Object.keys(option[c_data]).length;
                if (checkbox[c_data] == 'false') {
                    for (let k = 1; k <= length; k++) {
                        opt += "<div class='ans ml-2'>";
                        opt += "<label class='radio'>";
                        opt += "<input type='radio' name='r_ans' onclick='r_ans_change(this)' value='" + k + "'>";
                        opt += "<span>" + option[c_data][k] + "</span>";
                        opt += "</label>";
                        opt += "</div>";
                    }
                } else {
                    opt += "(Answer can be multiple.)";
                    for (let k = 1; k <= length; k++) {

                        opt += "<div class='ans ml-2'>";
                        opt += "<label class='radio'>";
                        opt += "<input type='checkbox' name='r_ans' onclick='r_ans_change_c(this)' value='" + k + "'>";
                        opt += "<span>" + option[c_data][k] + "</span>";
                        opt += "</label>";
                        opt += "</div>";
                    }
                }
                $('#option_list').html(opt);
                // if (c_data >= 1) {
                //     document.getElementById("btn-prv").style.visibility = "visible";
                // }
            }
            if (data.id == 'btn-fin') {
                window.location.href = "{{ route('endexam') }}";
            }
        }

        setInterval(() => {
            time_change();
            // q_time_change();
            if (question_time[c_data] > 0) {
                q_time_change();
            }
        }, 1000);


        function time_change() {
            total_time--;
            var seconds = total_time;
            // multiply by 1000 because Date() requires miliseconds
            var date = new Date(seconds * 1000);
            var hh = date.getUTCHours();
            var mm = date.getUTCMinutes();
            var ss = date.getSeconds();
            // If building a timestamp instead of a duration, you would uncomment the following line to get 12-hour (not 24) time
            // if (hh > 12) {hh = hh % 12;}
            // These lines ensure you have two-digits
            if (hh < 10) {
                hh = "0" + hh;
            }
            if (mm < 10) {
                mm = "0" + mm;
            }
            if (ss < 10) {
                ss = "0" + ss;
            }
            // This formats  string to HH:MM:SS
            var t = hh + ":" + mm + ":" + ss;
            // document.write(t);
            // console.log(t);



            if (total_time == 0) {
                alert("Exam Submitted..!");
                window.location = "{{ url('/endexam') }}";
            } else {
                $('#total_time').text(t);
            }
        }

        function q_time_change() {
            question_time[c_data]--;
            // console.log(question_time[c_data]);
            if (question_time[c_data] == 0) {
                nxt();
                // question_time[c_data]=
            } else {
                $('#question_time').text(question_time[c_data]);
            }
        }

        function r_ans_change(e) {
            right_ans_opt = e.value;
            console.log(right_ans_opt);
        }
        let checkedvalues = [];

        function r_ans_change_c(e) {
            if ($(e).is(':checked')) {
                checkedvalues.push(e.value);
            } else {
                let uncheckedvalue = e.value;
                checkedvalues.forEach(function(item) {
                    if (item == uncheckedvalue) {
                        let index = checkedvalues.indexOf(uncheckedvalue);
                        if (index > -1) {
                            checkedvalues.splice(index, 1);
                        }
                    }
                });
            }
            console.log(checkedvalues);
        }



        //back
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function() {
            window.history.go(1);
        };
    </script>
    <script>
        document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
    </script>
</body>

</html>
