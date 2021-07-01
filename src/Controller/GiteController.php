<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use App\Notification\ContactNotification;
use App\Repository\GiteRepository;
use App\Repository\EquipementRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{
    private GiteRepository $giteRepository;
    /**
     * Undocumented function
     *
     * @param GiteRepository $giteRepository
     */
    public function __construct(GiteRepository $giteRepository)
    {
        $this->giteRepository = $giteRepository;
        // $this->equipRepo = $equipementRepository;EquipementRepository $equipementRepository
    }

    /**
     * Undocumented function
     * @route("/",name="home")
     * @return void
     */
    public function index()
    {
        $gites = $this->giteRepository->findLastGites();
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
        $search = new GiteSearch();
        $form = $this->createForm(GiteSearchType::class, $search);
        $form->handleRequest($request);

        $data = $this
                ->giteRepository
                ->findAllGiteSearch($search);
                // ->findAllGiteEquipementSearch($search);
         
                
        $gites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('gite/index.html.twig', [
            'gites' => $gites,
            'form' => $form->createView(),
        ]);
    }




    /**
     * affichage gite ciblé
     * @route("/gite/{id}",name="gite.show")
     */
    public function show(int $id, Request $request, ContactNotification $notification): Response
    {   
        $gite = $this->giteRepository->find($id);
        $contact = new Contact();
        $contact->setGite($gite);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            $this->addFlash('success', 'Votre message à bien été envoyé');
            return $this->redirectToRoute('gite.show', [
                'id' => $gite->getId(),
            ]);
        }
        
        return $this->render('gite/show.html.twig',[
            "gite" => $gite,
            "form" => $form->createView(),
        ]);
    }
}
