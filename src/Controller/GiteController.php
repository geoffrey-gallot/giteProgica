<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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
     * Undocumented function
     * @route("/",name="home")
     * @return void
     */
    public function index()
    {
        $gites = $this->repo->findLastGites();
        return $this->render('home/index.html.twig', [
             'gites' => $gites
        ]);
    }




    /**
     * @Route("/gite/index", name="gite.index")
     */
    public function gites(
        PaginatorInterface $paginator, 
        Request $request
    ): Response
    {

        $data = $this->repo->findAll();
        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            9
        );
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
