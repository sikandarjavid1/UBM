<?php

namespace App\Http\Controllers;

use App\Models\question_category;
use App\Models\questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public  function index()
    {
        return view('Dashboard.admin.questions.index');
    }
    public function fetchquestions()
    {
        $questions = questions::with('category')->orderBy('category_id','asc')->get();

        return response()->json([
            'questions'=>$questions,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question'=> 'required|max:191',
            'category_id'=>'required',
            'question_number'=>'required',


        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $que = new questions;
            $que->question = $request->input('question');
            $que->category_id = $request->input('category_id');
            $que->question_number = $request->input('question_number');


            $que->save();
            return response()->json([
                'status'=>200,
                'message'=>'Question Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        //$que = questions::find($id);
        $que = questions::with('category')->find($id);

        if($que)
        {
            return response()->json([
                'status'=>200,
                'que'=> $que,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Question Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question'=> 'required|max:191',
            'category_id'=> 'required',
            'question_number'=> 'required',

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $q = questions::find($id);
            if($q)
            {
                $q->question = $request->input('question');
                $q->category_id = $request->input('category_id');
                $q->question_number = $request->input('question_number');

                $q->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Question Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Question Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $que =questions::find($id);
        if($que)
        {
            $que->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Question Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Question Found.'
            ]);
        }
    }
}
