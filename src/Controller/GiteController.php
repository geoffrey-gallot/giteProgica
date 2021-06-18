<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{
    /**
     * Undocumented function
     *
     * @param GiteRepository $giteRepository
     */
    public function __construct(GiteRepository $giteRepository)
    {
        $this->repo = $giteRepository;
    }

    /**
     * @Route("/gite/index", name="gite.index")
     */
    public function index(): Response
    {
        $gites = $this->repo->findAll();
        return $this->render('gite/index.html.twig', [
            'gites' => $gites,
        ]);
    }

    /**
     * affichage gite ciblé
     * @route("/gite/{id}",name="gite.show")
     */
    public function show(int $id): Response
    {
        $gite = $this->repo->find($id);
        // dd($gite);
        return $this->render('gite/show.html.twig',[
            "gite" => $gite,
        ]);
    }
}
