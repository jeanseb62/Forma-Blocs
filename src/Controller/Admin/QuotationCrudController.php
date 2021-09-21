<?php

namespace App\Controller\Admin;

use App\Entity\Quotation;
use App\Repository\QuotationRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class QuotationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Quotation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Gestion de devis')
        ;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id') -> onlyOnIndex(),
            TextField::new('lastName','Nom'),
            TextField::new('firstName','Prénom'),
            IntegerField::new('numberStreet','N°'),
            TextField::new('street','Rue'),
            TextField::new('zip','Code postal'),
            TextField::new('city','Ville'),
            TextField::new('email','Email'),
            TelephoneField::new('phone','Téléphone'),
            ArrayField::new('status','Vous êtes ?'),
            ArrayField::new('benefit','Prestations'),
            TextareaField::new('message','Message'),
            ArrayField::new('SendByEmail','Réception de devis'),
            DateTimeField::new('created_at','Reçu le'),
            
         

        ];
    }
}
