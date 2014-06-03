<?php

namespace Test\TestStoreBundle\Tests\Entity;

use Test\TestStoreBundle\Entity\Personal;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ValidatorFactory;

/**
* 
*/
class PersonalTest extends WebTestCase
{
	
	private $personal;
	private $validator;

	private $testData = array(
				'age'    => 31,
				'weight' => 80,
				'height' => 180,
				'hair'   => 'brown'
			);


	public function setup()
	{
		$this->personal = new Personal();
		$this->personal->fromArray($this->testData);

		//	Get the validator service
		$this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
	}


	/**
	 * Provide valid data to be tested
	 */
	public function testValidData()
	{
		$count = count($this->validator->validate($this->personal));

		// Check the data is valid
		$this->assertEquals(0, $count);
	}

	/**
	 * Test an invalid age
	 */
	public function testInvalidAge()
	{
		$this->personal->setAge('tommy');

		$error = $this->validator->validate($this->personal);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\Personal.age:\nThevaluetommyisnotavalidinteger.", str_replace(' ', '', $error[0]->__toString()));
	}

	/**
	 * Test an invalid weight
	 */
	public function testInvalidWeight()
	{
		$this->personal->setWeight('tommy');

		$error = $this->validator->validate($this->personal);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\Personal.weight:\nThevaluetommyisnotavalidinteger.", str_replace(' ', '', $error[0]->__toString()));
	}

	/**
	 * Test an invalid weight
	 */
	public function testInvalidHeight()
	{
		$this->personal->setHeight('tommy');

		$error = $this->validator->validate($this->personal);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\Personal.height:\nThevaluetommyisnotavalidinteger.", str_replace(' ', '', $error[0]->__toString()));
	}

	/**
	 * Test an invalid hair
	 */
	public function testInvalidHair()
	{
		$this->personal->setHair(33);

		$error = $this->validator->validate($this->personal);

		// Check the data is valid
		$this->assertEquals("Test\TestStoreBundle\Entity\Personal.hair:\nThevalue33isnotavalidstring.", str_replace(' ', '', $error[0]->__toString()));
	}
}
