<?php
namespace App\Models;
/**
 * 
 */
class User
{
	public $first_name;
	public $last_name;

	//this function creates/set user firstname
	public function setFirstName($userFirstName)
	{
		//overrite the firstname property to the value passed in to this setFirstName function
		$this->first_name = trim($userFirstName);
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function setLastName($userLastName)
	{
		$this->last_name = trim($userLastName);
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getFullName()
	{
		// return properties
		return "$this->first_name $this->last_name";
	}
}

?>