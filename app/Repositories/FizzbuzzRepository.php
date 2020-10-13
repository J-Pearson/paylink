<?php

namespace App\Repositories;

use App\Fizzbuzz;

class FizzbuzzRepository {

    public function __construct() {
        $this->model = new Fizzbuzz();
    }
	
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
                $results[] = 'Buzz';
            } else {
                $results[] = (string)$i;
            }
        }

        // Set return assignments
        $this->model->first   = $first;
        $this->model->last    = $last;
        $this->model->results = $results;

        return $this->model;
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