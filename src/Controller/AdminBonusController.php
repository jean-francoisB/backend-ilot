<?php

namespace App\Controller;

use App\Entity\Bonus;
use App\Form\BonusType;
use App\Repository\BonusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/bonus')]
class AdminBonusController extends AbstractController
{
    #[Route('/', name: 'app_admin_bonus_index', methods: ['GET'])]
    public function index(BonusRepository $bonusRepository): Response
    {
        return $this->render('admin_bonus/index.html.twig', [
            'bonuses' => $bonusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_bonus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BonusRepository $bonusRepository): Response
    {
        $bonu = new Bonus();
        $form = $this->createForm(BonusType::class, $bonu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bonusRepository->save($bonu, true);

            return $this->redirectToRoute('app_admin_bonus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bonus/new.html.twig', [
            'bonu' => $bonu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_bonus_show', methods: ['GET'])]
    public function show(Bonus $bonu): Response
    {
        return $this->render('admin_bonus/show.html.twig', [
            'bonu' => $bonu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_bonus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bonus $bonu, BonusRepository $bonusRepository): Response
    {
        $form = $this->createForm(BonusType::class, $bonu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bonusRepository->save($bonu, true);

            return $this->redirectToRoute('app_admin_bonus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bonus/edit.html.twig', [
            'bonu' => $bonu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_bonus_delete', methods: ['POST'])]
    public function delete(Request $request, Bonus $bonu, BonusRepository $bonusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bonu->getId(), $request->request->get('_token'))) {
            $bonusRepository->remove($bonu, true);
        }

        return $this->redirectToRoute('app_admin_bonus_index', [], Response::HTTP_SEE_OTHER);
    }
}
