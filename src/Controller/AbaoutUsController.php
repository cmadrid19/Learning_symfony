<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbaoutUsController extends AbstractController
{
    /**
     * @Route("/about-us", name="about_us")
     */
    public function index(): Response
    {
        return $this->render('public/about_us.html.twig', [
            'controller_name' => 'AbaoutUsController',
        ]);
    }
}
