<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lastName', TextType::class, [
            'label' => ' ',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Nom'
            ]
        ])

        ->add('firstName', TextType::class, [
            'label' => ' ',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Prénom'
            ]
        ])

        ->add('email', EmailType::class, [
            'label' => ' ',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]
        ])
        ->add('login', TextType::class, [
            'label' => ' ',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Login'
            ]
        ])
        ->add('password', PasswordType::class, [
            'label' => ' ',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Mot de passe'
            ]
        ])

        ->add('Inscription', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary',]
            ])
        ;

           
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
