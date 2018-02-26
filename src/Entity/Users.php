<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class Users
{
    /**
     * @ORM\Column(type="integer", nullable=false)
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
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dateCreate;

    /**
     * @ORM\Column(type="datetime", name="date_last_entrance", nullable=false)
     */
    private $dateLastEntrance;

    /**
     * @ORM\Column(type="datetime", name="date_get_report", nullable=true)
     */
    private $dateGetReport;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $active;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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
     */
    public function setEmail($email): void
    {
        $this->email = $email;
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
     */
    public function setPassword($password): void
    {
        $this->password = $password;
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
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }

    /**
     * @return mixed
     */
    public function getDateLastEntrance()
    {
        return $this->dateLastEntrance;
    }

    /**
     * @param mixed $dateLastEntrance
     */
    public function setDateLastEntrance($dateLastEntrance): void
    {
        $this->dateLastEntrance = $dateLastEntrance;
    }

    /**
     * @return mixed
     */
    public function getDateGetReport()
    {
        return $this->dateGetReport;
    }

    /**
     * @param mixed $dateGetReport
     */
    public function setDateGetReport($dateGetReport): void
    {
        $this->dateGetReport = $dateGetReport;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }
}