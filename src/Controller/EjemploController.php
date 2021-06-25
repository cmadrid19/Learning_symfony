<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EjemploController extends AbstractController
{
    public function hola()
    {
        $name = 'Carlos';
        return $this-> render('ejemplo/saludar.html.twig', [
            'name' => $name
        ]);
    }

    public function adios()
    {
        $name = 'Carlos';
        return $this -> render('ejemplo/despedirse.html.twig');
    }

}