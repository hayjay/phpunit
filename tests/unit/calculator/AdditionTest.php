<?php 
	/**
	 * 
	 */
	class AdditionTest extends \PHPUnit\Framework\TestCase
	{
		//     				OUR GOAL
		/** $addition = new Addition;

		 $addition->setOperands([5, 10]);//15

		 $division = new Division;
		 $division->setOperands([100, 2]);//50

		 $calculator = new Calculator;
		 $calculator->setOperations([$addition, $division]);// [15, 50]
		*/


		 /** @test */
		 public function addsUpGivenOperands()
		 {
		 	$addition = new \App\Calculator\Addition;

		 	$addition->setOperands([3, 2]);

		 	$this->assertEquals(5, $addition->calculate());
		 }

		 /** @test */
		 public function no_operands_given_throws_exception_when_calculating()
		 {

			//this function is the exception we are expecting to see when no operand is passed
			 //Exceptions folder and NoOperandsException class must exist  inside Calculator folder
			$this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

			//test below
			$addition = new \App\Calculator\Addition;
			$addition->calculate();
		 }
	}
?>