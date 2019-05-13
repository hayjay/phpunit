<?php
namespace App\Models;
/**
 * 
 */
class User
{

	public $first_name;

	//this function creates/set user firstname
	public function setFirstName($userFirstName)
	{
		//overrite the firstname property to the value passed in to this setFirstName function
		$this->first_name = $userFirstName;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}
}

?>