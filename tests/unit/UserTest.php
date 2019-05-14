<?php 
/**
 * 
 */
use App\Models\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
	protected $user;

	//runs everytime php unit wants to run our test or runs before any time php unit wants to run our test

	//this setUp function helps avoid instantiation of the User model in every class
	public function setUp(): void
	{
		$this->user = new User;
	}

	//the goal of this function is to test if we can actually get the user firstname the user set which the result will be the result the user set initially
	public function testThatWeCanGetTheFirstName()
	{
		//istantiate the User model
		$this->user->setFirstName('Nurudeen');

		//calling the assert equals function which takes two params here first is the function we expect the result from and the second parameter is the test case which we expect
		$this->assertEquals($this->user->getFirstName(), 'Nurudeen');
	}

	public function testThatWeCanGetTheLastName()
	{

		$this->user->setLastName('Ajayi');

		$this->assertEquals($this->user->getLastName(), 'Ajayi');
	}

	public function testFullNameIsReturned()
	{
		$this->user->setFirstname('Nurudeen');

		$this->user->setLastName('Ajayi');

		//assert equals is what you use most when u r writing test
		//make my name as a sample case
		$this->assertEquals($this->user->getFullName(), 'Nurudeen Ajayi');
	}

	public function testFirstAndLastNameAreTrimmed()
	{
		$this->user->setFirstName(' Nurudeen  ');
		$this->user->setLastName('            Ajayi');

		$this->assertEquals($this->user->getFirstName(), 'Nurudeen');
		$this->assertEquals($this->user->getLastName(), 'Ajayi');
	}

	public function testEmailAddressCanBeSet()
	{
		$email = 'ajayinurudeen998@gmail.com';
		$this->user->setEmail($email);

		$this->assertEquals($this->user->getEmail(), $email);
	}

	public function testEmailVariableContainCorrectValues()
	{
		$this->user->setFirstName('Nurudeen');
		$this->user->setLastName('Ajayi');
		$this->user->setEmail('ajayinurudeen998@gmail.com');

		$emailVariables = $this->user->getEmailVariables();

		//checks if full_name key exists in the $emailVariables array to be declared in the getEmailVariables function
		$this->assertArrayHasKey('full_name', $emailVariables);
		//checks if email key exist in email variables array which is what we expect
		$this->assertArrayHasKey('email', $emailVariables);

		//expecting the first assertArrayHasKey to return Nurudeen Ajayi
		$this->assertEquals($emailVariables['full_name'], 'Nurudeen Ajayi');
		//expecting the first assertArrayHasKey to return ajayinurudeen998@gmail.com
		$this->assertEquals($emailVariables['email'], 'ajayinurudeen998@gmail.com');
	}

	public function testThatWeCanGetOtherName()
	{
		// $this->user->

		$this->user->setOtherName('Olawale');

		$this->assertEquals($this->user->getOtherName(), 'Olawale');
	}
}
 ?>