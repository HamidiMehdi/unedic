<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/app", name="default_route")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
       return $this->redirectToRoute('student_list');
    }
}


