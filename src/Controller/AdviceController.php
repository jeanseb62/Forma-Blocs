<?php

namespace App\Controller;

use App\Repository\AdviceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdviceController extends AbstractController
{
    /**
     * @Route("/advice", name="advice")
     */
    public function index(AdviceRepository $adviceRepository): Response
    {
        return $this->render('advice/index.html.twig', [
            'advices' => $adviceRepository->findAll(),
        ]);
    }
}
