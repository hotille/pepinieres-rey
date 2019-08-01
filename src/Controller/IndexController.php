<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactsType;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET", "POST"})
     */
    public function index(Request $request)
    {

        $contact = new Contact;
        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    


}
