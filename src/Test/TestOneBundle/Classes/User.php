<?php

namespace Test\TestOneBundle\Classes;

use Doctrine\Common\Collections\ArrayCollection;

/**
*   Simple class to hold a users identity
*/
class User
{
    /**
     * The first name of the user
     * @var string
     */
    private $name;

    /**
     * The surname of the user
     * @var string 
     */
    private $surname;

    /**
     * The resident city of the user
     * @var string
     */
    private $city;

    /**
     * Address object
     * @var object
     */
    private $address;


    public function __construct()
    {
        $this->address = new ArrayCollection();
    }



    /**
     * Get the user first names         
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set the user first name
     *
     * @param string 
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }


    /**
     * Get the users surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the users surname
     *
     * @param string 
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }


    /**
     * Get the users city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Set the city string 
     *
     * @param string
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }


    /**
     * [description here]
     *
     * @return [type] [description]
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * [Description]
     *
     * @param [type] $newaddress [description]
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }
}
