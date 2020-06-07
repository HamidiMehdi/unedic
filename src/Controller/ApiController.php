<?php

namespace App\Controller;

use App\Entity\Department;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/department/{id}/students", name="api",  methods={"GET"})
     */
    public function index($id)
    {
        $department = $this->getDoctrine()->getRepository(Department::class)->find($id);
        if (!$department) {
            return $this->json([
                'status' => 404,
                'message' => 'Unable to find this entity.'
            ], 404);
        }

        return $this->json($department->getStudents(), 200, [], ['groups' => 'get:read']);
    }
}
