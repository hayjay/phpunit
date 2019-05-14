<?php 
	//this test class is based on collection class we wana run a test on
	class CollectionTest extends \PHPUnit\Framework\TestCase
	{
		/** @test */
		public function emptyInstantiatedCollectionReturnsNoItem()
		{
			$collection = new \App\Support\Collection;

			$this->assertEmpty($collection->get());
		}
	}
 ?>