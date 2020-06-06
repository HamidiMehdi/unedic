<?php

namespace App\Service;

use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;

class StudentService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * StudentService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return object[]
     */
    public function getAllStudents()
    {
        return $this->em->getRepository(Student::class)->findAll();
    }

}