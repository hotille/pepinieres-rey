<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Contact;
use App\Form\ContactsType;
use App\Repository\ContactRepository;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_index")
     */
    public function index(ContactRepository $contactRepository)
    {
        $contacts = $contactRepository->findAll();
        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("/new", name="contact_new", methods={"GET", "POST"})
     */
    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('index');
        }
        return $this->render('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }
}
