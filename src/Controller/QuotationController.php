<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuotationController extends AbstractController
{
    /**
     * @Route("/quotation", name="quotation")
     */
    public function index(): Response
    {
        return $this->render('quotation/index.html.twig', [
            'controller_name' => 'QuotationController',
        ]);
    }
}
