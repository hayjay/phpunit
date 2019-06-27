<?php 
namespace App\Calculator;
use App\Calculator\Exceptions\NoOperandsException;
/**
 * 
 */
class Division extends OperationAbstract implements OperationInterface
{
	//make this an interface because other classes and methods may need it
	public function calculate()
	{
		if (empty($this->operands)) {
			throw new  NoOperandsException;
        }
        // $result = 0;
        // foreach($this->operands as $index => $operand) {
        //     if($index === 0){
        //         //set result to operand incase the first key is 0 so we can avoid division by zero error
        //         $result = $operand; 
        //         continue; //continue the loop
        //     }

        //     $result = $result / $operand;
        // }

        // return $result;

        // basically this function divide number in a list of numbers

        //returns division as we did above in the for loop 
        //it accepts what we want to divide (each operand) as a first  parameter and current and carry value as first and second parameter
        return array_reduce(array_filter($this->operands), function($a, $b){
            //array filter in php removes false, null or zero values..
            // so we need use array_filter on each of our operands 
            //before we start to reduce them in order 
            //to avoid a division by zero error
            if($a !== null && $b !== null) {
                return $a/$b;
            }
            return $b;
            
        }, null);

    }
}

 ?>