<?php 
/**
 * 
 */
use App\Models\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
	//the goal of this function is to test if we can actually get the user firstname the user set which the result will be the result the user set initially
	public function testThatWeCanGetTheFirstName()
	{
		//istantiate the User model
		$user = new User;

		$user->setFirstName('Nurudeen');

		//calling the assert equals function which takes two params here first is the function we expect the result from and the second parameter is the test case which we expect
		$this->assertEquals($user->getFirstName(), 'Nurudeen');
	}

	public function testThatWeCanGetTheLastName()
	{
		$user = new User;

		$user->setLastName('Ajayi');

		$this->assertEquals($user->getLastName(), 'Ajayi');
	}

	public function testFullNameIsReturned()
	{
		$user = new User();

		$user->setFirstname('Nurudeen');

		$user->setLastName('Ajayi');

		//assert equals is what you use most when u r writing test
		//make my name as a sample case
		$this->assertEquals($user->getFullName(), 'Nurudeen Ajayi');
	}

	public function testFirstAndLastNameAreTrimmed()
	{
		$user = new User;
		$user->setFirstName(' Nurudeen  ');
		$user->setLastName('            Ajayi');

		$this->assertEquals($user->getFirstName(), 'Nurudeen');
		$this->assertEquals($user->getLastName(), 'Ajayi');
	}

	public function testEmailAddressCanBeSet()
	{
		$email = 'ajayinurudeen998@gmail.com';
		$user = new User;
		$user->setEmail($email);

		$this->assertEquals($user->getEmail(), $email);
	}

	public function testEmailVariableContainCorrectValues()
	{
		$user = new User;
		$user->setFirstName('Nurudeen');
		$user->setLastName('Ajayi');
		$user->setEmail('ajayinurudeen998@gmail.com');

		$emailVariables = $user->getEmailVariables();

		//checks if full_name key exists in the $emailVariables array to be declared in the getEmailVariables function
		$this->assertArrayHasKey('full_name', $emailVariables);
		//checks if email key exist in email variables array which is what we expect
		$this->assertArrayHasKey('email', $emailVariables);

		//expecting the first assertArrayHasKey to return Nurudeen Ajayi
		$this->assertEquals($emailVariables['full_name'], 'Nurudeen Ajayi');
		//expecting the first assertArrayHasKey to return ajayinurudeen998@gmail.com
		$this->assertEquals($emailVariables['email'], 'ajayinurudeen998@gmail.com');
	}
}
 ?>