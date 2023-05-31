<?php

namespace App\Controller;

use App\Entity\MentionsLegales;
use App\Form\MentionsLegalesType;
use App\Repository\MentionsLegalesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/mentions-legales')]
class AdminMentionsLegalesController extends AbstractController
{
    #[Route('/', name: 'app_admin_mentions_legales_index', methods: ['GET'])]
    public function index(MentionsLegalesRepository $mentionsLegalesRepository): Response
    {
        return $this->render('admin_mentions_legales/index.html.twig', [
            'mentions_legales' => $mentionsLegalesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_mentions_legales_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MentionsLegalesRepository $mentionsLegalesRepository): Response
    {
        $mentionsLegale = new MentionsLegales();
        $form = $this->createForm(MentionsLegalesType::class, $mentionsLegale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mentionsLegalesRepository->save($mentionsLegale, true);

            return $this->redirectToRoute('app_admin_mentions_legales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_mentions_legales/new.html.twig', [
            'mentions_legale' => $mentionsLegale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_mentions_legales_show', methods: ['GET'])]
    public function show(MentionsLegales $mentionsLegale): Response
    {
        return $this->render('admin_mentions_legales/show.html.twig', [
            'mentions_legale' => $mentionsLegale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_mentions_legales_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MentionsLegales $mentionsLegale, MentionsLegalesRepository $mentionsLegalesRepository): Response
    {
        $form = $this->createForm(MentionsLegalesType::class, $mentionsLegale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mentionsLegalesRepository->save($mentionsLegale, true);

            return $this->redirectToRoute('app_admin_mentions_legales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_mentions_legales/edit.html.twig', [
            'mentions_legale' => $mentionsLegale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_mentions_legales_delete', methods: ['POST'])]
    public function delete(Request $request, MentionsLegales $mentionsLegale, MentionsLegalesRepository $mentionsLegalesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mentionsLegale->getId(), $request->request->get('_token'))) {
            $mentionsLegalesRepository->remove($mentionsLegale, true);
        }

        return $this->redirectToRoute('app_admin_mentions_legales_index', [], Response::HTTP_SEE_OTHER);
    }
}
