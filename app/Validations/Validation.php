<?php

namespace App\Validations;
use Validator;
use Illuminate\Http\Request;

class Validation
{
    public static function validateArticleRequest($request)
    {
        $validator = Validator::make($request->all(),[
        'title' => 'required',
        'body' => 'required',
        ]);
        
    	if ($validator -> fails()){
    		return response()->json(
    			[
    				"status"=>"400",
    				"message"=>"Do not leave blank"
    			],400);
    	} 
    }
}