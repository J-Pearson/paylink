<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Fibonacci;
use App\Http\Resources\FibonacciResource;

use Exception;
use Log;

class FibonacciController extends Controller
{
     public function generate(Request $request) {
    	try {

    		//Attempt to validate the parameters
    		$validate = Validator::make($request->all(), [
    			'nth' => 'required|numeric',
    		]);

    		// Loop over failed validation messages and return as a clean array
    		if($validate->fails()) {

    			$errors = [];

    			foreach ($validate->errors()->all() as $message){
        			$errors[] = $message;
   				}

    			return response()->json($errors, 400);
    		}

            $fibonacci = new Fibonacci();
            $fibonacci->calculateFibonacci($request->nth);

            return new FibonacciResource($fibonacci);

    	} catch (Exception $e) {
    		return $e;
    	}
    }
}
