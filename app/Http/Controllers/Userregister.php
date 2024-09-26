<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use App\Models\CreateExam;
use App\Models\Question;
use App\Models\Useranswer;
use App\Models\Userquestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\For_;


class Userregister extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('user.register');
    }
    public function register(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        $data = new Userinfo;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->save();
        $user = Userinfo::where('email', $request->email)->first();
        if (isset($user->email)) {
            if (isset($user->password)) {
                $request->session()->put('userId', $user->id);
                if (Session::has('this_url')) {
                    return redirect(session('this_url'));
                }
                return redirect(url('home') . '/' . enc($user->id));
            } else {
                Session::flash('alert-danger', 'Please enter a valid email address');
                return back();
            }
        } else {
            Session::flash('alert-danger', 'Password is weak.');
        }
    }
    public function userlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $user = Userinfo::where('email', $request->email)->first();
        if ($user->email) {
            if ($user->password == $request->password) {
                $request->session()->put('userId', $user->id);
                if (Session::has('this_url')) {
                    return redirect(session('this_url'));
                } else {
                    return redirect(url('home') . '/' . enc($user->id));
                }
            } else {
                Session::flash('alert-danger', 'Email is Wrong');

                return back();
            }
        } else {
            Session::flash('message', "Special message goes here");
            return back();
        }
    }
    public function home()
    {
        // dd(session());
        if (Session::has('userId')) {
            $eid = session()->get('userId');
            $examdetails = CreateExam::where('public', '1')->where('active', '1')->where('end_date_time', '>', date('Y-m-d H:i:s'))->get();
            $userdetails = Userinfo::where('id', $eid)->get();
            // dd($userdetails);
            return View('user.home1', compact('examdetails', 'userdetails'));
        } else {
            return redirect(url('/'));
        }
    }
    public function startexam($exam_id)
    {
        $exam_id = enc($exam_id);
        $created_exam = Useranswer::where('exam_id', $exam_id)->get();
        $has_exam = CreateExam::where('id', $exam_id)->get();
        $has_exam_no = $has_exam[0]['no_student'];
        if (count($created_exam) < $has_exam_no) {
            if (Session::has('userId')) {
                $date = date('h:i:s');
                $user_id = session()->get('userId');
                $question = [];
                $img_question = [];
                $question_time = [];
                $question_id = [];
                $u_id = [];
                $checkbox = [];
                $ans_ques = session()->get('q_id_array');
                $count = 0;


                $result = Question::where('exam_id', $exam_id)->get();
                foreach ($result as $val) {
                    $answer = explode(',', $val->answer);
                    if (count($answer) > 1) {
                        $val->checkbox = 'true';
                    } else {
                        $val->checkbox = 'false';
                    }
                    $time = $val->time;
                    $parsed = date_parse($time);
                    $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
                    array_push($question_id, $val->id);
                    array_push($question, $val->question);
                    array_push($img_question, $val->Image_question);
                    array_push($u_id, $user_id);
                    array_push($question_time, $seconds);
                    array_push($checkbox, $val->checkbox);
                    $option[$count] = json_decode($val['options']);
                    $count++;
                }

                if (Session::has('new_e_id')) {
                    $ref_time = Useranswer::where('id', session()->get('new_e_id'))->first();
                    $examdetails = CreateExam::where('id', $exam_id)->first();
                    $exam_name = $examdetails->exam_name;
                    // $active_q_t = array_search(Userquestion::where('user_exam_info_id', session()->get('new_e_id'))->whereNull('sub_time')->first()->question_id,$question_id);
                    if ($ref_time->end_time) {
                        $total_time = (int)date('s', strtotime($ref_time->end_time));
                        $active_q = array_search(Userquestion::where('user_exam_info_id', session()->get('new_e_id'))->whereNull('sub_time')->first()->question_id, $question_id);
                        $active_q_t = Userquestion::latest()->first();
                    } else {
                        $total_time = $examdetails->duration;
                        $active_q = 0;
                    }
                }

                $data = compact('question', 'img_question', 'question_time', 'question_id', 'u_id', 'ans_ques', 'exam_name', 'total_time', 'option', 'active_q', 'checkbox');
                // dd($data);
                return view('user.exams')->with($data);
            } else {
                return redirect(url('/'));
            }
        } else {
            $pop_up = 1;
            return view('welcome')->with(compact('pop_up'));
        }
    }
    public function startinfo($exam_id)
    {
        $exam_id = enc($exam_id);
        if (Session::has('userId')) {
            $check = CreateExam::where('id', $exam_id)->first();
            $user_id = session()->get('userId');
            if ($check) {
                $ans_ques = [];
                $result = Question::where('exam_id', $exam_id)->get();

                if (Session::has('new_e_id') && Session::has('q_id_array')) {
                    return redirect(url('start-exam') . '/' . enc($exam_id));
                } else {
                    $user_exam = new Useranswer;
                    $user_exam->exam_id = $exam_id;
                    $user_exam->start_time = date('h:i:s');
                    $user_exam->end_time = NULL;
                    $user_exam->stu_id = $user_id;
                    if ($user_exam->save()) {
                        foreach ($result as $val) {
                            $ins_ques = new Userquestion;
                            $ins_ques->user_exam_info_id = $user_exam->id;
                            $ins_ques->question_id = $val->id;
                            $ins_ques->answer = null;
                            $ins_ques->sub_time = null;
                            $ins_ques->due_time = null;
                            $ins_ques->save();
                            array_push($ans_ques, $ins_ques->id);
                        }
                    }
                    session()->put('q_id_array', $ans_ques);
                    session()->put('new_e_id', $user_exam->id);
                    return redirect(url('start-exam') . '/' . enc($exam_id));
                }
            } else {
                return redirect(url('home') . '/' . $user_id);
            }
        } else {
            $this_url = url('/') . $_SERVER['PATH_INFO'];
            session()->put('this_url', $this_url);
            return redirect(url('/'));
        }
    }
    public function update_ques(Request $request)
    {
        if (Session::has('userId')) {
            $eid = session()->get('userId');
            $exam_tbl_id = Useranswer::where('stu_id', $eid)->orderBy('id', 'desc')->first();

            $ins1 = Useranswer::find($exam_tbl_id['id']);
            $ins1->end_time = $request->input('total_time');
            $ins1->save();

            $ins2 = Userquestion::find($request->input('id'));
            $ins2->user_exam_info_id = $exam_tbl_id['id'];
            $ins2->question_id = $request->input('q_id');
            if ($request->input('c_ans')) {
                $c_answer = $request->input('c_ans');
                $ins2->answer = implode(" , ", $c_answer);
            } else {
                $ins2->answer = $request->input('ans');
            }
            $ins2->sub_time = date('h:i:s');
            $ins2->due_time = $request->input('d_time');
            if ($ins2->save()) {
                return true;
            }
        } else {
            return redirect(url('/'));
        }
    }
    public function endexam($id = 0)
    {
        $id = enc($id);
        // Session()->forget('this_url');
        if ($id == 0) {
            $eid = NULL;
            $exam_id = Useranswer::where('id', $id)->first();
        } else {
            if (Session::has('userId')) {
                $eid = session()->get('userId');
                $exam_id = Useranswer::where('stu_id', $eid)->orderBy('id', 'desc')->first();
            } else {
                return redirect(url('/'));
            }
        }
        $result = DB::table('user_question_info as uqi')
            ->where('user_exam_info_id', $exam_id->id)
            ->join('questions as q', 'uqi.question_id', '=', 'q.id')
            ->join('create_exam as cx', 'cx.id', '=', 'q.exam_id')
            ->select('q.id', 'q.question', 'q.Image_question', 'q.time as t_time', 'q.options', 'q.answer as r_answer', 'uqi.answer as u_answer', 'uqi.due_time as d_time', 'cx.exam_name as exam_name', 'cx.marks as visible_marks', 'cx.answer as visible_answer')
            ->get();
        Session()->forget('q_id_array');
        if ($eid) {
            $n = 0;
            foreach ($result as $value) {
                if ($value->r_answer == $value->u_answer) {
                    $n++;
                }
            }
            $ins2 = Useranswer::where('stu_id', $eid)->orderBy('id', 'desc')->first();
            $ins2->right_ans = $n;
            $ins2->save();
        }
        return View('user.endexam', compact('result', 'exam_id', 'eid'));
    }
    public function logoutuser()
    {
        if (Session::has('userId')) {
            Session()->flush();
            return redirect(url('/'));
        } else {
            dd("true");
        }
    }
}
