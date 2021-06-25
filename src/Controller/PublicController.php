<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends AbstractController
{
    public function home()
    {
        return $this->render('public/home.html.twig',[
            'personas' => [
                ["name" => "Carlos",
                "age" => 24],
                ["name" => "Pedro",
                "age" => 20],
                ["name" => "María",
                "age" => 22],
                ["name" => "Andres",
                "age" => 21]
            ]
        ]);
    }

    public function login()
    {
        return $this->render('public/login.html.twig');
    }

    public function signout()
    {
        return $this->render('public/signout.html.twig');
    }
}
