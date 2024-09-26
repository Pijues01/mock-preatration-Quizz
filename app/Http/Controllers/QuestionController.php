<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Post;
use App\Models\CreateExam;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function editquestiontodb($eid, $id)
    {
        $eid = enc($eid);
        $id = enc($id);
        if (Session::has('loginId')) {
            $exam_id = $eid;
            $total_questions = CreateExam::where('id', $eid)->first()->no_question;
            $no_of_questions = Question::where('exam_id', $eid)->get();
            $result = Question::where('id', $id)->first();
            $length = (array)json_decode($result->options);
            $last_option = count($length);
            $admin_array = Admin::where('id', session('loginId'))->get();
            $admin_name = $admin_array[0]['email'];
            return View('admin.addquestion', compact('no_of_questions', 'total_questions', 'exam_id', 'result', 'last_option', 'admin_name'));
        } else {
            return view("admin.login");
        }
    }
    public function addquestiontodb(Request $request)
    {
        // dd($request);
        if (Session::has('loginId')) {
            // dd($request->file());
            $request->validate([
                'question' => 'required',
                // 'Option_'.$i => 'required|min:1|max:500',
                // 'image' => 'required|min:1',
                'time' => 'required',
                'time_format' => 'required',
                'rightans' => 'required',
            ]);
            $opt = [];
            for ($i = 1; $i <= $request->input('last_opt'); $i++) {
                $option = 'option_'.$i;
                $opt[$i] = $request->input($option);
            }
            // dd($request,$opt);
            if ($request->file('image')) {
                $imagename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('image_question'), $imagename);
            } else {
                $imagename = NULL;
            }
            if ($request->input('id')) {
                $data = Question::find($request->input('id'));
                $data->question = $request->input('question');
                $data->Image_question = $imagename;
                $data->time = $request->input('time');
                $data->time_format = $request->input('time_format');
                $data->options = json_encode($opt);
                $data->answer = $request->input('rightans');
                $data->save();
            } else {
                $data = new Question();
                $data->question = $request->input('question');
                $data->Image_question = $imagename;
                $data->time = $request->input('time');
                $data->time_format = $request->input('time_format');
                $data->options = json_encode($opt);
                $data->answer = $request->input('rightans');
                $data->exam_id = $request->input('exam_id');
                $data->save();
            }
            return redirect()->back();
        } else {
            return view("admin.login");
        }
    }
    public function editquestion($id)
    {
        if (Session::has('loginId')) {
            return view('admin.edit');
            // dd($id);
        } else {
            return view("admin.login");
        }
    }
}
