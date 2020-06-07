<?php

namespace App\Controller;

use App\Entity\Department;
use App\Form\DepartmentType;
use App\Service\DepartmentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DepartmentController
 * @package App\Controller
 * @Route("/department")
 */
class DepartmentController extends AbstractController
{
    /**
     * @Route("/list", name="department_list")
     * @param DepartmentService $departmentService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(DepartmentService $departmentService)
    {
        return $this->render('department/list.html.twig', [
            'departments' => $departmentService->getAllDepartments(),
        ]);
    }

    /**
     * @Route("/new", name="department_new")
     * @param Request $request
     * @param DepartmentService $departmentService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request, DepartmentService $departmentService)
    {
        $department = new Department();

        $form = $this->createForm(DepartmentType::class, $department);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $departmentService->save($department);
            $this->addFlash('success', 'Le nouveau département a bien été crée.');

            return $this->redirectToRoute('department_list');
        }

        return $this->render('department/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="department_edit")
     * @param Request $request
     * @param DepartmentService $departmentService
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Request $request, DepartmentService $departmentService, $id)
    {
        $department = $this->getDoctrine()->getRepository(Department::class)->find($id);
        if (!$department) {
            throw $this->createNotFoundException('Unable to find this entity.');
        }

        $form = $this->createForm(DepartmentType::class, $department);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $departmentService->save($department);
            $this->addFlash('success', 'Le département a bien été modifié.');

            return $this->redirectToRoute('department_list');
        }

        return $this->render('department/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
