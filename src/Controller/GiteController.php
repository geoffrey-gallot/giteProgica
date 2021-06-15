<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{

    public function __construct(GiteRepository $giteRepository)
    {
        $this->repo = $giteRepository;
    }

    /**
     * affichage gite ciblé
     * @route("/gite/{id}",name="gite.show")
     */
    public function show(int $id)
    {
        $gite = $this->repo->find($id);
        // dd($gite);
        return $this->render('gite/show.html.twig',[
            "gite" => $gite,
        ]);
    }
}
