<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false, length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=false, length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", nullable=false, length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Role")
     */
    private $roles;

    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->name,
            $this->password,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->name,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * @return null|string
     */
    public function getSalt() {
         return null;
    }

    /**
     * @return string
     */
    public function getUsername() {
         return $this->name;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getRoles()
    {
        if ($this->roles) {
            return array_merge($this->roles, ['ROLE_USER']);
        }
        return ['ROLE_USER'];
    }

    /**
     * @param mixed $id
     *
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

}
