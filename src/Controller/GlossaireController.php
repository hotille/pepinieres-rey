<?php

namespace App\Controller;

use App\Entity\Glossaire;
use App\Form\GlossaireType;
use App\Repository\GlossiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/glossaire")
 */
class GlossaireController extends AbstractController
{
    /**
     * @Route("/", name="glossaire_index", methods={"GET"})
     */
    public function index(GlossiereRepository $glossiereRepository): Response
    {
        return $this->render('glossaire/index.html.twig', [
            'glossaires' => $glossiereRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="glossaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $glossaire = new Glossaire();
        $form = $this->createForm(GlossaireType::class, $glossaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($glossaire);
            $entityManager->flush();

            return $this->redirectToRoute('glossaire_index');
        }

        return $this->render('glossaire/new.html.twig', [
            'glossaire' => $glossaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="glossaire_show", methods={"GET"})
     */
    public function show(Glossaire $glossaire): Response
    {
        return $this->render('glossaire/show.html.twig', [
            'glossaire' => $glossaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="glossaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Glossaire $glossaire): Response
    {
        $form = $this->createForm(GlossaireType::class, $glossaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('glossaire_index');
        }

        return $this->render('glossaire/edit.html.twig', [
            'glossaire' => $glossaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="glossaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Glossaire $glossaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$glossaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($glossaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('glossaire_index');
    }
}
