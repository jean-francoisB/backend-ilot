<?php

namespace App\Controller;

use App\Entity\Festivite;
use App\Form\FestiviteType;
use App\Repository\FestiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/festivite')]
class AdminFestiviteController extends AbstractController
{
    #[Route('/', name: 'app_admin_festivite_index', methods: ['GET'])]
    public function index(FestiviteRepository $festiviteRepository): Response
    {
        return $this->render('admin_festivite/index.html.twig', [
            'festivites' => $festiviteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_festivite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FestiviteRepository $festiviteRepository): Response
    {
        $festivite = new Festivite();
        $form = $this->createForm(FestiviteType::class, $festivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $festiviteRepository->save($festivite, true);

            return $this->redirectToRoute('app_admin_festivite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_festivite/new.html.twig', [
            'festivite' => $festivite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_festivite_show', methods: ['GET'])]
    public function show(Festivite $festivite): Response
    {
        return $this->render('admin_festivite/show.html.twig', [
            'festivite' => $festivite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_festivite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Festivite $festivite, FestiviteRepository $festiviteRepository): Response
    {
        $form = $this->createForm(FestiviteType::class, $festivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $festiviteRepository->save($festivite, true);

            return $this->redirectToRoute('app_admin_festivite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_festivite/edit.html.twig', [
            'festivite' => $festivite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_festivite_delete', methods: ['POST'])]
    public function delete(Request $request, Festivite $festivite, FestiviteRepository $festiviteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$festivite->getId(), $request->request->get('_token'))) {
            $festiviteRepository->remove($festivite, true);
        }

        return $this->redirectToRoute('app_admin_festivite_index', [], Response::HTTP_SEE_OTHER);
    }
}
