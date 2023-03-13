<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'prep_time' => 'required',
            'difficulty' => 'required',
            'vegetarian' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }

        $insert = Recipe::create([
            'name' => $request->name,
            'prep_time' => $request->prep_time,
            'difficulty' => $request->difficulty,
            'vegetarian' => $request->vegetarian,
           
        ]);
        if ($insert) {
            return ['code' => 200, 'message' => 'Recipe added successfully'];
        } else {
            return ['code' => 401, 'message' => 'Something went wrong'];
        }
    }
    public function select()
    {
        $select = Recipe::get();
        
        return $select;
    }
    public function selectbyid($id){
        $select = Recipe::where('id','=',$id)->get();
        if(count($select>0)){
            return $select;    

        }
        else{
            return ['code' => 401, 'message' => 'no result'];

        }
    }
    public function update($id)
    {
        // $validator = Validator::make(request()->all(), [
        //     'name' => 'required',
        //     'prepe_time' => 'required',
        //     'difficulty' => 'required',
        //     'vegetarian' => 'required',
          
        // ]);

        // if ($validator->fails()) {
        //     return ['code' => 401, 'message' => 'invalid credentials'];
        // }

        $update = Recipe::where('id', '=', $id)->update([
            'name' => $request->name,
            'prepe_time' => $request->prepe_time,
            'difficulty' => $request->difficulty,
            'vegetarian' => $request->vegetarian,
        ]);
        if ($update) {
            return ['code' => 200, 'message' => 'Updated'];
        } else {
            return ['code' => 401, 'message' => 'Something went wrong'];
        }
    }

    public function delete($id)
    {
        $delete = Recipe::where('id', '=', $id)->delete();
        if ($delete) {
            return ['code' => 200, 'message' => 'Deleted'];
        } else {
            return ['code' => 401, 'message' => 'Something went wrong'];
        }
    }
}
