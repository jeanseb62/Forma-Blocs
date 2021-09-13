<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id') -> onlyOnIndex(),
            TextField::new('title','Titre'),
            TextField::new('type','Type'),
            TextField::new('listing','Détails'),
            TextField::new('price', 'Prix'),
            ImageField::new('documentPDF','Fiche en PDF')->setUploadDir('public/uploads/pdf')
            ->setBasePath('uploads/pdf')
            ->setSortable(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('required' ,false),
            ImageField::new('image','Image à la une')->setUploadDir('public/uploads/images')
            ->setBasePath('uploads/images')
            ->setSortable(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('required' ,false),
            AssociationField::new('blocks'),
         

        ];
    }
    
}
