<?php

namespace App\Controller;

use App\MockData\Catalogo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MockData;

class CatalogoController extends AbstractController
{
    //#[Route('/catalogo', name: 'catalogo')]
    public function index(): Response
    {
        $libros = Catalogo::$fondos;

        //dump($libros); // print

        return $this->render('catalogo/index.html.twig', [
            'libros' => $libros,
        ]);
    }
}
