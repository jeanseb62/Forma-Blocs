<?php

namespace App\Controller\Admin;

use App\Entity\Block;
use App\Entity\Formation;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $formations = $this->getDoctrine()->getRepository(formation::class)->findAll();

    return $this->render('admin/dashboard.html.twig', [
        'formations' => $formations
    ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FormaBlocs');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),
            MenuItem::linkToUrl('Visiter le site', 'fas fa-globe', '/'),
            MenuItem::subMenu('Formations', 'fas fa-graduation-cap')->setSubItems([
                MenuItem::linkToCrud('Ajouter une formation', 'fas fa-book-reader', Formation::class),
                MenuItem::linkToCrud('Ajouter un bloc', 'fa fa-tags', Block::class), 
                ]),
              
            MenuItem::linkToCrud('Messages', 'fas fa-envelope', Contact::class),    

            ];
    }
}
