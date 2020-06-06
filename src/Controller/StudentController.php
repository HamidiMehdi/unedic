<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Service\StudentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/list", name="student_list")
     * @param StudentService $studentService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(StudentService $studentService)
    {
        return $this->render('student/list.html.twig', [
            'students' => $studentService->getAllStudents(),
        ]);
    }

    /**
     * @Route("/new", name="student_new")
     * @param Request $request
     * @param StudentService $studentService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request, StudentService $studentService)
    {
        $student = new Student();

        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studentService->save($student);
            return $this->redirectToRoute('student_list');
        }

        return $this->render('student/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
