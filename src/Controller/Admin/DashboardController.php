<?php

namespace App\Controller\Admin;

use App\Entity\Block;
use App\Entity\Formation;
use App\Entity\Advice;
use App\Entity\Contact;
use App\Entity\Quotation;
use App\Entity\User;
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
        $advices = $this->getDoctrine()->getRepository(advice::class)->findAll();
        $blocks = $this->getDoctrine()->getRepository(block::class)->findAll();
        $users = $this->getDoctrine()->getRepository(User::class)->count([]);
        $contacts = $this->getDoctrine()->getRepository(Contact::class)->count([]);
        $quotations = $this->getDoctrine()->getRepository(Quotation::class)->count([]);

    return $this->render('admin/dashboard.html.twig', [
        'formations' => $formations,
        'advices' => $advices,
        'blocks' => $blocks,
        'users' => $users,
        'contacts' => $contacts,
        'quotations' => $quotations,
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
                MenuItem::linkToCrud('Conseil', 'fas fa-chalkboard-teacher', Advice::class),
            MenuItem::linkToCrud('Gestion de devis', 'fas fa-shopping-cart', Quotation::class),   
            MenuItem::linkToCrud('Messages', 'fas fa-envelope', Contact::class), 
            MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class),   
            ];
    }
}
