<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(message="Le prénom ne peut pas être vide.")
     * @Assert\Length(
     *      max = 25,
     *      maxMessage = "Le prénom ne peut pas dépasser 25 caractères."
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(name="last_name", type="string", length=25)
     * @Assert\NotBlank(message="Le nom ne peut pas être vide.")
     * @Assert\Length(
     *      max = 25,
     *      maxMessage = "Le nom ne peut pas dépasser 25 caractères."
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(name="num_etud", type="integer")
     * @Assert\NotBlank(message="Le numéro étudiant ne peut pas être vide.")
     * @Assert\Regex(
     *     pattern="/^[0-9]{10}$/",
     *     message="Le numéro étudiant doit contenir 10 chiffres."
     * )
     */
    private $numetud;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="students")
     * @ORM\JoinColumn(name="department_id", nullable=false)
     */
    private $department;

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

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
