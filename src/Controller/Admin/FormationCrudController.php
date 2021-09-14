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
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\Field\CKEditorField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
           
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id') -> onlyOnIndex(),
            TextField::new('title','Titre'),
            TextField::new('type','Type'),
            IntegerField::new('NbBlocs','nombre de blocs'),
            IntegerField::new('PriceMin', 'Prix minimum'),
            IntegerField::new('PriceMax', 'Prix maximum'),
            TextField::new('documentPDF','Fiche en PDF'),
            ImageField::new('image','Image à la une')->setUploadDir('public/uploads/images')
            ->setBasePath('uploads/images')
            ->setSortable(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('required' ,false),
            AssociationField::new('blocks'),
            BooleanField::new('isPublished', 'Publié'),
         

        ];
    }
    
}
