<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param GiteRepository $giteRepository
     */
    public function __construct(GiteRepository $giteRepository)
    {
        $this->repo = $giteRepository;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        $gites = $this->repo->findAll();
        return $this->render('home/index.html.twig', [
            'gites' => $gites,
        ]);
    }
}
