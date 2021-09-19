<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectManager;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(FormationRepository $formationRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'formations' => $formationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/qui-sommes-nous", name="qui-sommes-nous")
     */
    public function quiSommesNous()
    {
        return $this->render('default/quiSommesNous.html.twig');
    }

    /**
     * @Route("/CGU", name="CGU")
     */
    public function cgu()
    {
        return $this->render('default/cgu.html.twig');
    }

    /**
     * @Route("/protection-des-données", name="protection")
     */
    public function mentions()
    {
        return $this->render('default/protection.html.twig');
    }
}
