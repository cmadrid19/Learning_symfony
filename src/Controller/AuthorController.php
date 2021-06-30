<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Editorial;
use App\Entity\Fondo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author", name="author")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {

        $author = new Author();
        $author->setType("persona");
        $author->setName("Pérez");

        $author2 = new Author();
        $author2->setType("entidad");
        $author2->setName("España");

        $author3 = new Author();
        $author3->setType("persona");
        $author3->setName("JKRowling");

        dump($author);
        dump($author2);
        dump($author3);

        $editorial = new Editorial();
        $editorial->setName("Planeta");

        $entityManager->persist($author);
        $entityManager->persist($author2);
        $entityManager->persist($author3);

        $entityManager->persist($editorial);


        $fondo = new Fondo();
        $fondo->setTitle("LOTR");
        $fondo->setCategoria("Ficción");
        $fondo->setEdicion("5");
        $fondo->setPublicacion("1987");
        $fondo->addAutor($author);
        $fondo->addEditorial($editorial);

        $entityManager->persist($fondo);
        $entityManager->flush();

        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
}
