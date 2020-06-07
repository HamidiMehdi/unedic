<?php

namespace App\Service;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DepartmentService
 * @package App\Service
 */
class DepartmentService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * DepartmentService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return object[]
     */
    public function getAllDepartments()
    {
        return $this->em->getRepository(Department::class)->findAll();
    }

    /**
     * @param Department $department
     */
    public function save(Department $department)
    {
        $this->em->persist($department);
        $this->em->flush();
    }
}