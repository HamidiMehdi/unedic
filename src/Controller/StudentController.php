<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Service\StudentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StudentController
 * @package App\Controller
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

    /**
     * @Route("/{id}/edit", name="student_edit")
     * @param Request $request
     * @param StudentService $studentService
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, StudentService $studentService, $id)
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->find($id);
        if (!$student) {
            throw $this->createNotFoundException('Unable to find this entity.');
        }

        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studentService->save($student);
            return $this->redirectToRoute('student_list');
        }

        return $this->render('student/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="student_delete")
     * @param StudentService $studentService
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(StudentService $studentService, $id)
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->find($id);
        if (!$student) {
            throw $this->createNotFoundException('Unable to find this entity.');
        }

        $studentService->delete($student);
        return $this->redirectToRoute('student_list');
    }
}
