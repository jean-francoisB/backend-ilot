<?php

namespace App\Controller;

use App\Entity\Informations;
use App\Form\InformationsType;
use App\Repository\InformationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/informations')]
class AdminInformationsController extends AbstractController
{
    #[Route('/', name: 'app_admin_informations_index', methods: ['GET'])]
    public function index(InformationsRepository $informationsRepository): Response
    {
        return $this->render('admin_informations/index.html.twig', [
            'informations' => $informationsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_informations_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InformationsRepository $informationsRepository): Response
    {
        $information = new Informations();
        $form = $this->createForm(InformationsType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $informationsRepository->save($information, true);

            return $this->redirectToRoute('app_admin_informations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_informations/new.html.twig', [
            'information' => $information,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_informations_show', methods: ['GET'])]
    public function show(Informations $information): Response
    {
        return $this->render('admin_informations/show.html.twig', [
            'information' => $information,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_informations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Informations $information, InformationsRepository $informationsRepository): Response
    {
        $form = $this->createForm(InformationsType::class, $information);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $informationsRepository->save($information, true);

            return $this->redirectToRoute('app_admin_informations_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_informations/edit.html.twig', [
            'information' => $information,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_informations_delete', methods: ['POST'])]
    public function delete(Request $request, Informations $information, InformationsRepository $informationsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$information->getId(), $request->request->get('_token'))) {
            $informationsRepository->remove($information, true);
        }

        return $this->redirectToRoute('app_admin_informations_index', [], Response::HTTP_SEE_OTHER);
    }
}
