<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use App\Form\GiteType;
use App\Repository\GiteRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    private GiteRepository $giteRepository;
    private EntityManagerInterface $em;
    /**
     * Undocumented function
     *
     * @param GiteRepository $giteRepository
     */
    public function __construct(GiteRepository $giteRepository, EntityManagerInterface $em)
    {
        $this->giteRepository = $giteRepository;
        $this->em = $em;
    }

    /**
     * Undocumented function
     *  @route("/admin",name="admin.index")
     * @return Response
     */
    public function index()
    {
        $gites = $this->giteRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'gites' => $gites,
        ]);
    }

    /**
     * Undocumented function
     * @route("/admin/new", name="admin.new")
     * @return void
     */
    public function new(Request $request)
    {

        $gite = new Gite();
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash("success", "Le gîte a bien été enregistré");
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/new.html.twig', [
            "formGite" => $form->createView(),
        ]);
    }

    /**
     * Undocumented function
     * @route("/admin/{id}/delete", name="admin.delete")
     */
    public function delete(Gite $gite, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $gite->getId(), $request->get('_token'))) {
            $removeGite = $this->em;
            $removeGite->remove($gite);
            $removeGite->flush();
        }
        $this->addFlash("delete", "Le gîte a bien été supprimé"); 
        return $this->redirectToRoute('admin.index');
    }

    /**
     * Undocumented function
     * @route("/admin/{id}/edit", name="admin.edit")
     * @param Gite $gite
     * @return void
     */
    public function edit(Gite $gite, Request $request)
    {
        $form = $this->createForm(GiteType::class, $gite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($gite);
            $this->em->flush();
            $this->addFlash("success", "Le gîte a bien été Modifié");
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/edit.html.twig', [
            "gite" => $gite,
            'formGite' => $form->createView(),
        ]);
    }
}
