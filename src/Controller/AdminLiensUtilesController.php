<?php

namespace App\Controller;

use App\Entity\LiensUtiles;
use App\Form\LiensUtilesType;
use App\Repository\LiensUtilesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/liens-utiles')]
class AdminLiensUtilesController extends AbstractController
{
    #[Route('/', name: 'app_admin_liens_utiles_index', methods: ['GET'])]
    public function index(LiensUtilesRepository $liensUtilesRepository): Response
    {
        return $this->render('admin_liens_utiles/index.html.twig', [
            'liens_utiles' => $liensUtilesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_liens_utiles_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LiensUtilesRepository $liensUtilesRepository): Response
    {
        $liensUtile = new LiensUtiles();
        $form = $this->createForm(LiensUtilesType::class, $liensUtile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $liensUtilesRepository->save($liensUtile, true);

            return $this->redirectToRoute('app_admin_liens_utiles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_liens_utiles/new.html.twig', [
            'liens_utile' => $liensUtile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_liens_utiles_show', methods: ['GET'])]
    public function show(LiensUtiles $liensUtile): Response
    {
        return $this->render('admin_liens_utiles/show.html.twig', [
            'liens_utile' => $liensUtile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_liens_utiles_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LiensUtiles $liensUtile, LiensUtilesRepository $liensUtilesRepository): Response
    {
        $form = $this->createForm(LiensUtilesType::class, $liensUtile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $liensUtilesRepository->save($liensUtile, true);

            return $this->redirectToRoute('app_admin_liens_utiles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_liens_utiles/edit.html.twig', [
            'liens_utile' => $liensUtile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_liens_utiles_delete', methods: ['POST'])]
    public function delete(Request $request, LiensUtiles $liensUtile, LiensUtilesRepository $liensUtilesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$liensUtile->getId(), $request->request->get('_token'))) {
            $liensUtilesRepository->remove($liensUtile, true);
        }

        return $this->redirectToRoute('app_admin_liens_utiles_index', [], Response::HTTP_SEE_OTHER);
    }
}
