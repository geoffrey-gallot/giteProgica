<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminServiceController extends AbstractController
{
    private ServiceRepository $serviceRepository;
    private EntityManagerInterface $em;

    public function __construct(ServiceRepository $serviceRepository, EntityManagerInterface $em)
    {
        $this->serviceRepository = $serviceRepository;
        $this->em = $em;
    }

    /**
     * @Route("/admin/service", name="admin.service")
     */
    public function index(): Response
    {
        $services = $this->serviceRepository->findAll();
        return $this->render('admin/service/index.html.twig', [
            'services' => $services
        ]);
    }

    /**
     * Undocumented function
     * @route("admin/service/new", name="admin.service.new")
     * @param Request $request
     * @return void
     */
    public function new(Request $request)
    {
        $service = new Service();
        $formService = $this->createform(ServiceType::class, $service);
        $formService->handleRequest(($request));

        if ($formService->isSubmitted() && $formService->isValid()) {
            $this->em->persist($service);
            $this->em->flush();
            $this->addFlash("success", "Le service a bien été enregistré");
            return $this->redirectToRoute('admin.service');
        }


        return $this->render('admin/equipement/new.html.twig', [
            "formEquipement" => $formService->createView(),
        ]);
    }

    /**
     * Undocumented function
     * @route("/admin/service/{id}/delete", name="admin.service.delete")
     */
    public function delete(Service $service, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $service->getId(), $request->get('_token'))) {
            $removeService = $this->em;
            $removeService->remove($service);
            $removeService->flush();
        }
        $this->addFlash("delete", "Le service' a bien été supprimé"); 
        return $this->redirectToRoute('admin.service');
    }

    /**
     * Undocumented function
     * @route("/admin/service/{id}/edit", name="admin.service.edit")
     */
    public function edit(Service $service, Request $request)
    {
        $formService = $this->createForm(ServiceType::class, $service);
        $formService->handleRequest($request);
        if ($formService->isSubmitted() && $formService->isValid()) {
            $this->em->persist($service);
            $this->em->flush();
            $this->addFlash("success", "Le service a bien été Modifié");
            return $this->redirectToRoute('admin.service');
        }

        return $this->render('admin/service/edit.html.twig', [
            "equipement" => $service,
            'formService' => $formService->createView(),
        ]);
    }

}
