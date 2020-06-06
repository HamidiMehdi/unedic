<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 * @ORM\Table(name="students")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=25)
     */
    private $firstname;

    /**
     * @ORM\Column(name="last_name", type="string", length=25)
     */
    private $lastname;

    /**
     * @ORM\Column(name="num_etud", type="string", length=10)
     */
    private $numetud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNumetud(): ?string
    {
        return $this->numetud;
    }

    public function setNumetud(string $numetud): self
    {
        $this->numetud = $numetud;

        return $this;
    }
}
