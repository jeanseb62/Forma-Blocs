<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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

class ContactType extends AbstractType
{
    const public1 = 'Entreprise';
    const public2 = 'Salarié';
    const public3 = 'Demandeur d\'emploi';
    const public4 = 'Autre';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Email'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Téléphone'
                ]
            ])
            ->add('public', ChoiceType::class, [
                'label' => 'Vous êtes ?',
                'label_attr' => array('class' => 'checkbox-inline'),
                'choices'  => [
                    'Entreprise' => self::public1,
                    'Salarié' => self::public2,
                    'Demandeur d\'emploi' => self::public3,
                    'Autre' => self::public4,
                    ],
                    'expanded'  => true,
                    'multiple'  => true,
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Message',
                    'rows' => 20
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
            'attr' => [
                'class' => 'contactbtnYellow',]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}