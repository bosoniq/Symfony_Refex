<?php

namespace Test\TestTwoBundle\Tests\Form;

use Test\TestStoreBundle\Form\AddressType;
use Test\TestStoreBundle\Entity\Address;

use Symfony\Component\Form\Test\TypeTestCase;

/**
 * The tests in this class only test the ability of the form to compile, to receive and 
 * set data into the associated doctrine entity and to render all fields correctly in a 
 * view. 
 * 
 * These tests DO NOT persist the data to a test database..
 */
class AddressTypeTest extends TypeTestCase
{

    private $formData = array(  'number'   => 3,
                                'street'   => 'farrell',
                                'town'     => 'Manchester',
                                'postcode' => '56473'
                                );

    /**
     * Check form compiles correctly
     */
    public function testFormCompiles()
    {

        // Build the form
        $type = new AddressType();
        $form = $this->factory->create($type);

        $this->assertTrue(isset($form));
    }

    /**
     * Test that data set via the form is the same as that set directly in the underlying
     * enitity
     */
    public function testUserFormDataComparison()
    {

        // Build the form with empty All() class
        $type = new AddressType();
        $form = $this->factory->create($type);

        // Create comparison object
        $entity = new Address();
        $entity->fromArray($this->formData);
        // $entity->setFirstname = 'Andrew';

        // submit the data to the form directly
        $form->submit($this->formData);

        //  Checks that non of the data transformers used by the form failed
        //  isSynchonized() retruns false if an exception is thrown
        $this->assertTrue($form->isSynchronized());

        // Check that the data processed by the form is equal to that set manually
        $this->assertEquals($entity, $form->getData());
    }

    /**
     * Test that the form includes correct input widgets when rendered in a view
     */
    public function testUserFormView()
    {

        // Build the form with empty All() class
        $type = new AddressType();
        $form = $this->factory->create($type);

        // submit the data to the form directly
        $form->submit($this->formData);

        //  Render the form in a view and fetch its input components
        $view = $form->createView();
        $children = $view->children;

        // Check that each key supplied in the input data is found in amongst the
        // rendered forms inputs.
        foreach (array_keys($this->formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
