<?php

namespace Test\TestStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity @ORM\Table(name="Address")
*/
class Address
{
    
    /**
     * Id of this address record
     * @var int
     *
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer")
     */
    private $id;


    /**
     * Id of the user who owns this record
     * @var int
     *
     * @ORM\OneToOne(targetEntity="User", mappedBy="address")
     */
    private $user;

    /**
     * Number of the house
     * @var integer
     * @Assert\NotBlank(message="Number field cannot be blank")
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @ORM\Column(type="integer")
     */
    private $number;


    /**
     * Name of the street
     * @var string
     * @Assert\NotBlank(message="Street field cannot be blank")
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Assert\Length(max=50, maxMessage="Street name cannot be longer than 50 chars")
     * @ORM\Column(type="string", length=50)    
     */
    private $street;

    /**
     * The town section of the address
     * @var string
     * @Assert\NotBlank(message="Town field cannot be blank")
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Assert\Length(max=50, maxMessage="town name cannot be longer than 50 chars")
     * @ORM\Column(type="string", length=50)
     */
    private $town;

    /**
     * The postcode section of the address
     * @var string
     * @Assert\NotBlank(message="Postode field cannot be blank")
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @Assert\Length(max=15, maxMessage="Postcode cannot be longer than 15 chars")
     * @ORM\Column(type="string", length=15)
     */
    private $postcode;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Address
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set town
     *
     * @param string $town
     * @return Address
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string 
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Address
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set user
     *
     * @param \Test\TestStoreBundle\Entity\User $user
     * @return Address
     */
    public function setUser(\Test\TestStoreBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Test\TestStoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
