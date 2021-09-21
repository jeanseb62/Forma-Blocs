<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $existsMessageToday = $this->existsMessageToday($contact);
            if(!count($existsMessageToday)){
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
                $this->addFlash('success', Contact::SUCCES_REGISTRY);
            }else{
                $this->addFlash('error', Contact::ERROR_REGISTRY);
            }
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formulaire' => $form->createView(),
        ]);
    }

    private function existsMessageToday( $contact){ //, ExecutionContextInterface $context){
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository(Contact::class)->findContactsByEmailPerDay($contact->getEmail());

    }
}