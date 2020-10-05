<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fibonacci extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       "results"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "results" => "array",
    ];

    // Create start number, every sequence contains these
    private $sequence = [0, 1];

    public function calculateFibonacci($nth) {
        $this->generate($nth);

        return $this->results = $this->sequence;
    }

    public function generate($nth) {

        if(!isset($this->sequence[$nth])) {
            // This recursively creates the next number. It is a O^n type function which means that the function gets called twice and has to calculate every time, as n gets bigger, it takes more time
            return $this->sequence[$nth] = $this->generate($nth - 1) + $this->generate($nth - 2);
        }
        return $this->sequence[$nth];
    }
}
