<?php

namespace App\Controller;

use App\Service\StudentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/list", name="student_list")
     */
    public function list(StudentService $studentService)
    {

        return $this->render('student/list.html.twig', [
            'students' => $studentService->getAllStudents(),
        ]);
    }
}
