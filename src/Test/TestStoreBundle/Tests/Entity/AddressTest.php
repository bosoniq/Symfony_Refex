<?php
namespace Test\TestStoreBundle\Tests\Entity;

use Test\TestStoreBundle\Entity\Address;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ValidatorFactory;

/**
* 
*/
class AddressTest extends WebTestCase
{
	
	private $validator;
	private $address;

	private $testData = array(
				'number'    => 31,
				'street' => 'tickels',
				'town' => 'picklesbury',
				'postcode'   => '7hf46hfg'
			);


	public function setup()
	{
		$this->address = new Address();
		$this->address->fromArray($this->testData);

		//	Get the validator service
		$this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
	}


	/**
	 * Provide valid data to be tested
	 */
	public function testValidData()
	{
		
		// Check the data is valid
		$count = count($this->validator->validate($this->address));


		// Check the data is valid
		$this->assertEquals(0, $count);
	}
}
