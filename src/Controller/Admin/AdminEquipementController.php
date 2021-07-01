<?php

namespace App\Controller\Admin;

use App\Entity\Equipement;
use App\Form\EquipementType;
use App\Repository\EquipementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEquipementController extends AbstractController
{
    private EquipementRepository $equipementRepository;
    private EntityManagerInterface $em;

    public function __construct(EquipementRepository $equipementRepository, EntityManagerInterface $em)
    {
        $this->equipementRepository = $equipementRepository;
        $this->em = $em;
    }

    /**
     * @Route("/admin/equipement", name="admin.equipement")
     */
    public function index(): Response
    {
        $equipements = $this->equipementRepository->findAll();
        return $this->render('admin/equipement/index.html.twig', [
            'equipements' => $equipements
        ]);
    }

    /**
     * Undocumented function
     * @route("admin/equipement/new", name="admin.equipement.new")
     * @param Request $request
     * @return void
     */
    public function new(Request $request)
    {
        $equipement = new Equipement();
        $formEquipement = $this->createform(EquipementType::class, $equipement);
        $formEquipement->handleRequest(($request));

        if ($formEquipement->isSubmitted() && $formEquipement->isValid()) {
            $this->em->persist($equipement);
            $this->em->flush();
            $this->addFlash("success", "L'équipement a bien été enregistré");
            return $this->redirectToRoute('admin.equipement');
        }


        return $this->render('admin/equipement/new.html.twig', [
            "formEquipement" => $formEquipement->createView(),
        ]);
    }

    /**
     * Undocumented function
     * @route("/admin/equipement/{id}/delete", name="admin.equipement.delete")
     */
    public function delete(Equipement $equipement, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $equipement->getId(), $request->get('_token'))) {
            $removeEquipement = $this->em;
            $removeEquipement->remove($equipement);
            $removeEquipement->flush();
        }
        $this->addFlash("delete", "L'équipement' a bien été supprimé"); 
        return $this->redirectToRoute('admin.equipement');
    }

    /**
     * Undocumented function
     * @route("/admin/equipement/{id}/edit", name="admin.equipement.edit")
     */
    public function edit(Equipement $equipement, Request $request)
    {
        $formEquipement = $this->createForm(EquipementType::class, $equipement);
        $formEquipement->handleRequest($request);
        if ($formEquipement->isSubmitted() && $formEquipement->isValid()) {
            $this->em->persist($equipement);
            $this->em->flush();
            $this->addFlash("success", "L'équipement' a bien été Modifié");
            return $this->redirectToRoute('admin.equipement');
        }

        return $this->render('admin/equipement/edit.html.twig', [
            "equipement" => $equipement,
            'formEquipement' => $formEquipement->createView(),
        ]);
    }
}
