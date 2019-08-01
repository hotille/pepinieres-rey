<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/environnement")
 */
class EnvironnementController extends AbstractController
{
    /**
     * @Route("/", name="environnement_index")
     */
    public function index()
    {
        return $this->render('environnement/index.html.twig', [
            'controller_name' => 'EnvironnementController',
        ]);
    }
}
