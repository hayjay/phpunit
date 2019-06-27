<?php

namespace App\Calculator;

//we need this interface because our calculate method is needed accross many functions
interface OperationInterface 
{
    public function calculate();
}