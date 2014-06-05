<?php

namespace Test\TestStoreBundle\Tests\Entity;

use Test\TestStoreBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ValidatorFactory;

/**
* 
*/
class UserTest extends WebTestCase
{
	
	private $validator;
	private $user;

	private $testData = array(
				'firstname'    => 'ginger',
				'surname' => 'biggles',
				'email' => 'a@gmail.com',
				'password'   => 'AbIGsecret'
			);


	public function setup()
	{
		$this->user = new User();
		$this->user->fromArray($this->testData);

		//	Get the validator service
		$this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
	}



	/**
	 * Provide valid data to be tested
	 */
	public function testValidData()
	{
		$count = count($this->validator->validate($this->user));

		// Check the data is valid
		$this->assertEquals(0, $count);
	}


	/**
	 * Provide am invalid firstname
	 */
	public function testInvalidFirstname()
	{

		$this->user->setFirstname(33);
		
		// Check the data is valid
		$error = $this->validator->validate($this->user);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\User.firstname:\nThevalue33isnotavalidstring.", str_replace(' ', '', $error[0]->__toString()));
	}

	/**
	 * Provide am invalid surname
	*/
	public function testInvalidSurname()
	{

		$this->user->setSurname(33);
		
		// Check the data is valid
		$error = $this->validator->validate($this->user);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\User.surname:\nThevalue33isnotavalidstring.", str_replace(' ', '', $error[0]->__toString()));
	}

	/**
	 * Provide am invalid email
	*/
	public function testInvalidEmail()
	{

		$this->user->setEmail(33);
		
		// Check the data is valid
		$error = $this->validator->validate($this->user);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\User.email:\nThevaluedsuppliedmustbeavalidemailaddress", str_replace(' ', '', $error[0]->__toString()));
	}

	/**
	 * Provide am invalid password
	*/
	public function testInvalidPassword()
	{

		$this->user->setPassword(33);
		
		// Check the data is valid
		$error = $this->validator->validate($this->user);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\User.password:\nSuppliedpasswordmustbeatleast6charslong", str_replace(' ', '', $error[0]->__toString()));
	}
}