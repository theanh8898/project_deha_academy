<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use App\Article;
use App\Validations\Validation;


class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function show($id)
    {
        $article=Article::find($id);
        if ($article == null){
        	return response()->json(
        		[
        			"status"=>"404",
        			"message"=>"Article in not exist"
        		],404
        	);
        } else {
        	return response($article,200);
        }

    }

    public function store(Request $request)
    {
        // Validation::validateArticleRequest($request);
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


        $article = Article::create($request->all());

        if($article != null){
        	return response()->json(
    			[
    				"article" => $article,
    				"status" => "200",
    				"message" => "create success"
    			], 200
    		);
        }      
    }



    public function update(Request $request, $id)
    {
    	$article=Article::find($id);

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

    	if ($article!=null){
    		$article->update($request->all());
    		return response()->json(
    			[
    				"article" => $article,
    				"status" => "200",
    				"message" => "update success"
    			], 200
    		);
    	} else {
    		return response()->json(
    			[
    				"status" => "404",
    				"message" => "Article is not exist"
    			],404
    		);
    	}

    
        
    }

    public function update1(Request $request, $id)
    {
    	$article=Article::find($id);

    	$validator = Validator::make($request->all(),[
        'title' => 'min:2',
        'body' => 'min:2',
        ]);
        
    	if ($validator -> fails()){
    		return response()->json(
    			[
    				"article"=>$article,
    				"status"=>"400",
    				"message"=>"Nhap tren 2 ky tu"
    			],400);
    	}

    	if ($article!=null){
    		$article->update($request->only('title','body'));
    		return response()->json(
    			[
    				"status" => "200",
    				"message" => "update success"
    			], 200
    		);
    	} else {
    		return response()->json(
    			[
    				"status" => "404",
    				"message" => "Article is not exist"
    			],404
    		);
    	}
        
    }

    public function delete($id)
    {
    	$article=Article::find($id);
    	if ($article!=null){
    		$article->delete();
    		return response()->json(
    			[
    				"status" => "200",
    				"message" => "Delete success"
    			], 200
    		);
    	} else {
    		return response()->json(
    			[
    				"status" => "404",
    				"message" => "Article is not exist"
    			],404
    		);
    	}
    }
}
