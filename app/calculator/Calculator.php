<?php
namespace App\Calculator;

class Calculator
{
    protected $operations = [];
    
    public function setOperation(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    public function getOperations()
    {
        return $this->operations;
    }

    public function setOperations(array $operations)
    {
        // filtering out anything that isnt an instance of OperationInterface
        // foreach($operations as $key => $operation){
        //     if(!$operation instanceof OperationInterface){
        //         unset($operations[$key]);
        //     }
        // }

        //ALTERNATIVELY

        $filteredOperation = array_filter($operations, function ($operation) {
            if(!$operation instanceof OperationInterface){
                return false;
            }

            return true;
        });
        //merge passed in operations to the existing operations we have before
        $this->operations = array_merge($this->operations, $filteredOperation);
    }

    public function calculate()
    {
        return $this->operations[0]->calculate();
    }

}