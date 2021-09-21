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
    public function index(Request $request): Response
    {
        $quotation = new Quotation();
        $form = $this->createForm(QuotationType::class,$quotation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $existsMessageToday = $this->existsMessageToday($quotation);
            if(!count($existsMessageToday)){
                $em = $this->getDoctrine()->getManager();
                $em->persist($quotation);
                $em->flush();
                $this->addFlash('success', Quotation::SUCCES_REGISTRY);
            }else{
                $this->addFlash('error', Quotation::ERROR_REGISTRY);
            }
            return $this->redirectToRoute('quotation');
        }

        return $this->render('quotation/index.html.twig', [
            'controller_name' => 'QuotationController',
            'quotation' => $form->createView(),
        ]);
    }

    private function existsMessageToday($quotation){ //, ExecutionContextInterface $context){
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository(Quotation::class)->findContactsByEmailPerDay($quotation->getEmail());

    }
}
