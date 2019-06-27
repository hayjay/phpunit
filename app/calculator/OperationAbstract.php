<?php 
namespace App\Calculator;

abstract class OperationAbstract
    {
    protected $operands;

    //this function takes in an array of operands
    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}

?>