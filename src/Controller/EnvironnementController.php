<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EnvironnementController extends AbstractController
{
    /**
     * @Route("/environnement", name="environnement")
     */
    public function index()
    {
        return $this->render('environnement/index.html.twig', [
            'controller_name' => 'EnvironnementController',
        ]);
    }
}
