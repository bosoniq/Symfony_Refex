<?php

namespace Test\TestStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity @ORM\Table(name="personal")
*/
class Personal
{
    
    /**
     * The id of this personal record entry
     * @var int
     *
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer")
     */
    private $id;

    /**
     * The id of the user that this record belongs to
     * @var int
     *
     * @ORM\OneToOne(targetEntity="User", mappedBy="personal")
     */
    private $user;


    /**
     * Age of the user
     * @var int
     *
     * @Assert\NotBlank(message="Age field cannot be blank")
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * The weight of the user
     * @var integer
     *
     * @Assert\NotBlank(message="Weigth field cannot be blank")
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * The height of the user
     * @var integer
     *
     * @Assert\NotBlank(message="Height field cannot be blank")
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * Hair colour of the user
     * @var string
     *
     * @Assert\NotBlank(message="Hair field cannot be blank")
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     * @ORM\Column(type="string", length=20)
     */
    private $hair;

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
     * Set age
     *
     * @param integer $age
     * @return Personal
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Personal
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Personal
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set hair
     *
     * @param string $hair
     * @return Personal
     */
    public function setHair($hair)
    {
        $this->hair = $hair;

        return $this;
    }

    /**
     * Get hair
     *
     * @return string 
     */
    public function getHair()
    {
        return $this->hair;
    }

    /**
     * Set user
     *
     * @param \Test\TestStoreBundle\Entity\User $user
     * @return Personal
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
