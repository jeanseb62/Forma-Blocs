<?php

namespace App\Form;

use App\Entity\Quotation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class QuotationType extends AbstractType
{
    const statut1 = 'Entreprise';
    const statut2 = 'Salarié';
    const statut3 = 'Demandeur d\'emploi';
    const statut4 = 'Autre';
    const option1 = 'Titre de formateur professionnel pour adultes';
    const option2 = 'Titre de conseiller en insertion professionnelle';
    const option3 = 'Bloc individuel de formation';
    const option4 = 'Conseils pour les professionnels de la formation';
    const option5 = 'Validation des acquis d\'expérience (VAE)';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('numberStreet', TextType::class, [
                'label' => 'N° rue',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('street', TextType::class, [
                'label' => 'Rue',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('zip', TextType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
           
            ->add('country', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('status', ChoiceType::class, [
                'label_attr' => array('class' => 'checkbox-inline'),
                'choices'  => [
                    'Entreprise' => self::statut1,
                    'Salarié' => self::statut2,
                    'Demandeur d\'emploi' => self::statut3,
                    'Autre' => self::statut4,
                    ],
                'expanded'  => true,
                'multiple'  => true,
            ])
            ->add('benefit', ChoiceType::class, [
                'label_attr' => array('class' => 'checkbox-inline'),
                'choices'  => [
                    'Titre de formateur professionnel pour adultes' => self::option1,
                    'Titre de conseiller en insertion professionnelle' => self::option2,
                    'Bloc individuel de formation' => self::option3,
                    'Conseils pour les professionnels de la formation' => self::option4,
                    'Validation des acquis d\'expérience (VAE)' => self::option5,
                    ],
                'expanded'  => true,
                'multiple'  => true,
            ])

           
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 6
                    ]
            ])
       
            ->add('Envoyer', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quotation::class,
            'translation_domain' => 'forms'
        ]);
    }
}