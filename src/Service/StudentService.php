<?php

namespace App\Service;

use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class StudentService
 * @package App\Service
 */
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

    /**
     * @param Student $student
     */
    public function save(Student $student)
    {
        $this->em->persist($student);
        $this->em->flush();
    }

    /**
     * @param Student $student
     */
    public function delete(Student $student)
    {
        $this->em->remove($student);
        $this->em->flush();
    }

}