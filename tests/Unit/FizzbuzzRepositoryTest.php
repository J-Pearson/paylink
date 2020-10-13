<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FizzbuzzRepositoryTest extends TestCase
{
    /** @test */
    public function it_has_fizzbuzz_repository_class() {
		$this->assertTrue(class_exists(\App\Repositories\FizzbuzzRepository::class));
    }

    /** @test */
    public function it_can_calculate_fizzbuzz() {

    	$test_array = [
			"first" => 1,              
			"last" => 10,              
			"results" => [   
				0 => "1",                
				1 => "2",               
				2 => "Fizz",             
				3 => "4",                
				4 => "Buzz",             
				5 => "Fizz",             
				6 => "7",                
				7 => "8",                
				8 => "Fizz",             
				9 => "Buzz",             
			]
		];                                        

    	$first = 1;
    	$last = 10;

    	$fizzbuzz = new \App\Repositories\FizzbuzzRepository();
        $fizzbuzz->calculateFizzBuzz($first, $last);

        $this->assertTrue($fizzbuzz->model->toArray() == $test_array);
    }
}
