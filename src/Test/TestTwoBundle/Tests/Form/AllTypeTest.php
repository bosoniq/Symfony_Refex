<?php

namespace Test\TestTwoBundle\Tests\Form;

use Test\TestTwoBundle\Form\AllType;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * This is a full functional test of the AllType form.  This form is composed of 
 * three sub forms (collections) which are tested elsewhere.  This test class requires a 
 * test database to be available to persist and fetch values from.
 */
class AllTypeTest extends WebTestCase
{

    private $client;
    private $crawler;

    private $sectionHeaders = array('User Info', 'Address', 'Personal Info');

    private $formLabels = array('Firstname',
                                'Surname',
                                'Email',
                                'Password',
                                'Number',
                                'Street',
                                'Town',
                                'Postcode',
                                'Age',
                                'Weight',
                                'Height',
                                'Hair'
                            );

    private $formData = array(  'firstname' => 'Peter',
                                'surname'  => 'Piper',
                                'email'    => 'test@gmail.com',
                                'password' => 'VerySecret',
                                'number'   => 3,
                                'street'   => 'farrell',
                                'town'     => 'Manchester',
                                'postcode' => '56473',
                                'age'      => 31,
                                'weight'   => 80,
                                'height'   => 180,
                                'hair'     => 'brown'
                                );


    protected function setUp()
    {
        $this->client = static::createClient();
        $this->crawler = $this->client->request('GET', '/two/');
    }

    /**
     * Check headers are set correctly
     */
    public function testIndexHeadersSet()
    {
        for ($i=0; $i < 3; $i++) {
            $this->assertEquals($this->sectionHeaders[$i], $this->crawler->filter('h3')->eq($i)->text());
        }
    }

    /**
     * Check each label tag on the page making sure it contains the correct text
     */
    public function testCheckUserInfoFormLabels()
    {
        for ($i=0; $i < 12; $i++) {
            $this->assertEquals($this->formLabels[$i], $this->crawler->filter('label')->eq($i)->text());

        }
    }


    public function testFullFormDataComparison()
    {

        $form = $this->crawler->selectButton('Save')->form();


        $form->setValues(array(

                'all[user][0][firstname]' => $this->formData['firstname'],
                'all[user][0][surname]' => $this->formData['surname'],
                'all[user][0][email]' => $this->formData['email'],
                'all[user][0][password]' => $this->formData['password'],
                'all[address][0][number]' => $this->formData['number'],
                'all[address][0][street]' => $this->formData['street'],
                'all[address][0][town]' => $this->formData['town'],
                'all[address][0][postcode]' => $this->formData['postcode'],
                'all[personal][0][age]' => $this->formData['age'],
                'all[personal][0][weight]' => $this->formData['weight'],
                'all[personal][0][height]' => $this->formData['height'],
                'all[personal][0][hair]' => $this->formData['hair']
        ));


        // submit the form
        $crawler = $this->client->submit($form);

        $this->assertEquals($crawler->text(), 'Well done, it worked!');
    }
}
