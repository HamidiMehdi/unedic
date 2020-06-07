<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 * @ORM\Table(name="department")
 */
class Department
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=25)
     * @Assert\NotBlank(message="Le nom ne peut pas être vide.")
     * @Assert\Length(
     *      max = 25,
     *      maxMessage = "Le nom ne peut pas dépasser 25 caractères."
     * )
     */
    private $name;

    /**
     * @ORM\Column(name="capacity", type="integer")
     * @Assert\NotBlank(message="La capacité ne peut pas être vide.")
     * @Assert\Regex(
     *     pattern="/^[0-9]{10}$/",
     *     message="La capacité doit contenir 10 chiffres."
     * )
     */
    private $capacity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Student", mappedBy="department")
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function setCapacity(string $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setDepartment($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->contains($student)) {
            $this->students->removeElement($student);
            // set the owning side to null (unless already changed)
            if ($student->getDepartment() === $this) {
                $student->setDepartment(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
