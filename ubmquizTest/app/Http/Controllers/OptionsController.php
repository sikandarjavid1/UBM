<?php

namespace App\Http\Controllers;

use App\Models\options;
use App\Models\questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OptionsController extends Controller
{

    public  function index()
    {
        return view('Dashboard.admin.question_options.index');
    }

    public function fetchoptions()
    {
        $options = options::with('question')->get();

        return response()->json([
            'options'=>$options,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_id'=> 'required',
            'option1'=>'required',
            'weight1'=>'required',
            'option2' => 'required',
            'weight2' => 'required',
            'option3' => 'required',
            'weight3' => 'required',
            'option4' => 'required',
            'weight4' => 'required',
            'option5' => 'required',
            'weight5' => 'required',

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
            $op = new options;
            $op->option = $request->input('option1');
            $op->weight = $request->input('weight1');
            $op->question_id = $request->input('question_id');

            $op->save();
            $op1 = new options;
            $op1->option = $request->input('option2');
            $op1->weight = $request->input('weight2');
            $op1->question_id = $request->input('question_id');

            $op1->save();
            $op2 = new options;
            $op2->option = $request->input('option3');
            $op2->weight = $request->input('weight3');
            $op2->question_id = $request->input('question_id');

            $op2->save();
            $op3 = new options;
            $op3->option = $request->input('option4');
            $op3->weight = $request->input('weight4');
            $op3->question_id = $request->input('question_id');
            $op3->save();
            $op4 = new options;
            $op4->option = $request->input('option5');
            $op4->weight = $request->input('weight5');
            $op4->question_id = $request->input('question_id');
            $op4->save();
            return response()->json([
                'status'=>200,
                'message'=>'Options Added Successfully.'
            ]);
        }

    }
    public function edit($id)
    {
        //$que = questions::find($id);
        $op = options::with('question')->find($id);

        if($op)
        {
            return response()->json([
                'status'=>200,
                'op'=> $op,
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
            'question_id'=> 'required',
            'weight'=> 'required',
            'option'=> 'required',
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
            $op = options::find($id);
            if($op)
            {
                $op->question_id = $request->input('question_id');
                $op->weight = $request->input('weight');
                $op->option = $request->input('option');


                $op->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Option Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Option Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $que =options::find($id);
        if($que)
        {
            $que->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Option Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Option Found.'
            ]);
        }
    }
}
