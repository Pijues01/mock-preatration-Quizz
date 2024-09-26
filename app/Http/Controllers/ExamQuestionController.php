<?php

namespace App\Http\Controllers;
// use DB;
use App\Models\CreateExam;
use App\Models\Question;
use App\Models\Admin;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ExamQuestionController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function showexam()
    {
        if (Session::has('loginId')) {
            $examdetails = CreateExam::where('public','1')->where('active', '1')->where('end_date_time','>',date('Y-m-d H:i:s'))->get();
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            return View('admin.showexam', compact('examdetails','admin_name'));
        } else {
            return view("admin.login");
        }
    }

    public function tableview()
    {
        if (Session::has('loginId')) {
            $examdetails = CreateExam::where('public','1')->where('active', '1')->where('end_date_time','>',date('Y-m-d H:i:s'))->get();
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            return View('admin.table_view', compact('examdetails','admin_name'));
        } else {
            return view("admin.login");
        }
    }

    public function showexamdetails()
    {
        if (Session::has('loginId')) {
            return CreateExam::all();
        } else {
            return view("admin.login");
        }
    }
    public function addquestion($id)
    {
        $id = enc($id);
        if (Session::has('loginId')) {
            $exam_id = $id;
            $total_questions = CreateExam::where('id', $id)->first()->no_question;
            $no_of_questions = Question::where('exam_id', $id)->get();
            $result = false;
            $last_option = 0;
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            return View('admin.addquestion', compact('no_of_questions', 'total_questions', 'exam_id', 'result', 'last_option','admin_name'));
        } else {
            return view("admin.login");
        }
    }
    public function deletequestion($id)
    {
        if (Session::has('loginId')) {
            $no_of_questions = Question::where('id', $id)->get()->all();
            DB::table('questions')->where('id', $id)->delete();
            return redirect()->back();
        } else {
            return view("admin.login");
        }
    }
    public function deleteexam($id)
    {
        if (Session::has('loginId')) {

            // DB::table('create_exam')->where('id', $id)->delete();

            $Q1 = CreateExam::find($id);
            $Q1->active = '0';
            $Q1->save();

            return redirect()->back();
        } else {
            return view("admin.login");
        }
    }
    public function editexam($id)
    {
        if (Session::has('loginId')) {

            $exam_id = $id;
            $no_of_questions = Question::where('exam_id', $id)->get()->all();
            return View('admin.delete', compact('no_of_questions', 'exam_id'));
        } else {
            return view("admin.login");
        }
    }
    public function trash()
    {
        $output = [];
        if (Session::has('loginId')) {
            $private_exam = CreateExam::where('public','0')->where('active','1')->where('end_date_time','>',date('Y-m-d H:i:s'))->get();
            $delete_exam = CreateExam::where('active','0')->get();
            $expire_exam = CreateExam::where('end_date_time','<',date('Y-m-d H:i:s'))->where('active','1')->get();
            // dd(date('Y-m-d H:i:s'));
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            return View('admin.trash', compact('delete_exam','expire_exam','private_exam','admin_name'));

        } else {
            return view("admin.login");
        }
    }
}
