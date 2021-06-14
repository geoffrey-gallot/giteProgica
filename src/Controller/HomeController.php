<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(GiteRepository $giteRepository): Response
    {
        return $this->render('home/index.html.twig',[
            'gites' => $giteRepository->findAll(),
        ]);
    }

}
