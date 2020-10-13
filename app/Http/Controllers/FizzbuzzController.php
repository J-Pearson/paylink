<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\FizzbuzzRepository;
use App\Http\Resources\FizzbuzzResource;

use Exception;
use Log;

class FizzbuzzController extends Controller
{
    public function generate(Request $request) {
    	try {

    		//Attempt to validate the parameters
    		$validate = Validator::make($request->all(), [
    			'first' => 'required|numeric|min:1|lt:last',
    			'last' 	=> 'required|numeric|gt:first'
    		]);

    		// Loop over failed validation messages and return as a clean array
    		if($validate->fails()) {

    			$errors = [];

    			foreach ($validate->errors()->all() as $message){
        			$errors[] = $message;
   				}

    			return response()->json($errors, 400);
    		}

    		// Make sure user input is can be casted to int
    		// We do this because Laravel numeric validation can pass a string or int
    		$first = (int) $request->first ? (int) $request->first : null;
    		$last  = (int) $request->last ? (int) $request->last : null;

    		if(!is_numeric($first) || !is_numeric($last)) {
    			return response()->json(['Please make sure that the first and last parameters are numeric']);
    		}

    		// Calculate Fizzbuzz
            $fizzbuzz = new FizzbuzzRepository();
            $fizzbuzz->calculateFizzBuzz($first, $last);

            // Return JSON Resource
            return new FizzbuzzResource($fizzbuzz->model);

    	} catch (Exception $e) {
    		return $e;
    	}
    }
}
