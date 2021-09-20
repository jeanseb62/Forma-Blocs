<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use App\Entity\Block;
use App\Repository\BlockRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste de formations')
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
            ImageField::new('documentPDF', 'Document PDF')->setUploadDir('public/assets/pdf')
            ->setBasePath('assets/pdf')
            ->setSortable(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('required' ,false),
            ImageField::new('image','Image à la une')->setUploadDir('public/assets/images/imgFormation')
            ->setBasePath('images/imgFormation/')
            ->setSortable(false)
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setFormTypeOption('required' ,false),
            AssociationField::new('blocks')->hideOnIndex(),
            BooleanField::new('isPublished', 'Publié'),
         

        ];
    }
    
}
