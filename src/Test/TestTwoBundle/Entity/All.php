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
}
