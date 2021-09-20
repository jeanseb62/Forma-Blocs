<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
            ->setSearchFields(['id', 'lastName', 'firstName', 'login', 'email', 'password', 'isVerified']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addPanel('Information de compte');
        yield IntegerField::new('id', 'ID')->onlyOnIndex();
        yield TextField::new('lastName','Nom');
        yield TextField::new('firstName','Prénom');
        yield TextField::new('login','Login');
        yield TextField::new('email','Email');
        yield TextField::new('password','Mot de passe');
        yield BooleanField::new('isVerified','Activé');
        

    }
}
