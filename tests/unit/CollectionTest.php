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

		/** @test */
		public function countIsCorrectForItemsPassedIn()
		{
			$collection = new \App\Support\Collection([
				'one', 'two', 'three'
			]);

			//first parameter is always what we are expecting..
			$this->assertEquals(3, $collection->count());
		}

		//indirectly, below function is used to test if a model or a collection has these values set in it
		/** @test */
		public function items_returned_match_items_passed_in()
		{
			//could be a way of testing a model
			$collection = new \App\Support\Collection([
				'one', 'two', 'three'
			]);

			$this->assertCount(3, $collection->get());

			$this->assertEquals($collection->get()[0], 'one');

			$this->assertEquals($collection->get()[1], 'two');
		}

		/** @test */
		public function collection_is_instance_of_iterator_aggregate()
		{
			$collection = new \App\Support\Collection();

			$this->assertInstanceOf(IteratorAggregate::class, $collection);
		}

		/** @test */
		public function collection_can_be_iterated()
		{
			$collection = new \App\Support\Collection([
				'one', 'two', 'three'
			]);

			$items = [];

			foreach ($collection as $item) {
				$items[] = $item;
			}

			$this->assertCount(3, $items);

			//specifically checking if this is an array iterator
			//make sure it sends an array iterator
			$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
		}

		/** @test*/

		public function checksIfTwoCollectionsContainsTheExpentedLengthOfParameters()
		{
			$collection1 = new \App\Support\Collection(['one', 'two', 'three']);

			$collection2 = new \App\Support\Collection(['four', 'five', 'six']);

			//merge both collection together
			$newCollection = $collection1->merge($collection2);

			//finally check if the merged collection length is upto 6
			$this->assertEquals(6, $collection1->count());

			$this->assertCount(6, $collection1->get());

		}


		/** @test */
		public function canAddToExistingCollection()
		{
			$collection = new \App\Support\Collection(['one', 'two']);
			$collection->add(['three']);

			$this->assertCount(3, $collection->get());
		}

		/** @test */
		public function returnsJsonEncodedItems()
		{
			$collection = new \App\Support\Collection([
				['username' => 'hayjay'],
				['username' => 'nurudeen'],
			]);

			$this->assertIsString('string', $collection->toJson());
			//assert an array of json output two objects
			$this->assertEquals('[{"username":"hayjay"},{"username":"nurudeen"}]', $collection->toJson());
		}

		/** @test */
		public function jsonEncodeACollectionObjectReturnsJson()
		{
			$collection = new \App\Support\Collection([
				['username' => 'hayjay'],
				['username' => 'nurudeen'],
			]);

			$encoded = json_encode($collection);

			$this->assertIsString('string', $encoded);
			$this->assertEquals('[{"username":"hayjay"},{"username":"nurudeen"}]', $encoded);
		}
	}
 ?>