<?php

namespace App\Controller;

use App\Entity\Quotation;
use App\Form\QuotationType;
use App\Repository\QuotationRepository;
use App\Notification\QuotationNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuotationController extends AbstractController
{
    /**
     * @Route("/devis", name="quotation")
     */
    public function index(Request $request,\Swift_Mailer $mailer)
    {
        $quotation = new Quotation();
        $form = $this->createForm(QuotationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quotation = $form->getData();

            $message = (new \Swift_Message('Demande de vis'))
               ->setFrom('contact@formablocs.fr')
                ->setTo('norphely@formablocs.fr')
                ->setBody(
                    $this->renderView(
                        'emails/quotation.html.twig', compact('quotation')
                    ),
                    'text/html'
                )
            ;
            $em = $this->getDoctrine()->getManager();
            $em->persist($quotation);
            $em->flush();
            $mailer->send($message);

            $this->addFlash('message', 'Votre demande de devis a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
        }
        return $this->render('quotation/index.html.twig',['quotation' => $form->createView()]);
    }

}
