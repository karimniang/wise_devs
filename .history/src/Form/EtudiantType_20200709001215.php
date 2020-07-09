<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Sarr'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'wise'
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'wise@gmail.com'
                ]
            ])
            ->add('telephone', null, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('date_naissance', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Etat', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    '' => 'choix',
                    'boursier' => 'boursier',
                    'nonBoursier' => 'nonBoursier'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'onchange' => 'val()'
                ]
            ])
            ->add('montant', ChoiceType::class, [
                'choices' => [
                    '20000' => '20000',
                    '40000' => '40000'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'display:none'
                ]
            ])
            ->add('isHoused', null, [
                'attr' => [
                    'class' => 'essai',
                    'style' => 'display:none'
                ]
            ])
            ->add('loger', EntityType::class, [
                'class' => Chambre::class,
                '' => 'choix',
                'choice_label' => 'numero',
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'display:none'
                ]
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'display:none'
                ]
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
