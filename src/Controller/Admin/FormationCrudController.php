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
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

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
            AssociationField::new('blocks'),
            BooleanField::new('isPublished', 'Publié'),
         

        ];
    }
    
    public function persistEntity( EntityManagerInterface $entityManager, $entityInstance ): void {

	    $blockRepository = $entityManager->getRepository(Block::class);
	    foreach ($entityInstance->getBlocks() as $block) {
		    $tempBlock = $blockRepository->findOneBy( [ "name" => $block->getName() ] );
		    if ( $tempBlock ) {
			    $entityInstance->removeBlock( $block );
			    $entityInstance->addBlock( $tempBlock );
		    }
	    }

		   
	    parent::persistEntity( $entityManager, $entityInstance );
    }

    public function updateEntity( EntityManagerInterface $entityManager, $entityInstance ): void {
	    $blockRepository = $entityManager->getRepository(Block::class);
	    foreach ($entityInstance->getBlocks() as $block) {
		    $tempBlock = $blockRepository->findOneBy(["name" => $block->getName()]);
		    if ($tempBlock) {
		    	$entityInstance->removeBlock($block);
		    	$entityInstance->addBlock($tempBlock);
		    }

	    }

    	

	    parent::updateEntity( $entityManager, $entityInstance );
    }
}
