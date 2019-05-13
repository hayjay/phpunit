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
		//
		$this->first_name = $userFirstName;
	}

	public function getFirstName()
	{
		return 'Billy';
	}
}

?>