<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetType;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/projet')]
class AdminProjetController extends AbstractController
{
    #[Route('/', name: 'app_admin_projet_index', methods: ['GET'])]
    public function index(ProjetRepository $projetRepository): Response
    {
        return $this->render('admin_projet/index.html.twig', [
            'projets' => $projetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_projet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProjetRepository $projetRepository): Response
    {
        $projet = new Projet();
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projetRepository->save($projet, true);

            return $this->redirectToRoute('app_admin_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_projet/new.html.twig', [
            'projet' => $projet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_projet_show', methods: ['GET'])]
    public function show(Projet $projet): Response
    {
        return $this->render('admin_projet/show.html.twig', [
            'projet' => $projet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_projet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Projet $projet, ProjetRepository $projetRepository): Response
    {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projetRepository->save($projet, true);

            return $this->redirectToRoute('app_admin_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_projet/edit.html.twig', [
            'projet' => $projet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_projet_delete', methods: ['POST'])]
    public function delete(Request $request, Projet $projet, ProjetRepository $projetRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projet->getId(), $request->request->get('_token'))) {
            $projetRepository->remove($projet, true);
        }

        return $this->redirectToRoute('app_admin_projet_index', [], Response::HTTP_SEE_OTHER);
    }
}
