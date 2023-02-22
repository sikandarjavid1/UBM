<?php

namespace App\Http\Controllers;

use App\Models\question_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionCategoryController extends Controller
{
    public  function index()
    {
        return view('Dashboard.admin.questions_category.index');
    }
    public function fetchqcategory()
    {
        $q_category = question_category::all();
        return response()->json([
            'question_category'=>$q_category,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name'=> 'required|max:191',

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
            $q_cat = new question_category;
            $q_cat->category_name = $request->input('category_name');
            $q_cat->save();
            return response()->json([
                'status'=>200,
                'message'=>'Category Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $q_cat = question_category::find($id);
        if($q_cat)
        {
            return response()->json([
                'status'=>200,
                'q_cat'=> $q_cat,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category Found Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_name'=> 'required|max:191',

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
            $q_cat = question_category::find($id);
            if($q_cat)
            {
                $q_cat->category_name = $request->input('category_name');

                $q_cat->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Category Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Category Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $q_cat =question_category::find($id);
        if($q_cat)
        {
            $q_cat->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Category Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category Found.'
            ]);
        }
    }
}
