<?php

namespace Test\TestTwoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
* A Class to handle information submitted from the All Form
*/
class All
{
    
    /**
     * New User object
     * @var object
     * @Assert\Valid(traverse=true)
     */
    private $user;

    /**
     * New Address Object
     * @var object
     * @Assert\Valid(traverse=true)
     */
    private $address;

    /**
     * New Personal Object
     * @var object
     * @Assert\Valid(traverse=true)
     */
    private $personal;



    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->address = new ArrayCollection();
        $this->personal = new ArrayCollection();
    }



    /**
     * Get User Object
     *
     * @return Object
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set User Object
     *
     * @param Object
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }


    /**
     * Get Address Object
     *
     * @return Object
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * Set Address Object
     *
     * @param Object
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }


    /**
     * Get Personal Object
     *
     * @return Object
     */
    public function getPersonal()
    {
        return $this->personal;
    }
    
    /**
     * Set Personal Object
     * 
     * @param Object
     */
    public function setPersonal($personal)
    {
        $this->personal = $personal;
    
        return $this;
    }

    /**
     * Accept data from an array to populate all fields in the instatiated classes
     */
    public function fromArray(array $data)
    {
        $this->user->first()->setFirstname($data['firstname']);
        $this->user->first()->setSurname($data['surname']);
        $this->user->first()->setEmail($data['email']);
        $this->user->first()->setPassword($data['password']);

        $this->address->first()->setNumber($data['number']);
        $this->address->first()->setStreet($data['street']);
        $this->address->first()->setTown($data['town']);
        $this->address->first()->setPostcode($data['postcode']);

        $this->personal->first()->setAge($data['age']);
        $this->personal->first()->setWeight($data['weight']);
        $this->personal->first()->setHeight($data['height']);
        $this->personal->first()->setHair($data['hair']);
    }
}
