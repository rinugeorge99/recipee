<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Rating;

use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'recipe_id' => 'required',
            'rating' => 'required',
            
        ]);

        // if ($validator->fails()) {
        //     return ['code' => 401, 'message' => 'invalid credentials'];
        // }
        if (!$validator->passes()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }
$select=Recipe::where('id','=',$request->recipe_id)->get();
if(count($select)>0){
    $insert = Rating::create([
        'recipe_id' => $request->recipe_id,
        'rating' => $request->rating,
        
    ]);
    if ($insert) {
        return ['code' => 200, 'message' => 'Rated'];
    } else {
        return ['code' => 401, 'message' => 'Something went wrong'];
    }
}else{
    return ['code' => 402, 'message' => 'recipe not found'];

}
        
    }
   
}
