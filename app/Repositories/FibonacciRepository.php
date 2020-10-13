<?php

namespace App\Repositories;

use App\Fibonacci;

class FibonacciRepository {
     public function __construct() {
        $this->model = new Fibonacci();

        // Create start number, every sequence contains these
        $this->sequence = [0, 1];
    }

    public function calculateFibonacci($nth) {
        $this->generate($nth);

        // Set return assignments
        $this->model->results = $this->sequence;

        return $this->model;
    }

    public function generate($nth) {

        if(!isset($this->sequence[$nth])) {
            // This recursively creates the next number. It is a O^n type function which means that the function gets called twice and has to calculate every time, as n gets bigger, it takes more time
            return $this->sequence[$nth] = $this->generate($nth - 1) + $this->generate($nth - 2);
        }

        return $this->sequence[$nth];
    }
}