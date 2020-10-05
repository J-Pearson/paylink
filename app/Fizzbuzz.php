<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fizzbuzz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "first", "last", "results"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "results" => "array",
    ];

    public function calculateFizzBuzz($first, $last) {

        $results = [];

        for ($i = $first; $i <= $last; $i++) {

            // If a multiple of 3 and 5
            if($this->isFizzBuzz($i)) {
                $results[] = 'FizzBuzz';
                // If a multiple of 3
            } else if($this->isFizz($i)) {
                $results[] = 'Fizz';
                // If a multiple of 5
            } else if($this->isBuzz($i)) {
                $rresults[] = 'Buzz';
            } else {
                $results[] = (string)$i;
            }
        }

        // Set return assignments
        $this->first   = $first;
        $this->last    = $last;
        $this->results = $results;

    }

    private function isFizzBuzz($number) {
        return ($this->isFizz($number) && $this->isBuzz($number));
    }

    private function isFizz($number) {
        return $number % 3 == 0;
    }

    private function isBuzz($number) {
        
        return $number % 5 == 0;
    }
}
