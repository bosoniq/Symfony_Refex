<?php

namespace Test\TestStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* User Entity Class
*
* @ORM\Entity @ORM\Table(name="users")
*/
class User
{
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     * 
     * User ID
     * @var int
     */
    private $id;

    /**
     * Users firstname
     * @var string
     *
     * @ORM\Column(type="string", length=50) 
     */
    private $firstname;

    /**
     * Surname of user
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    private $surname;

    /**
     * Address id of the user
     * @var int
     *
     * @ORM\OneToOne(targetEntity="Address", inversedBy="user")
     */
    private $address;

    /**
     * Email address if the user
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * Users system password
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    private $password;

    /**
     * The id of the users personal description details
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Personal", inversedBy="user")
     */
    private $personal;

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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set address
     *
     * @param \Test\TestStoreBundle\Entity\Address $address
     * @return User
     */
    public function setAddress(\Test\TestStoreBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Test\TestStoreBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set personal
     *
     * @param \Test\TestStoreBundle\Entity\Personal $personal
     * @return User
     */
    public function setPersonal(\Test\TestStoreBundle\Entity\Personal $personal = null)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return \Test\TestStoreBundle\Entity\Personal 
     */
    public function getPersonal()
    {
        return $this->personal;
    }
}
