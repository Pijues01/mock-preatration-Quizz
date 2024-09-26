<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CreateExam;
use App\Models\Useranswer;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminLogin extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }

    public function login()
    {
        if (Session::has('loginId')) {
            return redirect('dashboard');
        } else {
            return view("admin.login");
        }
    }
    public function setlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        // dd($admin);
        if ($admin->email) {
            if ($admin->password == $request->password) {
                $request->session()->put('loginId', $admin->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Email or Password not match');
                echo $request->password;
                echo $admin->password;
            }
        } else {
            return back()->with('fail', 'Email not registered');
        }
    }
    public function dashboard()
    {
        $allexam = CreateExam::orderBy('id', 'desc')->paginate(15);
        $public_exam = count(CreateExam::where('active', '1')->where('public', '1')->where('end_date_time', '>', date('Y-m-d H:i:s'))->get());
        $exam_count = count(CreateExam::get());
        $tresh_exam = $exam_count - $public_exam;
        $user_count = Userinfo::count();
        $total_exam = Useranswer::count();
        $allexamde = Useranswer::orderBy('id', 'DESC')
            ->get();
        $admin_array = Admin::where('id', session('loginId'))->get();
        $admin_name = $admin_array[0]['email'];
        return view('admin.admindash', compact('allexamde', 'allexam', 'public_exam', 'exam_count', 'user_count', 'total_exam', 'admin_name'));
    }
    public function examinfo($id)
    {
        $id = enc($id);
        // dd($id);
        $exm_details = DB::table('user_exam_info as uei')
            ->where('uei.exam_id', $id)
            ->join('user_info as ui', 'uei.stu_id', '=', 'ui.id')
            ->join('create_exam as c', 'uei.exam_id', '=', 'c.id')
            ->select('uei.id', 'uei.start_time', 'uei.end_time', 'uei.stu_id', 'uei.right_ans', 'ui.name', 'ui.email', 'c.no_question')
            ->paginate(15);

        return view('admin.examinfo', compact('exm_details'));
    }
    public function logout(Request $request)
    {

        if (Session::has('loginId')) {
            $request->session()->forget('loginId');

            return redirect('adminlogin');
        } else {
            dd("true");
        }
    }
    public function addexam()
    {


        if (Session::has('loginId')) {
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            return view('admin.addexam')->with(compact('admin_name'));
        } else {
            return view("admin.login");
        }
    }
    public function editexam($id)
    {
        $id = enc($id);
        if (Session::has('loginId')) {
            $title = 'Edit Exam';
            $result = CreateExam::where('id', $id)->first();
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            // dd($result);
            return view('admin.addexam')->with(compact('title', 'result','admin_name'));
        } else {
            return view("admin.login");
        }
    }
    public function examregister(Request $request)
    {
        if (Session::has('loginId')) {
            $request->validate([
                'examname' => 'required',
                'questionno' => 'required|min:1|max:500',
                'duration' => 'required|min:1',
                'percentage' => 'required|min:1',
                'startdatetime' => 'required',
                'enddatetime' => 'required',
                'studentno' => 'required|min:1',
            ]);
            if ($request->input('id')) {
                $exam = CreateExam::find($request->input('id'));
                $exam->exam_name = $request->examname;
                $exam->no_question = $request->questionno;
                $exam->duration = $request->duration;

                $exam->passing_percentage = $request->percentage;
                $exam->start_date_time = date("Y-m-d H:i:s", strtotime($request->startdatetime));
                $exam->end_date_time = date("Y-m-d H:i:s", strtotime($request->enddatetime));
                $exam->no_student = $request->studentno;
                $exam->marks = $request->mark ?? '0';
                $exam->answer = $request->answer ?? '0';
                $exam->public = $request->public ?? '0';
                $exam->save();
                return redirect(route('showexam'));
            } else {
                $exam = new CreateExam;
                $exam->exam_name = $request->examname;
                $exam->no_question = $request->questionno;
                $exam->duration = $request->duration;

                $exam->passing_percentage = $request->percentage;
                $exam->start_date_time = date("Y-m-d H:i:s", strtotime($request->startdatetime));
                $exam->end_date_time = date("Y-m-d H:i:s", strtotime($request->enddatetime));
                $exam->no_student = $request->studentno;
                $exam->marks = $request->mark ?? '0';
                $exam->answer = $request->answer ?? '0';
                $exam->public = $request->public ?? '0';
                $exam->save();
                return redirect(route('showexam'));
            }
        } else {
            return view("admin.login");
        }
    }
}
