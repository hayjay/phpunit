<?php 
/**
 * 
 */
class UserTest extends \PHPUnit\Framework\TestCase
{
	//the goal of this function is to test if we can actually get the user firstname the user set which the result will be the result the user set initially
	public function testThatWeCanGetTheFirstName()
	{
		//istantiate the User model
		$user = new \App\Models\User;

		$user->setFirstName('Billy');

		//calling the assert equals function which takes two params here first is the function we expect the result from and the second parameter is the test case which we expect
		$this->assertEquals($user->getFirstName(), 'Billy');
	}
}
 ?>