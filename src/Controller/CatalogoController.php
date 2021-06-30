<?php

namespace App\Controller;

use App\MockData\Catalogo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\MockData;
use App\Repository\EditorialRepository;
use App\Repository\FondoRepository;

class CatalogoController extends AbstractController
{
    //#[Route('/catalogo', name: 'catalogo')]
    public function catalogo(EditorialRepository $fondoRepository): Response
    {
        
        //$fondo = $fondoRepository->find(1);

        $libros = Catalogo::$fondos;

        //dump($fondo); // print

        return $this->render('catalogo/index.html.twig', [
            'libros' => $libros,
        ]);
    }
}
