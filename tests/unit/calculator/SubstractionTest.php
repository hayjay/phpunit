<?php 
	/**
	 * 
	 */
	class Substraction extends \PHPUnit\Framework\TestCase
	{
        /** @test */
        public function substractGivernOperands()
        {
            $substract = new \App\Calculator\Substract;
            $substract->setOperands([5, 3]);
            $this->assertEquals(2, $substract->calculate());
        }
    }
?>