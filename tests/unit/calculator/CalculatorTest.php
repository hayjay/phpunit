<?php 
	class CalculatorTest extends \PHPUnit\Framework\TestCase
	{
        /** @test */
        public function can_set_single_operation()
        {
            $addition = new \App\Calculator\Addition;
            $addition->setOperands([5, 10]);

            $calculator = new \App\Calculator\Calculator;
            $calculator->setOperation($addition); 

            $this->assertCount(1, $calculator->getOperations());
        }
        
        /** @test */
        public function can_set_multiple_operations()
        {
            $addition1 = new \App\Calculator\Addition;
            $addition1->setOperands([5, 10]);


            $addition2 = new \App\Calculator\Addition;
            $addition2->setOperands([12, 8]);


            $calculator = new \App\Calculator\Calculator;
            $calculator->setOperations([$addition1, $addition2]);

            $this->assertCount(2, $calculator->getOperations());
        }

        /** @test */
        public function operations_are_ignored_if_not_instance_of_operation_interface()
        {
            $addition = new \App\Calculator\Addition;
            $addition->setOperands([5, 10]);

            $calculator = new \App\Calculator\Calculator;
            $calculator->setOperations([$addition, 'cats', 'dogs']);

            $this->assertCount(1, $calculator->getOperations());
        }

        /** @test */
        public function can_calculate_result()
        {
            $addition = new \App\Calculator\Addition;
            $addition->setOperands([5, 10]);

            $calculator = new \App\Calculator\Calculator;
            $calculator->setOperations([$addition]);

            $this->assertEquals(15, $calculator->calculate());
 
        }

        /** @test */

        public function calculate_method_returns_multiple_results()
        {
            $addition = new \App\Calculator\Addition;
            $addition->setOperands([2, 8]); //10

            $division = new \App\Calculator\Division;
            $division->setOperands([50, 2]); //25

            $calculator = new \App\Calculator\Calculator;
            $calculator->setOperations([$addition, $division]);

            //make sure this test returns an array because we passed in multiple operations
            $this->assertInternalType('array', $calculator->calculate());
            //check if the first result returns addition
            $this->assetEquals(10, $calculator->calculate()[0]);
            //check if the first result returns divistion of the expected output (25)
            $this->assetEquals(25, $calculator->calculate()[1]);
        }
	}
?>