<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Form\ActiviteType;
use App\Repository\ActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/activite')]
class AdminActiviteController extends AbstractController
{
    #[Route('/', name: 'app_admin_activite_index', methods: ['GET'])]
    public function index(ActiviteRepository $activiteRepository): Response
    {
        return $this->render('admin_activite/index.html.twig', [
            'activites' => $activiteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_activite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ActiviteRepository $activiteRepository): Response
    {
        $activite = new Activite();
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $activiteRepository->save($activite, true);

            return $this->redirectToRoute('app_admin_activite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_activite/new.html.twig', [
            'activite' => $activite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_activite_show', methods: ['GET'])]
    public function show(Activite $activite): Response
    {
        return $this->render('admin_activite/show.html.twig', [
            'activite' => $activite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_activite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Activite $activite, ActiviteRepository $activiteRepository): Response
    {
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $activiteRepository->save($activite, true);

            return $this->redirectToRoute('app_admin_activite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_activite/edit.html.twig', [
            'activite' => $activite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_activite_delete', methods: ['POST'])]
    public function delete(Request $request, Activite $activite, ActiviteRepository $activiteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activite->getId(), $request->request->get('_token'))) {
            $activiteRepository->remove($activite, true);
        }

        return $this->redirectToRoute('app_admin_activite_index', [], Response::HTTP_SEE_OTHER);
    }
}
