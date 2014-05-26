<?php

namespace Test\TestOneBundle\Classes;

/**
* 
*/
class Address
{
    
    /**
     * Number of property
     * @var integer
     */
    private $number;

    /**
     * Street name
     * @var string
     */
    private $street;

    /**
     * Town
     * @var string
     */
    private $town;

    /**
     * Postcode
     * @var string
     */
    private $postcode;





    /**
     * Get the property number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * Set the property number
     *
     * @param integer
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }



    /**
     * [description here]
     *
     * @return [type] [description]
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * [Description]
     *
     * @param [type] $newstreet [description]
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
    }


    /**
     * [description here]
     *
     * @return [type] [description]
     */
    public function getTown()
    {
        return $this->town;
    }
    
    /**
     * [Description]
     *
     * @param [type] $newtown [description]
     */
    public function setTown($town)
    {
        $this->town = $town;
    
        return $this;
    }



    /**
     * [description here]
     *
     * @return [type] [description]
     */
    public function getPostcode()
    {
        return $this->postcode;
    }
  

    /**
     * [Description]
     *
     * @param [type] $newpostcode [description]
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $thi
        ;
    }
}
