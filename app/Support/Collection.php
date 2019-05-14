<?php 

namespace App\Support;

use ArrayIterator;

class Collection implements \IteratorAggregate {

	protected $items = [];

	//instantiate constructors parameter to empty because any other function could call this class
	//without passing any parameter.. just to avoid erros/bugs
	public function __construct(array $items = [])
	{
		//set the array to the items property
		$this->items = $items;
	}

	//returns all ittems passed into this class whenever instantiated by another class/function

	public function get()
	{
		return $this->items;
	}

	public function count()
	{
		return count($this->items);
	}


	//our interface requires this function to work
	public function getIterator()
	{
		return new ArrayIterator($this->items);
	}

	public function add(array $items)
	{
		//adding two arrays together..
		$this->items = array_merge($this->items, $items);
	}

	//pass collection parameter because we always expect a collection to be passed in to this function
	public function merge(Collection $collection)
	{
		// return $this->add($collection->get());
		return new Collection(array_merge($this->get(), $collection->get()));
	}
}
 ?>
