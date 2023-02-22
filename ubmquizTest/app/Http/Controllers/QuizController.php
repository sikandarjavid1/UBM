<?php

namespace App\Http\Controllers;
use App\Models\options;
use App\Models\question_category;
use App\Models\questions;
use App\Models\result_answers;
use App\Models\results;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class QuizController extends Controller
{
    public  function index()
    {
        return view('quiz.index');
    }
    public  function pdfresult($user_id)
    {
        $user = results::where('user_id',$user_id)->orderBy('created_at','DESC')->first();
        $user_result = result_answers::where('quiz_id',$user->id)->with(['question','options','quizresult','category'])->get()->toArray();
        $number = $user->user_id;
        $date = $user->created_at;
        $originalDate = $date;
        $newDate = date("d-m-Y", strtotime($originalDate));
        $dompdf =PDF::loadView('quiz.resultpdf',['data'=>$user_result]);
        $path = 'results/quizresult'.$number.$newDate.'.pdf';
        $dompdf->save(public_path('results/quizresult'.$number.$newDate.'.pdf'));

        $user->results_pdf = $path;
        $user->update();
        $mail =$this->sendmail($user->user_id,$user->results_pdf);


    }
    public function sendmail($user_id, $pdf){
        $user = User::where('id',$user_id)->first();
        $data["email"]=$user->email;
        $data["client_name"]=$user->first_name;
        $data["subject"]="Burnout Profile from UBM";

        try{
            Mail::send('Users.mails', $data, function($message)use($pdf, $data) {
                $message->to($data["email"], $data["client_name"])
                    ->subject($data["subject"])
                    ->attach($pdf);
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
//        if (Mail::failures()) {
//            $this->statusdesc  =   "Error sending mail";
//            $this->statuscode  =   "0";
//
//        }else{
//
//            $this->statusdesc  =   "Message sent Succesfully";
//            $this->statuscode  =   "1";
//        }
        return response()->json(compact('this'));
    }

    public function fetchquestions()
    {
        $questions = questions::with('questionOptions')->get();

        return response()->json([
            'questions'=>$questions,
        ]);
    }
    public function store(Request $request)
    {
        //echo $request;
        $userdata = $request->all();

        $validator = Validator::make($request->all(), [
            'user_data.f_name'=> 'required',
            'user_data.l_name'=> 'required',
            'user_data.gender'=> 'required',
            'user_data.email'=> 'required',
            'user_data.age'=> 'required',
            'user_data.occupation'=> 'required',
            'Answers.*.question_id'=>'required',
            'Answers.*.category_id'=>'required',
            'Answers.*.option_id'=>'required',



        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),

            ]);
        }

        else
        {
           $userdata = $request->all();
           $answers = $request->Answers;
            $user_id = '';
            $email_check = $userdata['user_data']['email'];
            $user = User::where('email',$email_check)->first();
            if($user)
            {
                $user_result = User::where('id',$user->id)->first();
                $user_id = $user_result->id;
                $result = new results;
                $result->user_id = $user_result->id;
                $result->results_pdf = "result";
                $result->save();
                //Saving Options Data
                $user_result = results::where('user_id',$user_id)->orderBy('created_at','DESC')->first();
                foreach ($answers as $key => $n) {
                    $ans = new result_answers;
                    $ans->quiz_id = $user_result->id;
                    $ans->question_id = $n['question_id'];
                    $ans->category_id = $n['category_id'];
                    $ans->options_id = $n['option_id'];
                    $ans->save();
                }
            }
            else {

                $user = new User;
                //Saving User Data
                $user->first_name = $userdata['user_data']['f_name'];
                $user->last_name = $userdata['user_data']['l_name'];
                $user->gender = $userdata['user_data']['gender'];
                $user->age = $userdata['user_data']['age'];
                $user->occupation = $userdata['user_data']['occupation'];
                $user->email = $userdata['user_data']['email'];

                $user->role_id = '1';
                $user->save();

                //Saving Result Data
                $user_result = User::where('email', $email_check)->first();
                $user_id = $user_result->id;
                $result = new results;
                $result->user_id = $user_id;
                $result->results_pdf = "result";
                $result->save();
                //Saving Options Data
                $user_result = results::where('user_id', $user_id)->orderBy('created_at', 'DESC')->first();
                foreach ($answers as $key => $n) {
                    $ans = new result_answers;
                    $ans->quiz_id = $user_result->id;
                    $ans->question_id = $n['question_id'];
                    $ans->category_id = $n['category_id'];
                    $ans->options_id = $n['option_id'];
                    $ans->save();

                }
            }

              $user_data= $this->pdfresult($user_id);
            return response()->json([
                'status'=>200,
                'message'=>'Data Saved Successfully.',
              'ans'=>$user_data,
            ]);


        }



    }
}
