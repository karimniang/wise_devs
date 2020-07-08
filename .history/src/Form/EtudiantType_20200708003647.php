<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('date_naissance')
            ->add('bourse', ButtonType::class, [
                'attr' => [
                    'class' => 'btn'
                ]
            ])
            ->add('boursier', BoursierType::class, [
                'attr' => [
                    'style' => 'display:none;'
                ]
            ])
            ->add('non_bourse', ButtonType::class, [
                'attr' => [
                    'class' => 'btn'
                ]
            ])
            ->add('nonBoursier', NonBoursierType::class)
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
